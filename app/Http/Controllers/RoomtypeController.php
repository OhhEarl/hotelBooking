<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Roomtypeimage;


class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RoomType::all();
        return view('roomtype.index', ['data' => $data]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        return view('roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'price' =>'required',
            'detail' =>'required'
        ]);

        $data = new RoomType();
        $data->title = $request->title;
        $data->price = $request->price;
        $data->detail = $request->detail;
        $data->save();

        foreach($request->file('imgs') as $img){
            $imgpath = $img->store('imgs');
            $imgData = new Roomtypeimage();
            $imgData->room_type_id = $data->id;
            $imgData->img_src=  $imgpath;
            $imgData->img_alt= $request->title;
            $imgData->save();

        }

        return redirect('admin/roomtype/create')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = RoomType::find($id);
        return view('roomtype.show', ['data' => $data]);
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = RoomType::find($id);
               
        return view('roomtype.edit', ['data' => $data]);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = RoomType::find($id);
        $request->validate([
            'title' =>'required',
            'price' =>'required',
            'detail' =>'required',
        ]);
        
        $data->title = $request->title;
        $data->price = $request->price;
        $data->detail = $request->detail;
        $data->save();
       
        return redirect('admin/roomtype/'.$id.'/edit')->with('success', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RoomType::where('id', $id)->delete();
        return redirect('admin/roomtype')->with('success', 'Data deleted successfully');
    }
}
