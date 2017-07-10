<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if($user)
        {
            return view('user.show',['user'=>$user]);
        }
        else 
            return redirect('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user)
        {
            return view('user.edit',['user'=>$user]);
        }
        else 
            return redirect('home');
    }

    /**
     * Update the specified use to division in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|min:3',
            'password'=>'required|min:6'
        ],
        [
            'name.required' => 'name must requied',
            'name.min' => 'length name than 3 character',
            'password.required' => 'pass must required',
            'password.min' => 'pass too short'
        ]);
        $user = User::find($id);
        if ($user) {
            $user->name = $request->name;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('users.show',$user->id)->with('flash','Update user success');
        } else {
            return redirect('users')->with('flash','No have user');
        }
    }

    /**
     * Update the specified use to division in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDivision(Request $request, $id)
    {
        //
        $user = User::find($id);
        if($user)
        {
            $user->devision_id = $request->division_id;
            $user->save();
            return $user;
        }
        else 
            return false;
    }
}
