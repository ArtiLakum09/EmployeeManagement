<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'mobile' => 'required',
            'country_code' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'hobbies' => 'array',
            'photo' => 'image|nullable',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $request->file('photo')->store('photos', 'public');
        }

        $validated['hobbies'] = json_encode($validated['hobbies']);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee added successfully');
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
            'hobbies' => 'array',
            'photo' => 'image|nullable',
        ]);

        if ($request->hasFile('photo')) {
            if ($employee->photo_path) {
                Storage::disk('public')->delete($employee->photo_path);
            }
            $validated['photo_path'] = $request->file('photo')->store('photos', 'public');
        }

        $validated['hobbies'] = json_encode($validated['hobbies']);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->photo_path) {
            Storage::disk('public')->delete($employee->photo_path);
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
