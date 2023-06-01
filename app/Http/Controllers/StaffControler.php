<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Staff;

class StaffControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Staff::all();
        return view('staff.index', ['data' => $data]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $departs = Department::all();
        return view('staff.create', ['departs' => $departs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' =>'required',
            'department_id' =>'required',
        ]);

        $photo = $request->file('photo')->store('staffPhoto');

        $data = new Staff();
        $data->full_name = $request->full_name; 
        $data->department_id = $request->department_id; 
        $data->bio= $request->bio; -
        $data->salary_type= $request->salary_type; 
        $data->salary_amt= $request->salary_amt; 
        $data->photo = $photo; 
        $data->save();

        return redirect('admin/staff/create')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data = Staff::find($id);
        return view('staff.show', ['data' => $data]);
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departs = Department::all();
        $data = Staff::find($id);
               
        return view('staff.edit', ['data' => $data, 'departs' => $departs]);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        $data = Staff::find($id);

        if($request->hasFile('photo')){
            $photo = $request->file('photo')->store('staffPhoto');
        }else{
            $photo=$request->prev_photo;
        }

        $data->full_name = $request->full_name; 
        $data->department_id = $request->department_id; 
        $data->bio= $request->bio; 
        $data->salary_type= $request->salary_type; 
        $data->salary_amt= $request->salary_amt; 
        $data->save();
       
        return redirect('admin/staff/'.$id.'/edit')->with('success', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Staff::where('id', $id)->delete();
        return redirect('admin/rooms')->with('success', 'Data deleted successfully');
    }
}
