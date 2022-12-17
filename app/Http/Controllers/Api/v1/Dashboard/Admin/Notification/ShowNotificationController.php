<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Notification;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class ShowNotificationController extends Controller
{
    public function __invoke(string $id)
    {
        $admin=Auth::user();
        $notification=$admin->notifications()->findOrFail($id);
        $notification->markAsRead();
        return sendSuccessResponse($notification,__('messages.data-getting'));
    }
}
