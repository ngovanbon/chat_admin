<?php
/**
 * Created by PhpStorm.
 * User: ngova
 * Date: 10/3/2018
 * Time: 11:00 PM
 */

namespace App\Http\Controllers;


use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    const AVATAR_URL = '/uploads/users/avatar/';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:150|unique:email',
            'avatar' => 'image|mimes:jpg,jpeg,png,gif',
            'phone' => 'regex:/[01][0-9]{9,10}/'
        ]);
    }

    public function index()
    {
        $userId = Auth::id();
        $users = User::all();
        return view('admin.user.index', compact(['users']));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function update($id = null)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function store(Request $req)
    {
        $this->validator($req->all())->validate();
        $fileName = null;
        if ($req->hasFile('avatar')) {
            $file = $req->file('avatar');
            $fileName = $file->getClientOriginalName() . time() . "." . $file->getClientOriginalExtension();
            $file->move('.' . self::AVATAR_URL, $fileName);
        }
        if ($req->id) {
            $user = User::first();
        } else {
            $user = new User();
            $user->password = Hash::make($req->password);
            $user->status = 0;
            $user->is_vip = 0;
        }
        if ($fileName) {
            $user->avatar = self::AVATAR_URL . $fileName;
        }
        $user->fill($req->only('name', 'email', 'phone'));
        $id = $user->id;
        if ($user->save()) {
            return redirect()->route('user.edit', ['user_id' => $id])->with('success', __('Save successful!'));
        }

        return redirect()->route('user.edit', ['user_id' => $id])->with('error', __('Save error!'));
    }

    public function delete($id){
        $user = User::find($id);
        $user->status = 1;
        if($user->save()){
            return redirect()->route('user.index')->with('success', __('Delete successful!'));
        }

        return redirect()->route('user.index')->with('error', __('Delete error!'));
    }
}
