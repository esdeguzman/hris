<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'employee_id' => '0528-1001',
            'first_name' => 'Maricel',
            'last_name' => 'Madrigal',
            'email' => 'maricel1@newsim.ph',
            'username' => 'maricel',
            'gender' => 'female',
            'password' => bcrypt('root'),
            'birth_date' => '05/28/1990',
            'status' => 1,
            'department_id' => 1,
            'position_id' => 47,
            'branch_id' => 5,
            'rank' => 'managerial',
            'access_type' => 'default',
        ]);

        DB::table('users')->insert([
            'employee_id' => '0718-1002',
            'first_name' => 'Jenny',
            'last_name' => 'Lingapan',
            'email' => 'jenny2@newsim.ph',
            'username' => 'jenny',
            'gender' => 'female',
            'password' => bcrypt('root'),
            'birth_date' => '07/18/1987',
            'status' => 1,
            'department_id' => 9,
            'position_id' => 11,
            'branch_id' => 5,
            'rank' => 'managerial',
            'access_type' => 'co-admin',
        ]);

        DB::table('users')->insert([
            'employee_id' => '0213-1003',
            'first_name' => 'Clarise',
            'last_name' => 'Samban',
            'email' => 'clarise3@newsim.ph',
            'username' => 'clarise',
            'gender' => 'female',
            'password' => bcrypt('root'),
            'birth_date' => '02/13/1991',
            'status' => 1,
            'department_id' => 9,
            'position_id' => 30,
            'branch_id' => 5,
            'rank' => 'rank-and-file',
            'access_type' => 'co-admin',
        ]);

        DB::table('users')->insert([
            'employee_id' => '0624-1004',
            'first_name' => 'Esmeraldo',
            'last_name' => 'de Guzman Jr',
            'email' => 'esmeraldo4@newsim.ph',
            'username' => 'esme',
            'gender' => 'male',
            'password' => bcrypt('root'),
            'birth_date' => '06/24/1990',
            'status' => 1,
            'department_id' => 4,
            'position_id' => 69,
            'branch_id' => 5,
            'rank' => 'rank-and-file',
            'access_type' => 'co-admin',
        ]);

        // department heads

        DB::table('users')->insert([
            'employee_id' => '0624-1005',
            'first_name' => 'Ryan',
            'last_name' => 'Milante',
            'email' => 'ryan5@newsim.ph',
            'username' => 'ryan',
            'gender' => 'male',
            'password' => bcrypt('root'),
            'birth_date' => '06/24/1990',
            'status' => 1,
            'department_id' => 4,
            'position_id' => 23,
            'branch_id' => 5,
            'rank' => 'managerial',
            'access_type' => 'admin',
        ]);

        DB::table('users')->insert([
            'employee_id' => '0624-1006',
            'first_name' => 'Sylvia',
            'last_name' => 'Susan',
            'email' => 'sylvia6@newsim.ph',
            'username' => 'sylvia',
            'gender' => 'female',
            'password' => bcrypt('root'),
            'birth_date' => '06/24/1990',
            'status' => 1,
            'department_id' => 3,
            'position_id' => 3,
            'branch_id' => 5,
            'rank' => 'managerial',
            'access_type' => 'default',
        ]);

        DB::table('users')->insert([
            'employee_id' => '0624-1007',
            'first_name' => 'Rohan',
            'last_name' => 'Sanchez',
            'email' => 'rohan7@newsim.ph',
            'username' => 'rohan',
            'gender' => 'male',
            'password' => bcrypt('root'),
            'birth_date' => '06/24/1990',
            'status' => 1,
            'department_id' => 2,
            'position_id' => 15,
            'branch_id' => 5,
            'rank' => 'managerial',
            'access_type' => 'default',
        ]);

        DB::table('users')->insert([
            'employee_id' => '0624-1008',
            'first_name' => 'Maui',
            'last_name' => 'Valdez',
            'email' => 'maui8@newsim.ph',
            'username' => 'maui',
            'gender' => 'female',
            'password' => bcrypt('root'),
            'birth_date' => '06/24/1990',
            'status' => 1,
            'department_id' => 7,
            'position_id' => 24,
            'branch_id' => 5,
            'rank' => 'managerial',
            'access_type' => 'default',
        ]);

        DB::table('users')->insert([
            'employee_id' => '0624-1009',
            'first_name' => 'Lukas',
            'last_name' => 'Masen',
            'email' => 'lukas9@newsim.ph',
            'username' => 'lukas',
            'gender' => 'male',
            'password' => bcrypt('root'),
            'birth_date' => '06/24/1990',
            'status' => 1,
            'department_id' => 0,
            'position_id' => 27,
            'branch_id' => 5,
            'rank' => 'executive',
            'access_type' => 'default',
        ]);

        DB::table('users')->insert([
            'employee_id' => '0624-1010',
            'first_name' => 'Madel',
            'last_name' => 'Lisan',
            'email' => 'madel10@newsim.ph',
            'username' => 'madel',
            'gender' => 'female',
            'password' => bcrypt('root'),
            'birth_date' => '06/24/1990',
            'status' => 1,
            'department_id' => 5,
            'position_id' => 35,
            'branch_id' => 5,
            'rank' => 'managerial',
            'access_type' => 'default',
        ]);

        DB::table('users')->insert([
            'employee_id' => '0624-1011',
            'first_name' => 'Samuel',
            'last_name' => 'Tall',
            'email' => 'samuel11@newsim.ph',
            'username' => 'samuel',
            'gender' => 'male',
            'password' => bcrypt('root'),
            'birth_date' => '06/24/1990',
            'status' => 1,
            'department_id' => 8,
            'position_id' => 44,
            'branch_id' => 5,
            'rank' => 'managerial',
            'access_type' => 'default',
        ]);

        DB::table('users')->insert([
            'employee_id' => '0624-1012',
            'first_name' => 'John',
            'last_name' => 'Snow',
            'email' => 'john12@newsim.ph',
            'username' => 'john',
            'gender' => 'male',
            'password' => bcrypt('root'),
            'birth_date' => '06/24/1990',
            'status' => 1,
            'department_id' => 10,
            'position_id' => 72,
            'branch_id' => 5,
            'rank' => 'managerial',
            'access_type' => 'default',
        ]);
    }
}
