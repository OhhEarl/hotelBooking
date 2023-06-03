<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\RoomType;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('booking.create', ['data' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' =>'required',
            'room_id' =>'required',
            'checkin_date' =>'required|min:4|max:16',
            'checkout_date' =>'required',
            'total_adults' =>'required',
            'total_children' =>'required',
        ]);

      
        $data = new Booking();
        $data->customer_id = $request->customer_id;
        $data->room_id = $request->room_id;
        $data->checkin_date = $request->checkin_date;
        $data->checkout_date = $request->checkout_date;
        $data->total_adults = $request->total_adults;
        $data->total_children = $request->total_children;
        $data->save();

        if($request->ref=='front'){
            return redirect('booking')->with('success', 'Booking has been successfully created.');
        }
        return redirect('admin/booking/create')->with('success', 'Data saved successfully');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Check availability of the rooms

    function available_rooms(Request $request,$checkin_date){
        $arooms=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");

        $data=[];

        foreach($arooms as $room){
            $roomTypes=RoomType::find($room->room_type_id);
            $data[]=['room'=>$room, 'roomtype'=>$room];
        }


        return response()->json(['data'=> $data]);
    }

    function front_booking(){
        return view('front-booking');
    }





}
