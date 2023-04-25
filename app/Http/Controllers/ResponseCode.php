<?php

namespace App\Http\Controllers;

class ResponseCode
{
    //Error
    const ERROR_CREDENTIAL_WRONG          = 400001;
    const ERROR_MODEL_NOT_CREATED         = 400002;
    const ERROR_EMAIL_OR_MOBILE_DUPLICATE = 400003;
    const ERROR_MODEL_NOT_UPDATED         = 400004;
    const ERROR_MODEL_NOT_DELETED         = 400005;
    const ERROR_CHANGE_STATUS             = 400006;
    //Success
    const SUCCESS_MODEL_CREATED = 200001;
    const SUCCESS_LOGIN         = 200002;
    const SUCCESS_MODEL_DELETE  = 200003;
    const SUCCESS_MODEL_UPDATED = 200004;
    const SUCCESS_CHANGE_STATUS = 200005;
}
