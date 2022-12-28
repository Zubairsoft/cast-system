<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Companies;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Admin\Companies\CompanyResource;
use App\Models\Company;
use Illuminate\Http\JsonResponse;

class ShowCompanyController extends Controller
{
    //
    public function __invoke(string $id): JsonResponse
    {
        $company = Company::query()->findOrFail(id: $id);
        return sendSuccessResponse(CompanyResource::make($company), __('messages.data-getting'));
    }
}
