<?php

namespace App\Http\Controllers\RadioTeboulba;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LiveStreamController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('radioteboulba.live-stream');
    }
}
