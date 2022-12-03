<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Companies\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Account\Companies\Auth\RegisterRequest;
use App\Models\OtpVerification;
use App\Models\User;
use Domains\Companies\DTO\CompanyData;
use Domains\Helper\Trait\UploadMedia;
use Domains\User\DTO\UserData;
use Domains\User\Enums\Role;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    use UploadMedia;

    public function __invoke(RegisterRequest $request):JsonResponse
    {
        $companyAttributes = unsetEmptyParam(CompanyData::fromRequest($request)->toArray());
        $userAttributes = unsetEmptyParam(UserData::fromRequest($request)->toArray());

        $userAttributes['avatar'] = $this->uploadImage($request->avatar, 'Users/avatar');
        $userAttributes['role']=Role::COMPANY;

        $representative = User::query()->create($userAttributes);

        if ($request->license_document?->isFile()) {
            $companyAttributes['license_document'] = $this->uploadImage($request->license_document);
        }

        $representative->company()->create($companyAttributes);

        OtpVerification::generateOtpVerificationCode($representative->email);

        //TODO send email notification 

        return sendSuccessResponse( $representative->company,__('auth.success_register'));
    }
}
