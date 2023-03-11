<?php

namespace App\Http\Controllers\Api\v1\Home\ContactUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\ContactUs\StoreContactUsRequest;
use App\Models\ContactList;
use App\Models\ContactUs;

class StoreContactUsController extends Controller
{
    public function __invoke(StoreContactUsRequest $request)
    {
        $contactList = ContactList::query()->find($request->input('contact_list_id'));
         
        $problems = json_decode($contactList->problem);

        // if (! key_exists($request->input('problem'), is_array($problems) ? $problems : []) && !is_null($request->input('problem'))) {
        //     return sendErrorResponse(null, __('data invalid'), 422);
        // }

        $contactUs = ContactUs::query()->create($request->validated() + ['problem' =>  is_null($request->problem)?null: $problems[(int)$request->problem]]);

        return sendSuccessResponse($contactUs, __('messages.data-storing'));
    }
}
