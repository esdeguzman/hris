<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showStatus(Request $request) {
        $employees = User::all();
        $user = null;

        if($request->has('employee_id')) {
            $user = User::find($request->employee_id);
        }

        return view('show-status', compact('employees', 'user'));
    }

    public function changeStatus(User $user, Request $request) {
        $url = url('/show-status') . "?employee_id={$user->id}";

        $user->status = $request->status;
        $user->save();

        request()->session()->flash('inform', "{$user->full_name}'s status has been successfully updated!");

        return redirect($url);
    }

    public function changePassword(Request $request) {
        if(! Hash::check($request->old_password, auth()->user()->password)) {
            $request->session()->flash('inform', 'Old password did not match!');
            return back();
        }

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = auth()->user();
        $user->password = bcrypt($request->new_password);
        $user->save();

        $request->session()->flash('inform', 'You have successfully updated your password!');

        return back();
    }
}
