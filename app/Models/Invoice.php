<?php

namespace App\Models;

use App\Enums\InvoiceStatusEnum;
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
 * @property string            $invoice_number
 *
 */
class Invoice extends Model
{
    use HasFactory;

    protected $casts = [
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
    // ************************************ Attributes ********************************
}
