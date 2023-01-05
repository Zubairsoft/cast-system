<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Notification;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Admin\Notifications\NotificationResource;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class IndexNotificationController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $admin = Auth::user();
        $notifications = $admin->notifications;
        return sendSuccessResponse(NotificationResource::collection($notifications), __('messages.data-getting'));
    }
}
