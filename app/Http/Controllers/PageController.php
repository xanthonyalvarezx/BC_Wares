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
}
