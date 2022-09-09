<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function add($id)
    {
        return view ('Reservation.add',compact('id'));
    }
    public function store($id,Request $request)
    {
        $reservation=new Reservation;
        $data = $request->input();
        $reservation->date=$data['date'];
        $reservation->number_of_people=$data['number_of_people'];

        $reservation->restaurant_id=$id;
       $reservation->user_id= Auth::user()->id;
      $reservation->save();
      return redirect("/");
    }
    public function all()
    {
        $reservations=Reservation::join('users','users.id','=','reservations.user_id')
    ->join('restaurants','restaurants.id','=','reservations.restaurant_id')
            ->select('users.f_name','users.l_name','users.phone',
                'reservations.id as reservationId','restaurants.name as restaurantName'
                ,'reservations.date','reservations.number_of_people')
            ->get();
        return view('Reservation.all',compact('reservations'));
    }
    public function delete($id)
    {
        $reservation=Reservation::where('id',$id)->first();
        $reservation->delete();
        return redirect()->back();
    }
}
