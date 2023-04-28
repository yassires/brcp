<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Car;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Message;
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
        // return $request;    
        if($request->has('email')){
            // Buy
            // Buy

            // return "chra";

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'message' => 'required',
            ]);
            
            $car = Car::find($request->car_id);
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $address = $request->address;
            $message = $request->message;

            $b_car = Message::create([
                'user_id' => auth()->user()->id,
                'car_id' => $request->car_id,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'message' => $message,
            ]);
            
            $car->update([
                'available' => 0,
                
            ]);
            return redirect()->route('cars.type',1)->with([
                'success' => 'Reservation added successfully'
            ]);
        } else {
            // Rent 
            // Rent

            // return "kra";
            
            $this->validate($request, [
            // 'user_id' => 'required',
            // 'car_id' => 'required',
            'rent_date_start' => 'required|date|after_or_equal:today',
            'rent_date_end' => 'required|date|after:rent_date_start',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ],
        [
            'start_time.after_or_equal' => 'The Reservation date must be today or after today.',
            'end_time.after' => 'The Reservation date must be after the pick-up date',
       
        ]);
        $car = Car::find($request->car_id);
        $dateLocation = new DateTime($request->rent_date_start);
        $dateRetour = new DateTime($request->rent_date_end);
        $jours = date_diff($dateLocation, $dateRetour);
        $prixTtc = $car->price_rent * $jours->format('%d');

        $reservation = Reservation::create([
            'user_id' => auth()->user()->id,
            'car_id' => $request->car_id,
            'rent_date_start' => $request->rent_date_start,
            'rent_date_end' => $request->rent_date_end,
            'price_rent' => $prixTtc,
        ]);


        $car->update([
            'available' => 0,
            // 'reservation_id' => $reservation->id
            
        ]);
        return redirect()->route('cars.type',0)->with([
            'success' => 'Reservation added successfully'
        ]);
        }
        
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
    public function update(UpdateReservationRequest $request)
    {
        //

        $reservation = Reservation::find($request->id);
        // dd($reservation);
        
        $reservation->status = $request->input('status');
        
        $reservation->update();
        
        if ($reservation->status == 'Accepted') {
            $car = Car::find($reservation->car_id);
            $car->available = 0;
            $car->update();
        }

        return redirect()->back()->with('success', 'Reservation Status Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
        $reservation->delete();
        return redirect()->route('admins.dash_reservations', auth()->user()->id)->with([
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
