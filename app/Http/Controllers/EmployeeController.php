<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Company;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $employees = Employee::query();
            $counter = 0; // Initialize a counter variable
    
            return DataTables::of($employees)
                ->addColumn('actions', function ($employee) {
                    return view('employees.action', compact('employee'));
                })
                ->addColumn('company_name', function ($employee) {
                    return $employee->company->name;
                })
                ->addColumn('serial_number', function () use (&$counter) {
                    $counter++;
                    return $counter;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
    
        return view('employees.index');
    }
    
    
public function create()
{
    $companies = Company::all();
    return view('employees.create', compact('companies'));
    
}
public function store(Request $request) {

    try {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_id' => 'required|integer',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|numeric|min:6',
        ]);

        $employee = Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Employees created successfully.');

    } catch (\Exception $e) {
        return redirect()->route('employees.create')
        ->withInput()
        ->withErrors(['error' => 'An error occurred while creating the employee.']);
    }
}


public function edit(Employee $employee)
{
    $companies = Company::all();
    return view('employees.edit', compact('employee', 'companies'));

}


public function update(Request $request, Employee $employee)
{
    try {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_id' => 'required|integer',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required|string',
        ]);

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employees created successfully.');
    } catch (\Exception $e) {
        return redirect()->route('employees.edit')
        ->withInput()
        ->withErrors(['error' => 'An error occurred while editing the employee.']);
    }
}
public function destroy(Employee $employee)
{
    $employee->delete();

    return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
}
}
