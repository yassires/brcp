<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Car;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Http\Request;
use DateTime;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('reservations.index')->with(['reservartions' => Reservation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        $car = Car::find($id);
        return view('reservation.create', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            // 'user_id' => 'required',
            'car_id' => 'required',
            'rent_date_start' => 'required',
            'rent_date_end' => 'required',
        ]);
        $car = Car::find($request->car_id);
        $dateLocation = new DateTime($request->rent_date_start);
        $dateRetour = new DateTime($request->rent_date_end);
        $jours = date_diff($dateLocation, $dateRetour);
        $prixTtc = $car->price_rent * $jours->format('%d');

        Reservation::create([
            'user_id' => auth()->user()->id,
            'car_id' => $request->car_id,
            'rent_date_start' => $request->rent_date_start,
            'rent_date_end' => $request->rent_date_end,
            'price_rent' => $prixTtc,
        ]);

        $car->update([
            'available' => 0
        ]);
        return redirect()->route('cars.index')->with([
            'success' => 'Reservation added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
        $reservation->delete();
        return redirect()->route('users.profile', auth()->user()->id)->with([
            'success' => 'Reservation Deleted successfully'
        ]);
    }
    // public function messi(Request $request)
    // {
    //     # code...
    //     return 0;
    // }

    public function deleteUserResrvation($reservationId)
    {
        $car = Car::all();
        $reservation = Reservation::findOrFail($reservationId);
        if ($reservation->car_id == $car->id) {
            $reservation->delete();
            return redirect()->route('users.profile', auth()->user()->id)->with([
                'success' => 'Reservation Deleted successfully'
            ]);
        }
    }
}
