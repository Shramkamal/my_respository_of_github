<?php

namespace App\Http\Controllers;

use App\Models\curricula;
use Illuminate\Http\Request;

class curriculaController extends Controller
{
    public function index()
    {
        $curriculas = curricula::all();
        return view('curriculas.index', compact('curriculas'));
    }
    public function create()
    {
        return view('curriculas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'curricula_name' => 'required|string|max:255',
            'curricula_level_of_education' => 'required|string|max:255',
            'curriculum_upload' => 'required|file|mimes:pdf|max:10240', // Adjust the allowed file types and maximum file size
        ]);

        // Handle file upload
        $file = $request->file('curriculum_upload');
        $file_path = $file->store('public/curriculums');

        // Create a new Curricula instance and save it to the database
        $curricula = Curricula::create([
            'name' => $request->input('curricula_name'),
            'level_of_education' => $request->input('curricula_level_of_education'),
            'curriculum_upload' => 'storage/curriculums/' . $file->hashName(),
        ]);

        return redirect()->route('curriculas.create')->with('success', 'Curricula created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'curricula_name' => 'required|string|max:255',
            'curricula_level_of_education' => 'required|string|max:255',
            'curriculum_upload' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // Adjust the allowed file types and maximum file size
        ]);

        $curricula = Curricula::findOrFail($id);

        // Update curriculum data based on the provided input
        $curricula->update([
            'name' => $request->input('curricula_name'),
            'level_of_education' => $request->input('curricula_level_of_education'),
        ]);

        // Handle file upload only if a new file is provided
        if ($request->hasFile('curriculum_upload')) {
            $file = $request->file('curriculum_upload');
            $file_path = $file->store('public/curriculums');

            // Update the curriculum_upload field with the new file path
            $curricula->update([
                'curriculum_upload' => 'storage/curriculums/' . $file->hashName(),
            ]);
        }

        return redirect()->route('curriculas.index')->with('success', 'Curricula updated successfully');
    }
    public function destroy($id)
    {
        $curricula = Curricula::findOrFail($id);

        // Delete associated file if it exists
        if ($curricula->curriculum_upload) {
            $file_path = public_path($curricula->curriculum_upload);

            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        // Delete the record from the database
        $curricula->delete();

        return redirect()->route('curriculas.index')->with('success', 'Curricula deleted successfully');
    }
    public function edit($id)
    {
        $curriculas = curricula::findOrFail($id);
        return view('curriculas.edit', compact('curriculas'));
    }
}
