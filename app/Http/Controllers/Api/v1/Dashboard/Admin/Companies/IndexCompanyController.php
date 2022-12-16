<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Companies;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Admin\Companies\CompanyResource as CompaniesCompanyResource;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexCompanyController extends Controller
{

    public function __invoke(Request $request): JsonResponse
    {
        $perPage = $request->input('perPage') ?? 10;
        $sort = $request->input('sort') ?? 'desc';
        $sortBy = $request->input('sortBy') ?? 'id';

        $Companies = Company::query();

        $Companies->when($request->input('search_text'), function (Builder $query) use ($request) {
            $search_text = "%{$request->search_text}%";
            $query->where('name', 'like', $search_text);
        });

        $Companies->when($request->input('status'), function (Builder $query) use ($request) {
            $query->where('status', $request->input('status'));
        });

        $Companies->when($request->input('representative'), function (Builder $query) use ($request) {
            $query->searchByRepresentative($request->input('representative'));
        });


        return sendSuccessResponse(
            CompaniesCompanyResource::collection($Companies->orderBy($sortBy, $sort)
                ->paginate($perPage))->appends($request->query())->toArray(),
            __('messages.data-getting')
        );
    }
}
