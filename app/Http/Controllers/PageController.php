<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function loginPage()
    {
        return View('login');
    }
    public function testPage()
    {
        return View('test');
    }
    /**
     * The landingPage function returns a view for the landing page.
     * 
     * @return View named 'landing' is being returned.
     */
    public function landingPage()
    {
        return View('landing');
    }
    /**
     * The ContactPage function returns a view for the contact page.
     * 
     * @return View named 'contact' is being returned.
     */
    public function contactPage()
    {
        return View('contact');
    }

    /**
     * The aboutPage function returns a view for the about page.
     * 
     * @return View named 'about' is being returned.
     */
    public function aboutPage()
    {
        return View('about');
    }

    /**
     * The vendorPage function returns a view for the vendors page.
     * 
     * @return View named 'vendors' is being returned.
     */
    public function vendorPage()
    {
        return View('vendors');
    }

    /**
     * The shopPage function returns a view for the shop page.
     * 
     * @return View named  shop' is being returned.
     */
    public function shopPage()
    {
        $products = Products::all();
        return View('shop', ['products' => $products]);
    }
    public function vendorDash()
    {
        return View('vendor-dash', ['page' => '']);
    }
}
