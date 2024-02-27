<?php

namespace App\Http\Controllers;

use App\Models\expenses;
use Illuminate\Http\Request;

class expenseController extends Controller
{
    public function index()
    {
        $expenses = expenses::all();
        return view('expenses.index', compact('expenses'));
    }
    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'expenses_name' => 'required',
            'expenses_type' => 'required',
            'expenses_date' => 'required|date',
            'expenses_for_who' => 'required',
            'expenses_amount' => 'required|numeric|between:0.01,9999999.99',
        ]);
        $expenses = [
            'name' => $request->input('expenses_name'),
            'type' => $request->input('expenses_type'),
            'date' => $request->input('expenses_date'),
            'for_who' => $request->input('expenses_for_who'),
            'amount' => $request->input('expenses_amount'),
        ];
        $expenses = expenses::create($expenses);
        return redirect()->route('expenses.create')->with('success', 'Expense created successfully');
    }
    public function destroy($id)
    {
        $expenses = expenses::findOrFail($id);
        $expenses->delete();

        return redirect()->route('expenses.index')->with('success', 'Resource deleted successfully.');
    }

    public function edit($id)
    {
        $expenses = expenses::findOrFail($id);
        return view('expenses.edit', compact('expenses'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'expenses_name' => 'required',
            'expenses_type' => 'required',
            'expenses_date' => 'required|date',
            'expenses_for_who' => 'required',
            'expenses_amount' => 'required|numeric|between:0.01,9999999.99',
        ]);

        $expenses = expenses::findOrFail($id);

        // Update teacher data based on the provided input
        $expenses->update([
            'name' => $request->input('expenses_name'),
            'type' => $request->input('expenses_type'),
            'date' => $request->input('expenses_date'),
            'for_who' => $request->input('expenses_for_who'),
            'amount' => $request->input('expenses_amount'),
        ]);

        return redirect()->route('expenses.index')->with('success', 'expenses updated successfully');
    }
}
