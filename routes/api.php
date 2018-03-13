<?php

use Illuminate\Http\Request;

// return all active users
Route::middleware('api')->get('/active-users', function () {
    return \App\User::active()->get();
});

// return all users including inactive accounts
Route::middleware('api')->get('/all-users', function () {
    return \App\User::all();
});

// return users by department
Route::middleware('api')->get('/users/department', function (Request $request) {
    return \App\User::active()->where('department_id', $request->department_id)->get();
});

// return all department heads
Route::middleware('api')->get('/users/department-heads', function () {
    $users = \App\User::active()->get();
    $departmentHeads = [];

    foreach($users as $value) {
        if(str_contains($value->position->name, 'Chief') && $value->position->department_id != 0) {
            array_push($departmentHeads, $value);
        } else continue;
    }

    return collect($departmentHeads);
});

// return department head of specified user
Route::middleware('api')->get('/user/department-head/{user}', function (\App\User $user) {
    $users = \App\User::where('department_id', $user->department->id)->get();

    foreach($users as $user) {
        if(str_contains($user->position->name, 'Chief')) {
            return $user;
        } else continue;
    }
});

// check user if still logged in and is active then return the user information
Route::middleware('api')->get('/auth-check', function () {
    if(\Illuminate\Support\Facades\Auth::check()) {
        // do nothing
    } else {
        return redirect('/login');
    }

    if(auth()->user()->status) {
        return auth()->user();
    } else {
        auth()->logout();
        return redirect('/login');
    }
});
