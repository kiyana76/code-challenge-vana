<?php

namespace App\Models;

use App\Enums\NotificationStatusEnum;
use App\Enums\NotificationTypeEnum;
use App\Enums\ProductableEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class User
 *
 * @package App\Models\Notification
 *
 * @property int                    $id
 *
 * @property integer                $user_id
 * @property User                   $user
 *
 * @property NotificationStatusEnum $status
 * @property string                 $status_translate
 * @property NotificationTypeEnum   $type
 * @property string                 $type_translate
 *
 * @property string                 $message
 * @property string                 $price
 *
 * @property integer                $productable_id
 * @property ProductableEnum        $productable_type
 * @property string                 $productable_type_translate
 *
 * @property Carbon                 $created_at
 * @property Carbon                 $updated_at
 */
class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'productable_type', 'productable_id',
        'message', 'status', 'type', 'price'
    ];

    protected $casts = [
        'status'           => NotificationStatusEnum::class,
        'type'             => NotificationTypeEnum::class,
        'productable_type' => ProductableEnum::class
    ];

    // ************************************ Relations *********************************
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ************************************ Methods ***********************************
    public function checkCanChangeStatus(string $status): bool
    {
        if ($this->status == NotificationStatusEnum::CREATED->value && $status == NotificationStatusEnum::QUEUED->value)
            return true;
        if ($this->status == NotificationStatusEnum::QUEUED->value)
            if (in_array($status, [NotificationStatusEnum::DELIVERED->value, NotificationStatusEnum::NOT_DELIVERED->value]))
                return true;
        return false;
    }
    // ************************************ Attributes ********************************
    protected function statusTranslate(): Attribute
    {
        return Attribute::make(
            get: fn() => trans("attributes.notification.status." . $this->status->value)
        );
    }

    protected function typeTranslate(): Attribute
    {
        return Attribute::make(
            get: fn() => trans("attributes.notification.type." . $this->type->value)
        );
    }

    protected function productableTypeTranslate(): Attribute
    {
        return Attribute::make(
            get: fn() => trans("attributes.product.type." . $this->productable_type->value)
        );
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            set: fn() => config("invoice.price." . $this->type->value)
        );
    }
}
