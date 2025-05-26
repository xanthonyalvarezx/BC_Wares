<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * The addProduct function adds a new product to the database.
     * Stores the image in the s3 bucket and returns the url to the image.
     * 
     * @param Request $request The request object.
     * @return redirect back to the add products form with a success message.
     */
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
    /**
     * The getPageData function returns a view for the vendor dashboard.
     * 
     * @param string $page The page to display.
     * @param User $id The user to display.
     * @return View The view to display.
     */
    public function getPageData($page, User $id)
    {
        switch ($page) {
            case 'products':
                // get all products for the vendor
                $products = auth()->user()->products()->latest()->get();
                // return view with products
                return View('vendor-dash', ['page' => $page, 'products' => $products]);
                break;
            case 'sales':
                // get sales data
                $sales = [
                    'January' => 1500,
                    'February' => 2100,
                    'March' => 1200,
                    'April' => 2400,
                    'May' => 1900,
                ];
                // return view with sales data
                return View('vendor-dash', [
                    'page' => $page,
                    'labels' => array_keys($sales),
                    'data' => array_values($sales),
                ]);
                break;
            case 'reports':
                // return view with reports
                return View('vendor-dash', ['page' => $page]);
                break;
            case 'add_products':
                // return view with add products
                return View('vendor-dash', ['page' => $page]);
                break;
            default:
                // return view with test
                break;
        }
    }
    /**
     * The editProduct function edits a product in the database.
     * If a new image is uploaded, it will be stored in S3 and the old image URL will be updated.
     * 
     * @param Request $request The request object.
     * @param int $id The product ID to edit.
     * @return redirect back with a success message.
     */
    public function editProduct(Request $request, $id)
    {
        try {
            // Find the product
            $product = Products::find($id);

            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required',
                'price' => 'required|numeric|min:0',
                'description' => 'required',
                'short_desc' => 'required',
                'quantity' => 'required|integer|min:0',
                'type' => 'required|integer|min:1|max:4',
                'image_url' => 'nullable|file|mimes:jpg,jpeg,png,gif|max:5120'
            ]);

            // Handle image upload if a new image was provided
            if ($request->hasFile('image_url')) {
                // Store the new image in S3
                $path = $request->file('image_url')->store(auth()->user()->business . '/product_photos', 's3');
                Storage::disk('s3')->setVisibility($path, 'public');

                // Update the image URL in the validated data
                $validatedData['image_url'] = Storage::disk('s3')->url($path);
            } else {
                // Remove image_url from validated data if no new image was uploaded
                unset($validatedData['image_url']);
            }

            // Update the product with validated data
            $product->update($validatedData);

            return redirect()->back()->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update product: ' . $e->getMessage());
        }
    }
    /**
     * The deleteProduct function deletes a product from the database.
     * 
     * @param int $id The product ID to delete.
     * @return redirect back with a success message.
     */
    public function deleteProduct($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
