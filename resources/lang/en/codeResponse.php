<?php

use App\Http\Controllers\ResponseCode;

return [
    // Error
    ResponseCode::ERROR_CREDENTIAL_WRONG          => 'Credential information are wrong.',
    ResponseCode::ERROR_MODEL_NOT_CREATED         => 'Model not created',
    ResponseCode::ERROR_EMAIL_OR_MOBILE_DUPLICATE => 'Email or mobile can not be duplicate.',
    ResponseCode::ERROR_MODEL_NOT_UPDATED         => 'Model not updated',
    ResponseCode::ERROR_CHANGE_STATUS             => 'Change status failed',

    // Success
    ResponseCode::SUCCESS_MODEL_CREATED           => 'Model created.',
    ResponseCode::SUCCESS_LOGIN                   => 'Login successfully.',
    ResponseCode::SUCCESS_MODEL_DELETE            => 'Model deleted.',
    ResponseCode::SUCCESS_MODEL_UPDATED           => 'Model Updated.',
    ResponseCode::SUCCESS_CHANGE_STATUS           => 'Status changed.',
];
