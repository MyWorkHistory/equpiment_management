<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ClientStoreRequest;
 

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getJson(): JsonResponse
    {
        $collection = User::query();

        return DataTables::of($collection)          
            
           
            ->addColumn('action', function ($row) {
                $editUrl = route('admin.clients.edit', $row->id);
                $btn = '
                    <a class="edit-modal btn btn-info" href="' . $editUrl . '">
                        <span class="glyphicon glyphicon-edit"></span> Edit
                    </a>
                    <button class="delete-modal btn btn-danger" data-info="' . $row->id . '">
                        <span class="glyphicon glyphicon-trash"></span> Delete
                    </button>
                ';
                return $btn;
            })

            ->make(true);
    }

    public function index(): View
    {
        return view('admin.pages.clients.index');
    }

    public function edit(Request $request,$id): View
    {
        $user = User::find($id);
        return view('admin.pages.clients.edit',compact('user'));
    }

    public function create(): View
    {    
        $this->authorize('create', Resource::class);     
        dd(auth()->user());
        return view('admin.pages.clients.create');
    }

    public function store(ClientStoreRequest $request): RedirectResponse
    {
        
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['account_password']),
            'account_password' => $request['account_password'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zip' => $request['zip'],
            'phone_number' => $request['phone_number'],
        ]);
 
        return to_route('admin.clients.index');
    }
}
