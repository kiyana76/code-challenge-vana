<?php

namespace App\Console\Commands;

use App\Enums\InvoiceStatusEnum;
use App\Enums\NotificationStatusEnum;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Console\Command;

class CreateInvoicesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-invoices-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $notifications = Notification::query()
                                     ->whereDoesntHave('invoices')
                                     ->where('status', NotificationStatusEnum::DELIVERED->value)
                                     ->get();

        $notificationsGroupByUsers = $notifications->groupBy('user_id');
        foreach ($notificationsGroupByUsers as $userId => $notificationsGroupByUser) {
            /**
             * @var User $user
             */
            $user = User::where('id', $userId)->first();
            if (!$user)
                continue;
            $invoice              = new Invoice();
            $invoice->user_id     = $userId;
            $invoice->user_email  = $user->email;
            $invoice->user_mobile = $user->mobile;
            $price                = 0;
            $notificationIds      = [];
            foreach ($notificationsGroupByUser as $notification) {
                $price += $notification->price;
                $notificationIds[] = $notification->id;
            }
            $invoice->price    = $price;
            $invoice->tax      = 0;
            $invoice->discount = 0;
            $invoice->total    = $price - $invoice->discount - $invoice->tax;
            $invoice->status   = InvoiceStatusEnum::CREATED->value;
            $invoice->save();
            $invoice->notifications()->sync($notificationIds);
        }
    }
}
