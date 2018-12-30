<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\UserLog;
use Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function registerUser(Request $req){
        //Register new user
        try{
            $user = new User;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->save();
            echo 'Success';
        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function listUser(){
    	
       //list data for users
        $users = new User;
        $users = DB::table('users')->select('name', 'email as user_email')->get();

        return $users;
    }

    public function checkIn(Request $req){
        //log user come in
          
            $userlog = new UserLog;       
            $userlog->user_id = $req->user_id;
            $userlog->checkin_at=date('Y-m-d h:i:s');
            $userlog->checkout_at=date('Y-m-d h:i:s');
            $userlog->save();
            echo 'Check In at :';
            
           
            return date('Y-m-d h:i:s');//displays current date
        }


    public function checkOut(Request $req){
        //log user come out
        
            $userlog = new UserLog;       
            $userlog->user_id = $req->user_id;
            $userlog->checkout_at=date('Y-m-d h:i:s');
            $userlog->checkin_at=date('Y-m-d h:i:s');
            $userlog->save();
            echo 'Check Out at :';
    	return date('Y-m-d h:i:s');
    }
}
