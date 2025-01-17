<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Models\Contact;
use App\Models\User;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function getJson(): JsonResponse
    {
        $collection = Contact::with('client');

        return DataTables::of($collection)          
            
            ->addColumn('client_name', function ($contact) {
                return $contact->client_name;
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('admin.contacts.edit', $row->id);
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
        return view('admin.pages.contact.index');
    }
 
    public function edit(Request $request,$id): View
    {
        $contact = Contact::find($id);
        $users = User::select('id','name')->orderBy('name','asc')->get();
        return view('admin.pages.contact.edit',compact('contact','users'));
    }

    public function create(): View
    {            
        $users = User::select('id','name')->orderBy('name','asc')->get();
        return view('admin.pages.contact.create',compact('users'));
    }

    public function store(CreateContactRequest $request): RedirectResponse
    {
        
        $contact = Contact::create([           
            'user' => $request['user'],
            'name' => $request['name'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],   
        ]);
 
        return to_route('admin.contacts.index')->with('success', 'Contact created successfully!');;
    }


    public function update(UpdateContactRequest $request,$id): RedirectResponse
    {
        $contact = Contact::find($id);

        $data = array(
            'user' => $request['user'],
            'name' => $request['name'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],            
        );
        
        $contact->update($data);

        return to_route('admin.contacts.index')->with('success', 'Contact updated successfully!');;
    }


    public function destroy(Request $request): RedirectResponse
    {
        $contact = Contact::find($request['id']);
        $contact->delete();
        return to_route('admin.contacts.index')->with('success', 'Contact deleted successfully!');;
    }
}
