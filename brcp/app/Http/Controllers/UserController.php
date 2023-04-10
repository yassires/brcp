<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use stdClass;

class UserController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        $id = Auth::user()->id;
        $reservations = Reservation::where('user_id', $id)->get();
        $cars = [];
        foreach($reservations as $reservation){
            $car = Car::where('id',$reservation->car_id )->first();
            $obj = new stdClass();
            $obj->id = $reservation->id;
            $obj->pick_up_date = $reservation->rent_date_start;
            $obj->drop_of_date = $reservation->rent_date_end;
            $obj->price = $reservation->price_rent;
            $obj->brand = $car->Brand->name;
            $obj->category = $car->Category->name;

            $cars[] = $obj;

        }
        return view('users.show', compact('cars'));
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

    public function registr()
    {
        return view('users.register');
    }

    public function register(Request $request)
    {
       $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
       ]);
       User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
       ]);
       return redirect()->route('users.login')->with([
        'success' => 'Account created successfully'
        ]);
    }


    public function login()
    {
        return view('users.login');
    }

    public function auth(Request $request)
    {
        $this->validate($request,[
            'email' => "required",
            "password" => "required"
        ]);
        if(auth()->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('cars.index');
        } else {
            return redirect()->route('users.login')->with([
                'error' => 'Email or Password is incorrect'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('cars.index');
    }
}
