<?php

namespace App\Http\Controllers\Api\v1\Users\Account\Companies\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Account\Companies\Auth\RegisterRequest;
use App\Http\Resources\Users\Accounts\Companies\CompanyResource;
use App\Models\OtpVerification;
use App\Models\User;
use App\Notifications\Companies\Accounts\CompanyRegistered;
use Domains\Companies\DTO\CompanyData;
use Domains\Helper\Trait\UploadMedia;
use Domains\User\DTO\UserData;
use Domains\User\Enums\Role;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    use UploadMedia;

    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $companyAttributes = unsetEmptyParam(CompanyData::fromRequest($request)->toArray());
        $userAttributes = unsetEmptyParam(UserData::fromRequest($request)->toArray());

        $userAttributes['avatar'] = $this->uploadImage($request->avatar, 'Users/avatar');
        $userAttributes['role'] = Role::COMPANY;

        $representative = User::query()->create($userAttributes);

        if ($request->license_document?->isFile()) {
            $companyAttributes['license_document'] = $this->uploadImage($request->license_document);
        }

        $company = $representative->company()->create($companyAttributes);

        OtpVerification::generateOtpVerificationCode($representative->email);

        $admin = User::query()->firstWhere('role', 'like', Role::ADMIN);
        $admin->notify(new CompanyRegistered( $representative));

        return sendSuccessResponse(CompanyResource::make($company), __('auth.success_register'));
    }
}
