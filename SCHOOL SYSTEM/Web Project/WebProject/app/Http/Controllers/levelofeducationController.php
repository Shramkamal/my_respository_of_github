<?php

namespace App\Http\Controllers;

use App\Models\levelofeducation;
use Illuminate\Http\Request;

class levelofeducationController extends Controller
{
    public function index()
    {
        $levelofeducations = levelofeducation::all();
        return view('levelofeducations.index', compact('levelofeducations'));
    }
    public function create()
    {
        return view('levelofeducations.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'levelOfEducation_Name' => 'required|string|max:255',
        ]);

        // Adjust how you retrieve the input values based on the form field names
        $inputData = [
            'name' => $request->input('levelOfEducation_Name'),
        ];
        // Create a new student instance and save it to the database
        $levelofeducations = levelofeducation::create($inputData);
        return redirect()->route('levelofeducations.create')->with('success', 'levelofeducations created successfully');
    }
    public function destroy($id)
    {
        $levelofeducations = levelofeducation::findOrFail($id);
        $levelofeducations->delete();

        return redirect()->route('levelofeducations.index')->with('success', 'Resource deleted successfully.');
    }
    public function edit($id)
    {
        $levelofeducations = levelofeducation::findOrFail($id);
        return view('levelofeducations.edit', compact('levelofeducations'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'levelOfEducation_Name' => 'required|string|max:255',
        ]);

        $levelofeducations = levelofeducation::findOrFail($id);

        // Update teacher data based on the provided input
        $levelofeducations->update([
            'name' => $request->input('levelOfEducation_Name'),
        ]);

        return redirect()->route('levelofeducations.index')->with('success', 'levelofeducations updated successfully');
    }
}
