<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    //

    public function index(){
        return view('pages.dashboard.applications');
    }
}