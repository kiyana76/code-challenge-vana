<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseCode;
use App\Http\Requests\User\UserIndexRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resource\User\UserIndexResource;
use App\Http\Resource\User\UserShowResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserIndexRequest $request)
    {
        $users = User::query()->get();

        return UserIndexResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $attributes = $request->all();

        DB::beginTransaction();
        try {
            $user = new User();
            $user->fill($attributes);
            $user->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            $this->apiResponse(code: ResponseCode::ERROR_MODEL_NOT_CREATED);
        }

        return $this->apiResponse($user->toArray(), ResponseCode::SUCCESS_MODEL_CREATED);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return UserShowResource::collection($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $attributes = $request->all();
        $userWithSameEmailOrMobile = User::query()
            ->whereNotIn('id', [$user->id])
            ->where(function ($query) use ($attributes){
                $query->where('mobile', $attributes['mobile'])
                      ->orWhere('email', $attributes['email']);
            })
            ->first();
        if ($userWithSameEmailOrMobile)
            return $this->apiResponse(code: ResponseCode::ERROR_EMAIL_OR_MOBILE_DUPLICATE);

        DB::beginTransaction();
        try {
            $user->fill($attributes);
            $user->save();
            DB::commit();
            return $this->apiResponse(code: ResponseCode::ERROR_MODEL_NOT_UPDATED);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return $this->apiResponse(code: ResponseCode::ERROR_MODEL_NOT_UPDATED);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): array
    {
        if($user->delete())
            return $this->apiResponse(code: ResponseCode::SUCCESS_MODEL_DELETE);
        return $this->apiResponse(code: ResponseCode::ERROR_MODEL_NOT_DELETED);
    }
}
