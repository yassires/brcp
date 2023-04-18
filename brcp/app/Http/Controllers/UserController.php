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
        foreach ($reservations as $reservation) {
            $car = Car::where('id', $reservation->car_id)->first();
            $obj = new stdClass();
            $obj->id = $reservation->id;
            $obj->pick_up_date = $reservation->rent_date_start;
            $obj->drop_of_date = $reservation->rent_date_end;
            $obj->price = $reservation->price_rent;
            $obj->brand = $car->Brand->name;
            $obj->category = $car->Category->name;

            $cars[] = $obj;
        }
        return view('users.show', compact('cars', 'id'));
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
    public function update(Request $request, $id)
    {
        //
        // $user = Auth::user();
        $user = User::findOrFail($id);
        // dd($user->id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        $image = $user->image;
       
        if ($request->hasFile('image')) {
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'), $name);
            $image = 'images/' . $name;
        }
        // dd($request->image);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->input('password') ? Hash::make($request->input('password')) : $user->password,
            'image' => $image
        ]);
        // dd($tt);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('admins.users')->withSuccess('User deleted  successfully');
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
        ])->assignRole('User');
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
        $this->validate($request, [
            'email' => "required",
            "password" => "required"
        ]);
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
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


    public function showOne(User $user){
        return $user->getRoleNames()[0];
    }

    public function assignRole(Request $request){
        $user = User::find($request->user_id);
        // return $request->role;
        // return $user;
        $user->syncRoles([$request->role]);

        return redirect()->back()->with('success', 'Role Changed Successfully');
    }
}
