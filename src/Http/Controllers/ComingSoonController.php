<?php

namespace tauseedzaman\ComingSoon\Http\Controllers;

use tauseedzaman\ComingSoon\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComingSoonController extends Controller
{
    public function index()
    {
        return view('comingsoon::comingsoon');
        
    }

}