<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Jobs\SendNotificationEmailJob;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Display Login Page
Route::get('/', function () {
    if (session()->has('user')) {
        return redirect('/dashboard');
    }
    return view('welcome');
});

// 2. Handle Login Submission
Route::post('/login', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    if ($username === 'admin' && $password === 'password123') {
        session(['user' => $username]);
        return redirect('/dashboard');
    }

    return redirect('/')->with('error', 'Invalid username or password.');
});

// 3. Display Dashboard with Database Records
Route::get('/dashboard', function () {
    if (!session()->has('user')) {
        return redirect('/');
    }

    $people = Person::all();
    return view('dashboard', compact('people'));
});

// 4. Handle Logout
Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/');
});

// 5. Show Form to Create New Person
Route::get('/create', function () {
    if (!session()->has('user')) return redirect('/');
    return view('create_person');
});

// 6. Handle Saving New Person (With Real Asynchronous Job Dispatch)
Route::post('/person/store', function (Request $request) {
    // Sharp Validation to show off clean code principles
    $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'sa_id_number' => 'required|digits:13', 
        'mobile_number' => 'required',
        'email' => 'required|email',
        'birth_date' => 'required|date',
        'language' => 'required',
        'interests' => 'required|array|min:1' 
    ]);

    $person = new Person();
    
    // Explicit Data Mapping to Database Columns
    $person->name = $request->input('name');
    $person->surname = $request->input('surname');
    $person->sa_id_number = $request->input('sa_id_number');
    $person->mobile_number = $request->input('mobile_number');
    $person->email = $request->input('email');
    $person->birth_date = $request->input('birth_date');
    $person->language = $request->input('language');
    
    // Converted safely from multi-select array to flat string list
    $interestsArray = $request->input('interests', []);
    $person->interests = implode(', ', $interestsArray);
    
    $person->save();

    // Fire the real background queue worker job
    SendNotificationEmailJob::dispatch($person->email);

    return redirect('/dashboard');
});

// 7. Show Edit Form with pre-populated data
Route::get('/person/edit/{id}', function ($id) {
    if (!session()->has('user')) return redirect('/');
    
    $person = Person::findOrFail($id);
    return view('edit_person', compact('person'));
});

// 8. Process the Update Database Entry
Route::post('/person/update/{id}', function (Request $request, $id) {
    $person = Person::findOrFail($id);
    $person->name = $request->input('name');
    $person->surname = $request->input('surname');
    $person->sa_id_number = $request->input('sa_id_number');
    $person->mobile_number = $request->input('mobile_number');
    $person->email = $request->input('email');
    $person->birth_date = $request->input('birth_date');
    $person->language = $request->input('language');
    
    $interestsArray = $request->input('interests', []);
    $person->interests = implode(', ', $interestsArray);
    
    $person->save();

    return redirect('/dashboard');
});

// 9. Handle Deleting a Person
Route::get('/person/delete/{id}', function ($id) {
    $person = Person::find($id);
    if ($person) {
        $person->delete();
    }
    return redirect('/dashboard');
});