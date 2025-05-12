<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landingPage()
    {
        return View('landing');
    }
    public function contactPage()
    {
        return View('contact');
    }
    public function aboutPage()
    {
        return View('about');
    }
    public function vendorPage()
    {
        return View('vendors');
    }
    public function shopPage()
    {
        return View('shop');
    }
}
