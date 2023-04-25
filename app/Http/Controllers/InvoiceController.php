<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice\InvoiceChangeStatusRequest;
use App\Http\Requests\Invoice\InvoiceIndexRequest;
use App\Http\Requests\Invoice\InvoiceShowRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(InvoiceIndexRequest $request) {}

    public function show(InvoiceShowRequest $request, Invoice $invoice) {}

    public function changeStatus(InvoiceChangeStatusRequest $request, Invoice $invoice) {}
}
