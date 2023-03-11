<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexContactUsController extends Controller
{
    public function __invoke(Request $request)
    {
        $perPage = $request->input('paginate') ?? 10;

        $sort = $request->input('sort') ?? 'desc';

        $sortBy = $request->input('sortBy') ?? 'id';

        $searchText = $request->input('searchText');

        $contactList = $request->input('contactList');

        $contactUs = ContactUs::query()->when(
            $searchText,
            fn (Builder $query) =>
            $query->where('sender', 'like', "%{$searchText}%")
        )->when(
            $contactList,
            fn (Builder $query) => $query->where('contact_list_id',  $contactList)
        )->with('contactList:id,purpose')
        ->orderBy($sortBy, $sort)->paginate($perPage);

        return sendSuccessResponse($contactUs,__('messages.data-getting'));
    }
}
