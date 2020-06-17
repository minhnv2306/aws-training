<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function showUploadForm()
    {
    	return view('images.upload');
    }

    public function upload(Request $request)
    {
    	$path = $request->file('image')->store('avatars');

        return redirect()->back()->with('status', 'Upload the file successfully!');
    }
}
