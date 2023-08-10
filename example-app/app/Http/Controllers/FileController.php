<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('files.index', ['files' => $files]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx', // Adjust allowed file types
        ]);
    
        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $filename = time() . '_' . $uploadedFile->getClientOriginalName();
            
            // Store the file in the storage disk
            $path = $uploadedFile->storeAs('uploads', $filename, 'public'); // 'public' is the disk name
    
            // Save file details to the database
            $file = new File([
                'name' => $filename,
                'path' => $path,
                'size' => $uploadedFile->getSize(),
            ]);
            $file->save();
    
            return redirect()->route('files.index')->with('success', 'File uploaded successfully.');
        }
    
        return back()->withErrors('File upload failed.');
    }

    public function show($id)
    {
        $file = File::find($id);
        return view('files.show', ['file' => $file]);
    }

    public function update(Request $request, $id)
    {
        // Logic to update a file
    }

    public function destroy($id)
    {
        // Logic to delete a file
    }
}
