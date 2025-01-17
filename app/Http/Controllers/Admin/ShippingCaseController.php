<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Models\ShippingCase;
use App\Http\Requests\CreateShippingCaseRequest;
use App\Http\Requests\UpdateShippingCaseRequest;
use Illuminate\Http\RedirectResponse;

class ShippingCaseController extends Controller
{
    
    public function getJson(): JsonResponse
    {
        $collection = ShippingCase::query();

        return DataTables::of($collection)          
            
           
            ->addColumn('action', function ($row) {
                $editUrl = route('admin.shipping-cases.edit', $row->id);
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
        return view('admin.pages.shipping-case.index');
    }
 
    public function edit(Request $request,$id): View
    {
        $ship = ShippingCase::find($id);
        return view('admin.pages.shipping-case.edit',compact('ship'));
    }

    public function create(): View
    {            
        return view('admin.pages.shipping-case.create');
    }

    public function store(CreateShippingCaseRequest $request): RedirectResponse
    {
        
        $ship = ShippingCase::create([           
            'manufacture' => $request['manufacture'],
            'model_number' => $request['model_number'],
            'serial_number' => $request['serial_number'],
            'asset_tag' => $request['asset_tag'],
        ]);
 
        return to_route('admin.shipping-cases.index')->with('success', 'Shipping Case created successfully!');;
    }


    public function update(UpdateShippingCaseRequest $request,$id): RedirectResponse
    {
        $ship = ShippingCase::find($id);

        $data = array(
            'manufacture' => $request['manufacture'],
            'model_number' => $request['model_number'],
            'serial_number' => $request['serial_number'],
            'asset_tag' => $request['asset_tag'],            
        );
        
        $ship->update($data);

        return to_route('admin.shipping-cases.index')->with('success', 'Shipping Case updated successfully!');;
    }


    public function destroy(Request $request): RedirectResponse
    {
        $ship = ShippingCase::find($request['id']);
        $ship->delete();
        return to_route('admin.shipping-cases.index')->with('success', 'Shipping Case deleted successfully!');;
    }
}
