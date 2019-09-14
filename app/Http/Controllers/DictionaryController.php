<?php

namespace App\Http\Controllers;

use App\RoleUser;
use App\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function index(Request $request)
    {
        $dictionary = Dictionary::all();
        return view('dictionary.index',compact('dictionary'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
        return view('dictionary.create'); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'word' => 'required|unique:dictionary,word',
        ]);
        //create the new word
        $dictionary = new Dictionary();
        $dictionary->word = $request->input('word');
        $dictionary->save();

       
        $role = new RoleUser; $role->user_id=0;
        $role = RoleUser::where('user_id', auth()->user()->id)
        ->first();
        if($role && $role->user_id ==1) {
        return redirect()->intended('/admin/dashboard')->with('success','Palabra agregada correctamente');
        }
    return redirect()->intended('/dashboard')->with('success','Palabra agregada correctamente');
           
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $dictionary = Dictionary::find($id);//Find the requested word
        return view('dictionary.edit',compact('dictionary'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'word' => 'required',
        ]);

        $dictionary = Dictionary::find($id);
        $dictionary->word = $request->input('word');
        $dictionary->save();

        $role = new RoleUser; $role->user_id=0;
        $role = RoleUser::where('user_id', auth()->user()->id)
        ->first();
        if($role && $role->user_id ==1) {
        return redirect()->intended('/admin/dashboard')->with('success','La palabra se ha actualizado correctamente');
        }
    return redirect()->intended('/dashboard')->with('success','La palabra se ha actualizado correctamente');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $dictionary = Dictionary::findOrFail($id)->delete();

        $role = new RoleUser; $role->user_id=0;
        $role = RoleUser::where('user_id', auth()->user()->id)
        ->first();
        if($role && $role->user_id ==1) {
        return redirect()->intended('/admin/dashboard')->with('success','La palabra se eliminó correctamente');
        }
    return redirect()->intended('/dashboard')->with('success','La palabra se eliminó correctamente');
    }

}
