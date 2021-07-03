<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::whereHas('user', function ($query) {
            $query->where('customer_id', auth()->user()->customer_id);
        })->latest()->paginate();

        return view('sale.index', compact('sales'));
    }
}
