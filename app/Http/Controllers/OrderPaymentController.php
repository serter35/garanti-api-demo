<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderPaymentStoreRequest;
use App\Models\Order;
use App\Services\Payment\Garanti\SalePaymentService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class OrderPaymentController extends Controller
{
    /**
     * Payment Page (Method: GET)
     *
     * @param Order $order
     * @return Response
     */
    public function create(Order $order): Response
    {
        return Inertia::render('Payment/Create', [
            'order' => $order
        ]);
    }

    /**
     * Create Payment (Method: POST)
     *
     * @param OrderPaymentStoreRequest $request
     * @return RedirectResponse
     */
    public function store(Order $order, SalePaymentService $service, OrderPaymentStoreRequest $request)
    {
        return $service->prepareDataForPayment($request->toCreditCardEntity(), $order)->processPayment();
    }
}
