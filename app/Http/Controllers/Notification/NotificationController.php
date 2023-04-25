<?php

namespace App\Http\Controllers\Notification;

use App\Enums\NotificationStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseCode;
use App\Http\Requests\Notification\NotificationChangeStatusRequest;
use App\Http\Requests\Notification\NotificationIndexRequest;
use App\Http\Requests\Notification\NotificationStoreRequest;
use App\Http\Resource\Notification\NotificationIndexResource;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NotificationIndexRequest $request)
    {
        $notifications = Notification::query();

        if ($request->status)
            $notifications->where('status', $request->status);

        $notifications = $notifications->get();
        return NotificationIndexResource::collection($notifications);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificationStoreRequest $request)
    {
        $attributes = $request->all();

        DB::beginTransaction();
        try {
            $notification          = new Notification();
            $attributes['status']  = NotificationStatusEnum::CREATED->value;
            $attributes['user_id'] = $attributes['user_id'] ?: auth()->user()->id;
            $attributes['price']   = 0;
            $notification->fill($attributes);
            $notification->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return $this->apiResponse(code: ResponseCode::ERROR_MODEL_NOT_CREATED);
        }

        return $this->apiResponse($notification->toArray(), ResponseCode::SUCCESS_MODEL_CREATED);

    }

    /**
     * change status of notification
     */
    public function changeStatus(NotificationChangeStatusRequest $request, Notification $notification) {
        $newStatus = $request->status;
        if ($notification->checkCanChangeStatus($newStatus)) {
            $notification->status = $newStatus;
            $notification->save();
            return $this->apiResponse(code: ResponseCode::SUCCESS_CHANGE_STATUS);
        }
        return $this->apiResponse(code: ResponseCode::ERROR_CHANGE_STATUS);
    }
}
