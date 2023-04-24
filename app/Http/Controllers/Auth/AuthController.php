<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseCode;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return array
     */
    public function login(LoginRequest $request)
    {
        $credential = $this->getCredential($request);
        if (!$token = auth()->attempt($credential)) {
            return $this->apiResponse(code: ResponseCode::ERROR_CREDENTIAL_WRONG);
        }
        return $this->apiResponse($this->createNewToken($token), ResponseCode::SUCCESS_LOGIN);
    }

    /**
     * @param LoginRequest $request
     * @return array
     */
    public function getCredential(LoginRequest $request): array
    {
        $credential = [];
        if ($request->email)
            $credential['email'] = $request->email;
        elseif ($request->mobile)
            $credential['mobile'] = $request->mobile;
        $credential['password'] = $request->password;
        return $credential;
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return array
     */
    protected function createNewToken($token): array
    {
        return ['access_token' => $token,
                'token_type'   => 'bearer',
                'expires_in'   => auth()->factory()->getTTL() * 60,
                'user'         => auth()->user()];
    }
}
