<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Validator;

class RoomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rooms = Room::all();
        //return json format with code 200 success
        return response()->json($rooms, 200);
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        $room = new Room();
        return view('rooms.create', compact('room'));
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'floor' => 'required',
            'type' => 'required',
            'beds' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400); //return validator error with code 400
        }

        $rooms = Room::create($request->all());

        $request->session()->flash('msg', 'Room has been created');

        return response()->json($rooms, 201); //return json format with code 201 created
        return redirect('/rooms');
    }

    public function show(Room $room)
    {
        $room = Room::find($room->id);
        if(is_null($room)){
            return response()->json(["message" => "Record not found!"], 404); //return json error with code 404 not found
        }
        return response()->json($room, 200);
        return view('rooms.detail', compact('room'));
    }

    public function edit(Room $room)
    {
        $room = Room::find($room->id);
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'floor' => 'required',
            'type' => 'required',
            'beds' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400); //return validator error with code 400
        }

        $room = Room::find($id);
        if(is_null($room)){
            return response()->json(["message" => "Record not found!"], 404); //return json error with code 404 not found
        }

        $room->update($request->all());
        $request->session()->flash('msg', 'Room has been updated');
        return response()->json($room, 200);
        return redirect('/rooms');
    }

    public function destroy(Room $room)
    {
        $rooms = Room::find($room->id);
        if(is_null($rooms)){
            return response()->json(["message" => "Record not found!"], 404); //return json error with code 404 not found
        }
        $rooms->delete();
        request()->session()->flash('msg', 'Room has been deleted');
        return response()->json(null, 204);
        return redirect('rooms');
    }
}
