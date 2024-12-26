<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $employee = new Employee(); // Empty Employee instance
        return view('employees.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees',
            'mobile' => 'required',
            'country_code' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'photo' => 'nullable|image',
            'hobby' => 'nullable|array',
            'hobby.*' => 'nullable|string',
            
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }
        if ($request->has('hobby')) {
            $validated['hobby'] = implode(',', $request->input('hobby')); // Join hobbies into a string
        }

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
    }
    public function show(Employee $employee)
{
    return view('employees.show', compact('employee'));
}

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'mobile' => 'required',
            'country_code' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'photo' => 'nullable|image',
            'hobby' => 'nullable|array',
            'hobby.*' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }
        if ($request->has('hobby')) {
            $validated['hobby'] = implode(',', $request->input('hobby')); // Join hobbies into a string
        }
        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
