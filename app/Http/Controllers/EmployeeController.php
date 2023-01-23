<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate('10');
        $companies = Company::all();
        return view('employee.employee_index', compact('companies', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'company_id' => ['required'],
            'phone' => ['required', 'numeric', 'digits:11']
        ]);

        Employee::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'phone' => $request->phone
        ]);

        return back()->with('success', 'Employee has been added successfully');
    }

    public function edit($id)
    {
        $employee = Employee::findorfail($id);
        $companies = Company::all();
        return view('employee.employee_edit', compact('employee', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findorfail($id);
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'company_id' => ['required'],
            'phone' => ['required', 'numeric', 'digits:11']
        ]);

        $employee->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'phone' => $request->phone
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee has been updated successfully');
    }

    public function destroy($id)
    {
        $employee = Employee::findorfail($id);
        $employee->delete();
        return back()->with('success', 'Employee has been deleted successfully');
    }
}
