<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //

public function index(Request $request)
{
    if ($request->ajax()) {
        $companies = Company::query();

        return DataTables::of($companies)
            ->addColumn('actions', function ($company) {

                return view('companies.action', compact('company'));
            })
            ->addColumn('serial_number', function () use (&$counter) {
                $counter++;
                return $counter;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    return view('companies.index');
}

public function create()
{
    return view('companies.create');
}


public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'nullable|email',
        'logo' => 'image|dimensions:min_width=100,min_height=100|nullable',
        'website' => 'nullable|url',
    ]);

    $data = $request->only(['name', 'email', 'website']);

    
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('public/logos');
        $data['logo'] = str_replace('public/', '', $logoPath);
    }
    try {
        Company::create($data);
    } catch (\Exception $e) {
        return redirect()->route('companies.create')
            ->withInput()
            ->withErrors(['error' => 'An error occurred while creating the company.']);
    }

    return redirect()->route('companies.index')->with('success', 'Company created successfully.');
}




public function edit(Company $company)
{
    return view('companies.edit', compact('company'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'nullable|email',
        'logo' => 'image|dimensions:min_width=100,min_height=100|nullable',
        'website' => 'nullable|url',
    ]);

    $company = Company::findOrFail($id);

    $data = $request->only(['name', 'email', 'website']);

    if ($request->hasFile('logo')) {
        
        if ($company->logo) {
            Storage::delete('public/' . $company->logo);
        }

        $logoPath = $request->file('logo')->store('public/logos');
        $data['logo'] = str_replace('public/', '', $logoPath);
    }

    try {
        $company->update($data);
    } catch (\Exception $e) {
        return redirect()->route('companies.edit', $id)
            ->withInput()
            ->withErrors(['error' => 'An error occurred while updating the company.']);
    }

    return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
}


public function destroy(Company $company)
{
    $company->delete();

    return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
}

}
