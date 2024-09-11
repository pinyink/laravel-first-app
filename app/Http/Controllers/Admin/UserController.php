<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index() : View
    {
        return view('user.user', []);
    }

    public function ajaxList()
    {
        $user = User::select("*");
        return DataTables::of($user)
                ->addColumn('button', function ($row) {
                    $btn = '<button class="btn btn-primary btn-sm" type="button" onclick="edit_data('.$row->id.')">Edit</button>';
                    return $btn;
                })
                ->rawColumns(['button'])
                ->addIndexColumn()
                ->make();
    }

    public function create() : View
    {
        return view("user.create");
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'unique:users', 'max:64'],
            'email' => ['required', 'unique:users', 'max:64'],
        ];

        $method = $request->get('method');

        if ($method == 'save') {
            $rules['password'] = ['required', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised(), 
            'confirmed'
        ];
            $rules['password_confirmation'] = ['required'];
        }

        $validation = $request->validate($rules);
        print_r($validation);
    }
    
}
