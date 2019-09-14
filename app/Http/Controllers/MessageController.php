<?php

namespace App\Http\Controllers;

use App\RoleUser;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

     public function store(Request $request)
    {
    	$message = new message();
        $message->content = $request->input('text');
        $message->user_id = auth()->user()->id;
        $message->save();

        $role = new RoleUser; $role->user_id=0;
        $role = RoleUser::where('user_id', auth()->user()->id)->first();
        if($role && $role->user_id ==1) {
        return redirect()->intended('/admin/dashboard')->with('success','Palabra agregada correctamente');
        }
    return redirect()->intended('/dashboard')->with('success','Palabra agregada correctamente');

        return $request;
    }
}
