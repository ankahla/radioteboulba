<?php

namespace App\Http\Controllers\RadioTeboulba;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('radioTeboulba.home');
    }
}
