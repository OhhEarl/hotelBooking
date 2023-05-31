<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::all();
        return view('customer.index', ['data' => $data]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' =>'required',
            'email' =>'required',
            'password' =>'required|min:4|max:16',
            'mobile' =>'required',
            'address' =>'required',
            'photo' =>'required',
        ]);

        $imagepath = $request->file('photo')->store('public/photo');

        $data = new Customer();
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->password = md5($request->password);
        $data->mobile_number = $request->mobile;
        $data->photo = $imagepath;
        $data->address = $request->address;
        $data->save();

        return redirect('admin/customer/create')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Customer::find($id);
        return view('customer.show', ['data' => $data]);
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = Customer::find($id);
               
        return view('customer.edit', ['data' => $data]);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Customer::find($id);
        $request->validate([
            'full_name' =>'required',
            'email' =>'required',
            'mobile' =>'required',
            'address' =>'required',
        ]);

        if($request->hasFile('photo')){
            $imagepath = $request->file('photo')->store('public/photo');
        }else{
            $imagepath = $request->prev_photo;
        }

       
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->password = md5($request->password);
        $data->mobile_number = $request->mobile;
        $data->photo = $imagepath;
        $data->address = $request->address;
        $data->save();

       
        return redirect('admin/customer/'.$id.'/edit')->with('success', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::where('id', $id)->delete();
        return redirect('admin/customer')->with('success', 'Data deleted successfully');
    }
}