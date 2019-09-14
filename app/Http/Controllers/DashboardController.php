<?php

namespace App\Http\Controllers;

use App\Message;
use App\RoleUser;
use App\Dictionary;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $message = Message::all();
        $dictionary = Dictionary::all();
        $words = $dictionary->count();
        return view('dashboard.index',compact('message', 'dictionary','words'));

    }

     public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);
        //create the new word
        $message = new Message();
        $message->content = $request->input('content');
        $message->added_by = auth()->user()->id;
        $message->save();

        $role = new RoleUser; $role->user_id=0;
   		$role = RoleUser::where('user_id', auth()->user()->id)
   		->first();
    	if($role && $role->user_id ==1) {
        return redirect()->intended('/admin/dashboard');
    	}
    return redirect()->intended('/dashboard');
    }
}
