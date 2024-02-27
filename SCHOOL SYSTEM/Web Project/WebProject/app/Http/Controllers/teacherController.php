<?php

namespace App\Http\Controllers;

use App\Models\curricula;
use App\Models\Teacher;

use Illuminate\Http\Request;

class teacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }
    public function create()
    {
        $curriculas = curricula::all(); // Fetch available curricula
        return view('teachers.create', compact('curriculas'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'teacher_name' => 'required|string|max:255',
            'teacher_MobileNumber' => 'required|string|digits:11|regex:/[0-9]{4}[0-9]{3}[0-9]{4}/',
            'teacher_securityCode' => 'required|string|max:255',
            'teacher_nationalCardNumber' => 'required|string|max:255',
            'teacher_bloodGroup' => 'required|string',
            'teacher_LevelOfEducation' => 'required|string|max:255',
            'teacher_InstallationDate' => 'required',
            'teacher_StudyMaterials' => 'nullable|string',
            'teacher_Assessment' => 'nullable|string',
            'teacher_HonoraryAward' => 'nullable|string',
            'Teacher_Activity' => 'nullable|numeric',
            'curriculas_id' => 'required|exists:curriculas,id|unique:teachers,curriculas_id',
            'teacher_Certificate' => 'required|string|max:255',
            'teacher_note' => 'nullable|string',
        ]);

        $teacher = [
            'TeacherName' => $request->input('teacher_name'),
            'MobileNumber' => $request->input('teacher_MobileNumber'),
            'SecurityCode' => $request->input('teacher_securityCode'),
            'NationalCardNumber' => $request->input('teacher_nationalCardNumber'),
            'BloodGroup' => $request->input('teacher_bloodGroup'),
            'LevelOfEducation' => $request->input('teacher_LevelOfEducation'),
            'InstallationDate' => $request->input('teacher_InstallationDate'),
            'StudyMaterials' => $request->input('teacher_StudyMaterials'),
            'TeachersAssessment' => $request->input('teacher_Assessment'),
            'HonoraryAward' => $request->input('teacher_HonoraryAward'),
            'TeacherActivity' => $request->input('Teacher_Activity'),
            'curriculas_id' => $request->input('curriculas_id'),
            'Certificate' => $request->input('teacher_Certificate'),
            'Note' => $request->input('teacher_note'),
        ];
        $teacher = Teacher::create($teacher);
        return redirect()->route('teachers.create')->with('success', 'Teacher created successfully');
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'teacher_name' => 'required|string|max:255',
            'teacher_MobileNumber' => 'required|string|digits:11|regex:/[0-9]{4}[0-9]{3}[0-9]{4}/',
            'teacher_securityCode' => 'required|string|max:255',
            'teacher_nationalCardNumber' => 'required|string|max:255',
            'teacher_bloodGroup' => 'required|string',
            'teacher_LevelOfEducation' => 'required|string|max:255',
            'teacher_InstallationDate' => 'required',
            'teacher_StudyMaterials' => 'nullable|string',
            'teacher_Assessment' => 'nullable|string',
            'teacher_HonoraryAward' => 'nullable|string',
            'Teacher_Activity' => 'nullable|numeric',
            'curriculas_id' => [
                'required',
                'exists:curriculas,id',
                function ($attribute, $value, $fail) use ($id) {
                    // Check if the curriculas_id already exists for other teachers
                    $existingTeacher = Teacher::where('curriculas_id', $value)
                        ->where('id', '!=', $id)
                        ->first();

                    if ($existingTeacher) {
                        $fail("The selected curricula is already assigned to another teacher.");
                    }
                },
            ],
            'teacher_Certificate' => 'required|string|max:255',
            'teacher_note' => 'nullable|string',
        ]);
        $teacherData = [
            'TeacherName' => $request->input('teacher_name'),
            'MobileNumber' => $request->input('teacher_MobileNumber'),
            'SecurityCode' => $request->input('teacher_securityCode'),
            'NationalCardNumber' => $request->input('teacher_nationalCardNumber'),
            'BloodGroup' => $request->input('teacher_bloodGroup'),
            'LevelOfEducation' => $request->input('teacher_LevelOfEducation'),
            'InstallationDate' => $request->input('teacher_InstallationDate'),
            'StudyMaterials' => $request->input('teacher_StudyMaterials'),
            'TeachersAssessment' => $request->input('teacher_Assessment'),
            'HonoraryAward' => $request->input('teacher_HonoraryAward'),
            'TeacherActivity' => $request->input('Teacher_Activity'),
            'curriculas_id' => $request->input('curriculas_id'),
            'Certificate' => $request->input('teacher_Certificate'),
            'Note' => $request->input('teacher_note'),
        ];

        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->update($teacherData);
    
            return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error updating teacher.'])->withInput();
        }
    }



    public function destroy($id)
    {
        $teacher = teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Resource deleted successfully.');
    }
    public function edit($id)
    {
        $teacher = teacher::findOrFail($id);
        $curriculas  = curricula::all();
        return view('teachers.edit', compact('teacher', 'curriculas'));
    }
}
