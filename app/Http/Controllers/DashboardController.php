<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    public function addProduct(Request $request)
    {
        try {
            //Validate incoming request data
            $validatedData =  $request->validate([
                'user_id' => 'required',
                'name' => 'required',
                'image_url' => 'required|file|mimes:jpg,jpeg,png,gif|max:5120',
                'description' => 'required',
                'short_desc' => 'required',
                'quantity' => 'required',
                'price' => 'required',
                'type' => 'required'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json($e->errors(), 422);
        }
        // Store the file in the s3 bucket
        $path = $request->file('image_url')->store(auth()->user()->business . '/product_photos', 's3');
        Storage::disk('s3')->setVisibility($path, 'public');
        // get the url path for the image to store in the db
        $validatedData['image_url'] = Storage::disk('s3')->url($path);
        // create a new product using the validated request data
        $newProduct = Products::create($validatedData);
        // redirect back to the add products form with a success message
        return redirect()->back()->with('success', 'You\'re new product has successfully been added!');
    }
    public function getPageData($page, User $id)
    {
        switch ($page) {
            case 'products':
                $products = auth()->user()->products()->latest()->get();

                return View('vendor-dash', ['page' => $page, 'products' => $products]);
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
            case 'add_products':
                return View('vendor-dash', ['page' => $page]);
                break;
            default:
                # code...
                break;
        }
        return view('test', ['page' => $page]);
    }
}
