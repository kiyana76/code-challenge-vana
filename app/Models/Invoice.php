<?php

namespace App\Models;

use App\Enums\InvoiceStatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Invoice
 *
 * @package App\Models\Invoice
 *
 * @property integer           $id
 *
 * @property integer           $user_id
 * @property User              $user
 * @property string            $user_email
 * @property string            $user_mobile
 *
 * @property string            $price
 * @property string            $tax
 * @property string            $discount
 * @property string            $discount_code
 * @property string            $total
 *
 * @property InvoiceStatusEnum $status
 * @property string            $status_translate
 *
 */
class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'user_mobile',
        'price',
        'tax',
        'discount',
        'discount_code',
        'total',
        'status',
    ];
    protected $casts    = [
        'status' => InvoiceStatusEnum::class
    ];

    // ************************************ Relations *********************************
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function notifications(): BelongsToMany
    {
        return $this->belongsToMany(Notification::class);
    }
    // ************************************ Methods ***********************************
    public function checkCanChangeStatus(string $status): bool
    {
        if ($this->status->value == InvoiceStatusEnum::CREATED->value && $status == InvoiceStatusEnum::PAID->value)
            return true;
        return false;
    }
    // ************************************ Attributes ********************************
    protected function statusTranslate(): Attribute
    {
        return Attribute::make(
            get: fn() => trans("attributes.invoice.status." . $this->status->value)
        );
    }
}
