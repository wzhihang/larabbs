<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Handlers\ImageUploadHandlers;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except' => ['show']
        ]);
    }

    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
    }

    public function update(UserRequest $request,ImageUploadHandlers $upload,User $user)
    {
        $this->authorize('update',$user);
        $data = $request->all();

        if ($request->avatar) {
            $result = $upload->save($request->avatar,'avatar',$user->id,362);
            $data['avatar'] = $result['path'];
        }

        $user->update($data);
        return redirect()->route('users.show',$user->id)->with('success','个人资料更新成功');
    }


}
