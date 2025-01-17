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
use App\Http\Requests\ClientUpdateRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    
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
                    <button data-toggle="modal" data-target="#delete-modal" class="delete-modal btn btn-danger" data-id="' . $row->id . '">
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
 
        return to_route('admin.clients.index')->with('success', 'Client created successfully!');;
    }


    public function update(ClientUpdateRequest $request,$id): RedirectResponse
    {
        $user = User::find($id);

        $data = array(
            'name' => $request['name'],
            'email' => $request['email'],            
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zip' => $request['zip'],
            'phone_number' => $request['phone_number'],
        );
        if($user->account_password != $request['account_password']){
            $data['password'] = Hash::make($request['account_password']);
            $data['account_password'] =$request['account_password'];
        }
        $user->update($data);

        return to_route('admin.clients.index')->with('success', 'Client updated successfully!');;
    }


    public function destroy(Request $request): RedirectResponse
    {
        $user = User::find($request['id']);
        $user->delete();
        return to_route('admin.clients.index')->with('success', 'Client deleted successfully!');;
       
    }
}
