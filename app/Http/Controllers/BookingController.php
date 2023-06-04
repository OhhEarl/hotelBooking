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
        $bookings=Booking::all();
        return view('booking.index',['data'=>$bookings]);
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
            'roomprice' =>'required',
        ]);

      
        $data = new Booking();
        $data->customer_id = $request->customer_id;
        $data->room_id = $request->room_id;
        $data->checkin_date = $request->checkin_date;
        $data->checkout_date = $request->checkout_date;
        $data->total_adults = $request->total_adults;
        $data->total_children = $request->total_children;
    if($request->ref=='front'){
        $data->ref = 'front';
    }else{
        $data->ref = 'admin';
    };

        $data->save();

        if($request->ref=='front'){

            if( $request->total_adults > 3){
               $additionalCost = ($request->total_adults - 3) * 300;
               
                \Stripe\Stripe::setApiKey('sk_test_51NF6qULRFz4ry7bsKPiSKyK9CC2TQ4SKABh9qRd1MMedSXk5lAL48zyUQSLAaDH1Jk8QLdKIfzgqE7cAQ26ngZDe00zK714lS6');
                $session = \Stripe\Checkout\Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                    'price_data' => [
                        'currency' => 'php',
                        'product_data' => [
                        'name' => 'Maximum Adults Allowed: 3 
                        Additional Adult/s = 300/Head'
                        ],
                        'unit_amount' => $request->roomprice*100 + $additionalCost*100,
                    ],
                    'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => 'http://localhost:8000/booking/success?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => 'http://localhost/hotelManage/booking/fail',
                ]);
                return redirect($session->url);
        }
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
        {
            Booking::where('id',$id)->delete();
            return redirect('admin/booking')->with('success','Data has been deleted.');
    }

    // Check availability of the rooms
    }
    function available_rooms($checkin_date){
        $arooms=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");

        $data=[];
        foreach($arooms as $room){
            $roomTypes=RoomType::find($room->room_type_id);
            $data[]=['room'=>$room,'roomtype'=>$roomTypes];
        }

        return response()->json(['data'=>$data]);
    }


    function front_booking(){
        
        return view('front-booking');
    }

    function booking_payment_success(Request $request){
        \Stripe\Stripe::setApiKey('sk_test_51NF6qULRFz4ry7bsKPiSKyK9CC2TQ4SKABh9qRd1MMedSXk5lAL48zyUQSLAaDH1Jk8QLdKIfzgqE7cAQ26ngZDe00zK714lS6');
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
         if($session->payment_status=='paid'){
            echo 'success';
         }
}
    

    function booking_payment_fail(Request $request){
        echo 'fail';;

        
    }

}



