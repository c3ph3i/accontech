<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use Illuminate\Support\Facades\Auth;

class PlacesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'latitude' => 'required|numeric|max:255',
            'longitude' => 'required|numeric|max:255'
        ]);

        $place = new Place();
        $place->title = $request->get('title');
        $place->user_id = Auth::user()['id'];
        $place->description = $request->get('description');
        $place->latitude = $request->get('latitude');
        $place->longitude = $request->get('longitude');
        $place->country = $request->get('country');
        $place->city = $request->get('city');
        $place->address = $request->get('address');
        $place->visited = ($request->get('visited')) ? '1' : '0';

        $place->save();

        return redirect('/')->with('success_msg', 'The place has been added');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::find($id);

        //Only owner can see his post
        if($place->user_id == Auth::user()['id'])
            return view('place.edit',compact('place','id'));
        else
            return redirect('/');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'latitude' => 'required|numeric|max:255',
            'longitude' => 'required|numeric|max:255'
        ]);

        $place = $place = Place::find($id);

        //Only owner can edit his post
        if($place->user_id == Auth::user()['id']) {
            $place->title = $request->get('title');
            $place->user_id = Auth::user()['id'];
            $place->description = $request->get('description');
            $place->latitude = $request->get('latitude');
            $place->longitude = $request->get('longitude');
            $place->country = $request->get('country');
            $place->city = $request->get('city');
            $place->address = $request->get('address');
            $place->visited = ($request->get('visited')) ? '1' : '0';

            $place->save();

            return back()
                ->withInput()
                ->with('success_msg', 'The place has been updated');
        }

        return redirect('/');
    }


    /**
     * Update the visited column in selected place.
     * Using AJAX.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function updatePlaceVisitedColumnAJAX(Request $request, $id){

        $place = Place::find($id);

        //Only owner can edit his post
        if($place->user_id == Auth::user()['id']){
            $place->visited = ($request->get('visited') == 1) ? '1' : '0';
            $place->save();
        }

        exit();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //Only owner can destroy
        if( $place->user_id == Auth::user()['id'] )
            $place->delete();

        return redirect('/')
            ->with('success_msg','The place deleted successfully');
    }
}
