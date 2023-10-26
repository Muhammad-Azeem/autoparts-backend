<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\OrdersService;

class OrderController extends Controller
{
    protected $OrdersService;

    public function __construct(OrdersService $OrdersService = null)
    {
        $this->OrdersService = $OrdersService ;
    }
}
