<?php

namespace App\Http\Controllers;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function login(Request $request) {
    if($request->username == 'admin' && $request->password == 'password123') {
        session(['user' => 'admin']);
        return redirect('/dashboard');
    }
    return back()->with('error', 'Invalid credentials!');
}
public function index() {
        // Fetch all records from the 'people' table using the Model
        $people = Person::all(); 
        
        // Return the dashboard view and pass the data to it
        return view('dashboard', compact('people'));
    }
}
