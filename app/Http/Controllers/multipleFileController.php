<?php

namespace App\Http\Controllers;

use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class multipleFileController extends Controller
{
    public function index(){
        return view('multiple_file');
    }

    public function uploadFiles(Request $request)
    {
        $files = $request->file('files');
        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();
            $filePath = Storage::disk('public')->putFileAs('uploads', $file, $fileName);
            File::create([
                'file_name' => $fileName,
                'file_path' => $filePath,
            ]);
        }

        return back()->with('success', 'Files uploaded successfully!');
    }
}
