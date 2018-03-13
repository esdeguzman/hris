<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\NewEmployee;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required',
            'branch_id' => 'required',
            'department_id' => 'required',
            'position_id' => 'required',
            'rank' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'branch_id' => $data['branch_id'],
            'department_id' => $data['department_id'],
            'position_id' => $data['position_id'],
            'rank' => $data['rank'],
            'birth_date' => str_replace('-', '/', $data['birth_date']),
        ]);

        $birthDate = Carbon::parse($user->birth_date);
        $month = $birthDate->month;
        $day = $birthDate->day;
        $dbPosition = 1000 + $user->id;

        $employeeId = ($month < 10 ? '0'.$month : $month).($day < 10 ? '0'.$day : $day).'-'.$dbPosition;

        $user->employee_id = $employeeId;
        $user->username = strtolower($data['first_name'].$user->id);
        $user->email = strtolower(str_replace(' ', '', $data['first_name'].$user->id.'@newsim.ph'));
        $user->password = bcrypt(strtolower(str_replace(' ', '', $data['first_name']).$user->id));
        $user->save();

        $user->notify(new NewEmployee($user));

        request()->session()->flash('inform', "{$user->full_name} has been successfully added! Ask the employee to change his/her password immediately by accessing the HRIS using username: {$user->username} and accessing his/her email through bluehost/hosting/webmail using email address: {$user->email} both accounts are currently using his/her username as password.");

        return $user;
    }
}
