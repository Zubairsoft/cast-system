<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\ContactList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\ContactList\StoreContactListRequest;
use App\Models\ContactList;
use Illuminate\Http\Request;

class StoreContactListController extends Controller
{
    public function __invoke(StoreContactListRequest $request)
    {
        return $request->validated();
     return  ContactList::query()->create($request->validated());
    }
}
