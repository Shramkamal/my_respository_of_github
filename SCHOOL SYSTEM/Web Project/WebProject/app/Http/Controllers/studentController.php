<?php
// app/Http/Controllers/StudentController.php

namespace App\Http\Controllers;

use App\Models\levelofeducation;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $levelOfEducations = levelofeducation::all();
        return view('students.create', compact('levelOfEducations'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'student_name' => 'required|string|max:255',
            'student_age' => 'required|integer|between:5,25',
            'gender' => 'required|in:male,female',
            'student_location' => 'required|string',
            'student_fatherPhoneNumber' => 'required|string|digits:11|regex:/[0-9]{4}[0-9]{3}[0-9]{4}/',
            'student_motherPhoneNumber' => 'required|string|digits:11|regex:/[0-9]{4}[0-9]{3}[0-9]{4}/',
            'student_fatherWork' => 'required|string',
            'student_motherWork' => 'required|string',
            'student_chronicDisease' => 'nullable|string',
            'Student_bloodGroup' => 'required|string',
            'student_levelOfEducationStudent' => 'required|exists:levelofeducations,id',
            'student_fatherEducation' => 'required|string',
            'student_Level' => 'required|integer',
            'student_class' => 'required|string',
            'note' => 'nullable|string',
        ]);

        // Adjust how you retrieve the input values based on the form field names
        $studentData = [
            'name' => $request->input('student_name'),
            'age' => $request->input('student_age'),
            'gender' => $request->input('gender'),
            'location' => $request->input('student_location'),
            'father_mobile_number' => $request->input('student_fatherPhoneNumber'),
            'mother_mobile_number' => $request->input('student_motherPhoneNumber'),
            'father_work' => $request->input('student_fatherWork'),
            'mother_work' => $request->input('student_motherWork'),
            'chronic_disease' => $request->input('student_chronicDisease'),
            'blood_group' => $request->input('Student_bloodGroup'),
            'level_of_education_id' => $request->input('student_levelOfEducationStudent'), // Include level_of_education_id
            'father_education_level' => $request->input('student_fatherEducation'),
            'student_Level' => $request->input('student_Level'),
            'class' => $request->input('student_class'),
            'note' => $request->input('note'),
        ];

        // Create a new student instance and save it to the database
        $studentData = Student::create($studentData);

        return redirect()->route('students.create')->with('success', 'Student created successfully');
    }

    public function destroy($id)
    {
        $students = Student::findOrFail($id);
        $students->delete();

        return redirect()->route('students.index')->with('success', 'Resource deleted successfully.');
    }

    // app/Http/Controllers/StudentController.php

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $levelOfEducations = levelofeducation::all();
        return view('students.edit', compact('student','levelOfEducations'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'student_name' => 'required|string|max:255',
            'student_age' => 'required|integer|between:5,25',
            'gender' => 'required|in:male,female',
            'student_location' => 'required|string',
            'student_fatherPhoneNumber' => 'required|string|digits:11|regex:/[0-9]{4}[0-9]{3}[0-9]{4}/',
            'student_motherPhoneNumber' => 'required|string|digits:11|regex:/[0-9]{4}[0-9]{3}[0-9]{4}/',
            'student_fatherWork' => 'required|string',
            'student_motherWork' => 'required|string',
            'student_chronicDisease' => 'nullable|string',
            'Student_bloodGroup' => 'required|string',
            'student_levelOfEducationStudent' => 'required|exists:levelofeducations,id',
            'student_fatherEducation' => 'required|string',
            'student_Level' => 'required|integer',
            'student_class' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $student = Student::findOrFail($id);

        // Update student data based on the form fields
        $student->update([
            'name' => $request->input('student_name'),
            'age' => $request->input('student_age'),
            'gender' => $request->input('gender'),
            'location' => $request->input('student_location'),
            'father_mobile_number' => $request->input('student_fatherPhoneNumber'),
            'mother_mobile_number' => $request->input('student_motherPhoneNumber'),
            'father_work' => $request->input('student_fatherWork'),
            'mother_work' => $request->input('student_motherWork'),
            'chronic_disease' => $request->input('student_chronicDisease'),
            'blood_group' => $request->input('Student_bloodGroup'),
            'level_of_education_id' => $request->input('student_levelOfEducationStudent'), // Include level_of_education_id
            'father_education_level' => $request->input('student_fatherEducation'),
            'student_Level' => $request->input('student_Level'),
            'class' => $request->input('student_class'),
            'note' => $request->input('note'),
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }
}
