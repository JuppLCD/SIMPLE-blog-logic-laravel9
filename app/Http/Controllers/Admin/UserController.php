<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\User;

use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $users = User::latest('id')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $AuthUserRole = auth()->user()->role->name;
        if ($AuthUserRole === 'Moderator' && $request->role == '2') {
            return redirect()->back()->withErrors('A moderator cannot assign the admin role');
        }
        if ($AuthUserRole === 'Moderator' && $user->role->name === 'Moderator') {
            return redirect()->back()->withErrors('A moderator cannot change the role to another moderator');
        }

        $user->role_id = $request->role;
        $user->save();

        return redirect()->route('admin.users.edit', $user);
    }

    public function destroy(User $user)
    {
        if ($user->role->name === 'Admin' && auth()->user()->role->name === 'Moderator') {
            return redirect()->route('admin.users.index')->withErrors("Can't delete an Admin");
        }
        if ($user->role->name === 'Moderator' && auth()->user()->role->name === 'Moderator') {
            return redirect()->route('admin.users.index')->withErrors("Can't delete another Moderator");
        }

        if ($user->image) {
            Storage::delete($user->image->url);
        }
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
