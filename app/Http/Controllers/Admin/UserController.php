<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    public function getJson(): JsonResponse
    {
        $collection = User::query();

        return DataTables::of($collection)          
            
           
            ->addColumn('action', function ($row) {
                $btn = '<a class="edit-modal btn btn-info"
                    data-info="'.$row->id.','.$row->name.','.$row->email.','.$row->city.','.$row->state.','.$row->zip.','.$row->address.','.$row->phone_number.'">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                </button>
                <button class="delete-modal btn btn-danger"
                    data-info="'.$row->id.','.$row->name.','.$row->email.','.$row->city.','.$row->state.','.$row->zip.','.$row->address.','.$row->phone_number.'">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>';
                return $btn;
            })

            ->make(true);
    }

    public function index(): View
    {
        return view('admin.pages.clients.index');
    }
}
