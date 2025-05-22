<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AwsController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the file input
        try {
            $request->validate([
                'productImage' => 'required|file|mimes:jpg,jpeg,png,gif|max:5120',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json($e->errors(), 422);
        }
        // Upload to S3 inside the 'photos' folder with original filename
        // Store url on product 
        $path = $request->file('productImage')->store('photos', 's3');
        Storage::disk('s3')->setVisibility($path, 'public');

        $image = image::create([
            'filename' => basename($path),
            'url' => Storage::disk('s3')->url($path)
        ]);
        return $image;
    }
}
