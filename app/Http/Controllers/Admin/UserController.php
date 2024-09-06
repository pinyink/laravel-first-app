<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    //
    public function index() : View
    {
        return view('admin/user', []);
    }

    public function ajaxList()
    {
        $user = User::select("*");
        return DataTables::of($user)
                ->addColumn('button', function ($row) {
                    $btn = '<button class="btn btn-primary btn-xs" type="button" onclick="edit_data('.$row->id.')">Edit</button>';
                    return $btn;
                })
                ->rawColumns(['button'])
                ->addIndexColumn()
                ->make();
    }
}
