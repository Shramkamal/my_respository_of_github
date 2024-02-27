<?php

namespace App\Http\Controllers;

use App\Models\levelofeducation;
use Illuminate\Http\Request;
use App\Models\StudentScore;
use App\Models\Student;

class StudentScoreController extends Controller
{
    public function index()
    {
        $scores = studentScore::all();
        return view('scores.index', compact('scores'));
    }

    public function create()
    {
        // Assuming you have a collection of students to populate the dropdown
        $students = Student::all();
        return view('scores.create', compact('students'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required|exists:students,id|unique:student_scores,student_id',
            'kurdish' => 'required|numeric|between:0,100',
            'arabic' => 'required|numeric|between:0,100',
            'english' => 'required|numeric|between:0,100',
            'mathematic' => 'required|numeric|between:0,100',
            'physic' => 'required|numeric|between:0,100',
            'chemistry' => 'required|numeric|between:0,100',
            'biology' => 'required|numeric|between:0,100',
            'religion' => 'required|numeric|between:0,100',
            'sport' => 'required|numeric|between:0,100',
            'art' => 'required|numeric|between:0,100',
        ]);

        // Adjust how you retrieve the input values based on the form field names
        $score = [
            'student_id' => $request->input('student_id'),
            'kurdish' => $request->input('kurdish'),
            'arabic' => $request->input('arabic'),
            'english' => $request->input('english'),
            'mathematic' => $request->input('mathematic'),
            'physic' => $request->input('physic'),
            'chemistry' => $request->input('chemistry'),
            'biology' => $request->input('biology'),
            'religion' => $request->input('religion'),
            'sport' => $request->input('sport'),
            'art' => $request->input('art'),
        ];

        // Create a new student instance and save it to the database
        $score = StudentScore::create($score);

        return redirect()->route('scores.create')->with('success', 'Score added successfully');
    }
    public function destroy($id)
    {
        $score = StudentScore::findOrFail($id);
        $score->delete();

        return redirect()->route('scores.index')->with('success', 'Resource deleted successfully.');
    }
    
    public function edit($id)
    {
        $score = StudentScore::findOrFail($id);
        $students = Student::all(); // Assuming you have a Student model

        return view('scores.edit', compact('score', 'students'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'student_id' => 'required|exists:students,id|unique:student_scores,student_id,' . $id,
            'kurdish' => 'required|numeric|between:0,100',
            'arabic' => 'required|numeric|between:0,100',
            'english' => 'required|numeric|between:0,100',
            'mathematic' => 'required|numeric|between:0,100',
            'physic' => 'required|numeric|between:0,100',
            'chemistry' => 'required|numeric|between:0,100',
            'biology' => 'required|numeric|between:0,100',
            'religion' => 'required|numeric|between:0,100',
            'sport' => 'required|numeric|between:0,100',
            'art' => 'required|numeric|between:0,100',
        ]);
        try {
            $score = StudentScore::findOrFail($id);
            $score->update($request->all());

            return redirect()->route('scores.index')->with('success', 'Score updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error updating score.'])->withInput();
        }
    }
}
