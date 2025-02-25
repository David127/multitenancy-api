<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $tenant = tenant();
        return [
            'tenant' => $tenant,
            'usuarios' => \App\Models\User::all()
        ];
    }

    public function show(User $user)
    {

        return [
            'usuario' => \App\Models\User::find($user)
        ];
    }
}
