<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserPermission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangeUserPasswordRequest;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function showIndexPage()
    {
        return view('admin.users.index');
    }

    public function create(CreateUserRequest $request)
    {
        $user = User::create($request->safe()->except('role', 'permissions', 'verified'));

        if ($request->boolean('verified')) {
            $user->forceFill([
                'email_verified_at' => Carbon::now(),
            ])->save();
        }

        if ($request->filled('role')) {
            $user->syncRoles($request->input('role'));
        } else {
            $user->syncPermissions($request->input('permissions'));
        }

        if ($request->user()->hasPermissionTo(UserPermission::UpdateUsers)) {
            return to_route('admin.users.edit', compact('user'));
        } elseif ($request->user()->hasPermissionTo(UserPermission::ReadUsers)) {
            return to_route('admin.users.index');
        }

        return redirect()->to('/');
    }

    public function showCreatePage()
    {
        return view('admin.users.create');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->safe()->except('role', 'permissions', 'verified'));

        if (! $user->email_verified_at && $request->boolean('verified')) {
            $user->forceFill([
                'email_verified_at' => Carbon::now(),
            ])->save();
        } elseif ($user->email_verified_at && ! $request->boolean('verified')) {
            $user->forceFill([
                'email_verified_at' => null,
            ])->save();
        }

        if ($request->filled('role')) {
            $user->syncPermissions();
            $user->syncRoles($request->input('role'));
        } else {
            $user->syncRoles();
            $user->syncPermissions($request->input('permissions'));
        }

        return to_route('admin.users.edit', compact('user'));
    }

    public function changePassword(ChangeUserPasswordRequest $request, User $user)
    {
        $user->update($request->safe()->only('password'));

        return to_route('admin.users.edit', compact('user'));
    }

    public function showEditPage(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function delete(Request $request, User $user)
    {
        $user->forceDelete();

        if ($request->user()->hasPermissionTo(UserPermission::ReadUsers)) {
            return to_route('admin.users.index');
        }

        return redirect()->to('/');
    }
}
