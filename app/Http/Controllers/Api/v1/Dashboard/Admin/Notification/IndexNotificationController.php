<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Notification;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexNotificationController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $admin = Auth::user();
        $notifications = $admin->unreadNotifications ;
        return sendSuccessResponse($notifications, __('messages.data-getting'));
    }
}
