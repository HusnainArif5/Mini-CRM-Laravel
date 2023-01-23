<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate('10');
        return view('company.company_index', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'logo' => ['required', 'dimensions:min_width=100,min_height=100'],
            'website' => 'required|url'
        ]);
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/images', $filename);
        }
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $filename,
            'website' => $request->website
        ]);

        return back()->with('success', 'Company has been created successfully');
    }

    public function edit($id)
    {
        $companies = Company::findorfail($id);
        return view('company.company_edit', compact('companies'));
    }

    public function destroy($id)
    {
        $companies = Company::findorfail($id);
        $companies->delete();
        return back()->with('success', 'Company has been deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'logo' => ['dimensions:min_width=100,min_height=100'],
            'website' => 'required|url'
        ]);

        $company = Company::findorfail($id);
        $filename = '';
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/images', $filename);
            if ($company->logo) {
                Storage::delete('public/images/' . $company->logo);
            }
        } else {
            $filename = $company->logo;
        }
        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $filename,
            'website' => $request->website
        ]);

        return redirect()->route('companies.index')->with('success', 'Company has been updated successfully');
    }
}
