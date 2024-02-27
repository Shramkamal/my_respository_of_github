<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentPayment;
use App\Models\Student;

class StudentPaymentController extends Controller
{

    public function index()
    {
        $studentPayments = StudentPayment::all();
        return view('studentPayment.index', compact('studentPayments'));
    }

    public function create()
    {
        $students = Student::all();
        return view('studentPayment.create', compact('students'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required|exists:students,id',
            'studentPayment_amount' => 'required|numeric',
            'student_date_of_payment' => 'required|date',
            'studentPayment_note' => 'nullable|string',
        ]);
        $studentPayments = [
            'student_id' => $request->input('student_id'),
            'amount' => $request->input('studentPayment_amount'),
            'date_of_payment' => $request->input('student_date_of_payment'),
            'note' => $request->input('studentPayment_note'),
        ];

        $studentPayments = StudentPayment::create($studentPayments);

        return redirect()->route('studentPayment.create')->with('success', 'Payment created successfully.');
    }

    public function edit($id)
    {
        $studentPayments = StudentPayment::findOrFail($id);
        $students = Student::all();
        return view('studentPayment.edit', compact('studentPayments', 'students'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'student_id' => 'required|exists:students,id',
            'studentPayment_amount' => 'required|numeric',
            'student_date_of_payment' => 'required|date',
            'studentPayment_note' => 'nullable|string',
        ]);

        try {
            $studentPayments = StudentPayment::findOrFail($id);

            $studentPayments->update([
                'student_id' => $request->input('student_id'),
                'amount' => $request->input('studentPayment_amount'),
                'date_of_payment' => $request->input('student_date_of_payment'),
                'note' => $request->input('studentPayment_note'),
            ]);

            return redirect()->route('studentPayment.index')->with('success', 'Student Payment updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error updating score.'])->withInput();
        }
    }
    public function destroy($id)
    {
        $studentPayments = StudentPayment::findOrFail($id);
        $studentPayments->delete();

        return redirect()->route('studentPayment.index')->with('success', 'studentPayment deleted successfully.');
    }
}
