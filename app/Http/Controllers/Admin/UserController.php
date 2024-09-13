<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\SUPPORT\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

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
                    $btn = '<a class="btn btn-success btn-sm" href="'.route('admin.user.detail', ['id' => $row->id]).'">Detail</a>';
                    $btn .= '<a class="btn btn-primary btn-sm" style="margin-left: 5px;" href="'.route('admin.user.edit', ['id' => $row->id]).'">Edit</a>';
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

    public function edit(int $id) : View
    {
        $user = new User();
        return view("user.edit", ['user' => $user->find($id)]);
    }

    public function detail(int $id) : View
    {
        $user = new User();
        return view("user.detail", ['user' => $user->find($id)]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'info' => 'success',
            'message' => 'Delete Data Success'
        ]);
    }

    public function store(Request $request)
    {
        $id = $request->get('id');
        $rules = [
            'name' => ['required', Rule::unique(User::class)->ignore($id), 'max:64'],
            'email' => ['required', Rule::unique(User::class)->ignore($id), 'email', 'max:64'],
        ];

        $method = $request->get('method');
        $password = $request->get('password');

        if ($method == 'save' || $password != null) {
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

        $user = new User();
        if ($method != 'save') {
            $user = User::find($id);
        }
        $user->name = $validation['name'];
        $user->email = $validation['email'];
        if ($method == 'save' || $password != null) {
            $user->password = Hash::make($validation['password']);
        }
        $user->save();

        return Redirect::route('admin.user.detail', ['id' => $user->id])->with('status', 'success');
    }
    
}
