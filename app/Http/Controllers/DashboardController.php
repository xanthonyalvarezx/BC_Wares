<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getPageData($page)
    {
        switch ($page) {
            case 'products':
                return View('vendor-dash', ['page' => $page]);
                break;
            case 'sales':
                $sales = [
                    'January' => 1500,
                    'February' => 2100,
                    'March' => 1200,
                    'April' => 2400,
                    'May' => 1900,
                ];

                return View('vendor-dash', [
                    'page' => $page,
                    'labels' => array_keys($sales),
                    'data' => array_values($sales),
                ]);
                break;
            case 'reports':
                return View('vendor-dash', ['page' => $page]);
                break;
            default:
                # code...
                break;
        }
        return view('test', ['page' => $page]);
    }
}
