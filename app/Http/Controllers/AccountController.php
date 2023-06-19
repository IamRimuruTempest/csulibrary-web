<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
     public function index(Request $request) {
        return DB::connection('mysql')
            ->table('accounts')
            ->where('username', '=', $request->username)
            ->where('password', '=', $request->password)
            ->get();
    }


    public function store(Request $request) {

        $suffix = $request->suffix;
        if($suffix == 'null' || $suffix == '') {
            $suffix = '';
        } 
        
        return DB::connection('mysql')
            ->table('accounts')
            ->insert([
              'student_id' => $request->identification,
              'first_name' => $request->firstname,
              'middle_name' => $request->middlename,
              'last_name' => $request->lastname,
              'suffix' => $suffix,
              'department' => $request->department,
              'course' => $request->course,
              'year' => $request->year,
              'gender' => $request->gender,
              'phone_number' => $request->phone,
              'username' => $request->identification,
              'password' => $request->identification,
              'created_at' => new \Datetime
            ]);
    }
      
    
}
