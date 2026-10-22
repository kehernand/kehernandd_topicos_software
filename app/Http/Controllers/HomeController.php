<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function contact(): View
    {
        $viewData = [];
        $viewData["title"] = "Contact - Online Store";
        $viewData["subtitle"] = "Contact us";
        $viewData["name"] = "Name: Your Name";
        $viewData["address"] = "Address: Your Address";
        $viewData["phone"] = "Phone: Your Phone";
        return view('home.contact')->with("viewData", $viewData);
    }
}
