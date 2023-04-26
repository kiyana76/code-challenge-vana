<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice\InvoiceChangeStatusRequest;
use App\Http\Requests\Invoice\InvoiceIndexRequest;
use App\Http\Requests\Invoice\InvoiceShowRequest;
use App\Http\Resource\Invoice\InvoiceIndexResource;
use App\Http\Resource\Invoice\InvoiceShowResource;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index(InvoiceIndexRequest $request)
    {
        $invoices = Invoice::query();

        if ($request->status)
            $invoices->where('status', $request->status);

        $invoices = $invoices->get();
        return InvoiceIndexResource::collection($invoices);
    }

    public function show(InvoiceShowRequest $request, Invoice $invoice) {
        return InvoiceShowResource::collection([$invoice]);
    }

    public function changeStatus(InvoiceChangeStatusRequest $request, Invoice $invoice) {
        $newStatus = $request->status;
        if ($invoice->checkCanChangeStatus($newStatus)) {
            $invoice->status = $newStatus;
            $invoice->save();
            return $this->apiResponse(code: ResponseCode::SUCCESS_CHANGE_STATUS);
        }
        return $this->apiResponse(code: ResponseCode::ERROR_CHANGE_STATUS);
    }
}
