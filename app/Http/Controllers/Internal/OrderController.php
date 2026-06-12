<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('internal.daftar-pesanan');
    }

    public function show($id)
    {
        return view('internal.detail-pesanan', compact('id'));
    }
}
