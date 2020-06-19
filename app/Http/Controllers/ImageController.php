<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function showUploadForm()
    {
        return view('images.upload');
    }

    public function upload(Request $request)
    {
        $originalImage = $request->file('image');

        # Visiable public file: https://laravel.com/docs/7.x/filesystem#file-visibility
        Storage::put(
            $this->makeFileName($originalImage),
            $this->editImage($originalImage)->stream()->__toString(),
            'public'
        );

        return redirect()->route('file.index')->with('status', 'Upload the file successfully!');
    }

    public function index()
    {
        $files = Storage::files('images');

        return view('images.index', [
            'files' => $files,
        ]);
    }

    private function makeFileName($originalFile)
    {
        return 'images/' . now()->timestamp . $originalFile->getClientOriginalName();
    }

    private function editImage($originalImage)
    {
        return Image::make($originalImage)
            ->resize(220, 200);
    }
}
