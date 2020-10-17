<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $dic["status"] = "OK";
        return json_encode($dic);
    }
}
