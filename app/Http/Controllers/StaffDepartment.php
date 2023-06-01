<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class StaffDepartment extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Department::all();
        return view('department.index', ['data' => $data]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'detail' =>'required',
        ]);

        $data = new Department();
        $data->title = $request->title; 
        $data->detail = $request->detail; 
        $data->save();

        return redirect('admin/department/create')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        
        $roomtypes = Department::all();
        $data = Department::find($id);
        return view('department.show', ['data' => $data]);
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Department::find($id);
               
        return view('department.edit', ['data' => $data]);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Department::find($id);
        $request->validate([
            'title' =>'required',
        ]);
        $data->title = $request->title;
        $data->detail = $request->detail;
        $data->save();
       
        return redirect('admin/department/'.$id.'/edit')->with('success', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Department::where('id', $id)->delete();
        return redirect('admin/department')->with('success', 'Data deleted successfully');
    }
}
