<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show(Request $request)
    {
        // Get the selected month from the request
        $selectedMonth = $request->input('report_month');

        // Set the default month to the current month if no month is selected
        $month = $selectedMonth ? date('Y-m', strtotime($selectedMonth)) : date('Y-m');

        // Get the best teacher with the most activities for the selected month
        $bestTeacher = DB::table('teachers')
            ->select('TeacherName', 'TeacherActivity')
            ->whereMonth('InstallationDate', '=', date('m', strtotime($month))) // Calculate based on the selected month
            ->orderByDesc('TeacherActivity')
            ->first();

        // Get the best student with the highest average score for the whole year
        $bestStudent = DB::table('student_scores')
            ->select('students.name as studentName', DB::raw('AVG(kurdish + arabic + english + mathematic + physic + chemistry + biology + religion + sport + art) as averageScore'))
            ->join('students', 'student_scores.student_id', '=', 'students.id')
            ->whereYear('student_scores.created_at', '=', date('Y', strtotime($month))) // Calculate based on the whole year
            ->groupBy('students.id', 'students.name')
            ->orderByDesc('averageScore')
            ->first();

        // Get the sum of student payments for the selected month
        $income = DB::table('studentpayments')
            ->whereMonth('date_of_payment', '=', date('m', strtotime($month)))
            ->sum('amount');

        // Get the sum of expenses for the selected month
        $expenses = DB::table('expenses')
            ->whereMonth('date', '=', date('m', strtotime($month)))
            ->sum('amount');

        // Calculate the profit for the selected month
        $profit = $income - $expenses;
    
        // Get the details of each expense type for the selected month
        $expenseDetails = DB::table('expenses')
            ->select('type', DB::raw('SUM(amount) as totalAmount'))
            ->whereMonth('date', '=', date('m', strtotime($month)))
            ->groupBy('type')
            ->get();

        // Pass the data to the view
        $data = [
            'bestTeacher' => $bestTeacher,
            'bestStudent' => $bestStudent,
            'income' => $income,
            'expenses' => $expenses,
            'profit' => $profit,
            'expenseDetails' => $expenseDetails,
            'month' => $month,
        ];

        // Return the view with data
        return view('index')->with($data);
    }
}
