<?php

use App\Http\Controllers\ResponseCode;

return [
    // Error
    ResponseCode::ERROR_CREDENTIAL_WRONG          => 'ایمیل یا شماره موبایل یا پسورد اشتباه است.',
    ResponseCode::ERROR_MODEL_NOT_CREATED         => 'عملیات با خطا مواجه شد.',
    ResponseCode::ERROR_EMAIL_OR_MOBILE_DUPLICATE => 'ایمیل یا موبایل نمیتواند تکراری باشد.',
    ResponseCode::ERROR_MODEL_NOT_UPDATED         => 'مدل بروزرسانی نشد.',
    ResponseCode::ERROR_MODEL_NOT_DELETED         => 'مدل حذف نشد.',
    ResponseCode::ERROR_CHANGE_STATUS             => 'امکان تغییر وضعیت وجود ندارد.',

    // Success
    ResponseCode::SUCCESS_MODEL_CREATED           => 'مدل مورد مظر با موفقیت ساخته شد.',
    ResponseCode::SUCCESS_LOGIN                   => 'با موفقیت وارد شدید.',
    ResponseCode::SUCCESS_MODEL_DELETE            => 'مدل حذف شد.',
    ResponseCode::SUCCESS_MODEL_UPDATED           => 'مدل بروزرسانی شد.',
    ResponseCode::SUCCESS_CHANGE_STATUS           => 'تغییر وضعیت با موفقیت انجام شد.'
];
