<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Models\Equipment;
use App\Models\User;
use App\Models\EquipmentType;
use App\Models\ShippingCase;
use App\Http\Requests\CreateEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use Illuminate\Http\RedirectResponse;

class EquipmentController extends Controller
{
    
    public function getJson(): JsonResponse
    {
        $collection = Equipment::query();

        return DataTables::of($collection)          
            
            ->addColumn('client_name', function ($equipment) {
                return $equipment->client_name;
            })
            ->addColumn('equipment_type_name', function ($equipment) {
                return $equipment->equipment_type_name;
            })
            ->addColumn('shipping_case_number', function ($equipment) {
                return $equipment->shipping_case_number;
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('admin.equipments.edit', $row->id);
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
        return view('admin.pages.equipment.index');
    }
 
    public function edit(Request $request,$id): View
    {
        $equipment = Equipment::find($id);
        $users = User::select('id','name')->orderBy('name','asc')->get();
        $types = EquipmentType::select('id','type_name')->orderBy('type_name','asc')->get();
        $shippings = ShippingCase::select('id','model_number')->orderBy('model_number','asc')->get();
        return view('admin.pages.equipment.edit',compact('equipment','users','types','shippings'));
    }

    public function create(): View
    {            
        $users = User::select('id','name')->orderBy('name','asc')->get();
        $types = EquipmentType::select('id','type_name')->orderBy('type_name','asc')->get();
        $shippings = ShippingCase::select('id','model_number')->orderBy('model_number','asc')->get();
        return view('admin.pages.equipment.create',compact('users','types','shippings'));
    }

    public function store(CreateequipmentRequest $request): RedirectResponse
    {
        
        $equipment = Equipment::create([                       
            'purchase_date'=> $request['purchase_date'],
            'purchase_from'=> $request['purchase_from'],
            'invoice_number'=> $request['invoice_number'],
            'user'=> $request['user'],
            'equipment_type'=> $request['equipment_type'],
            'manufacture'=> $request['manufacture'],
            'equipment_model'=> $request['equipment_model'],
            'serial_number'=> $request['serial_number'],
            'asset_tag'=> $request['asset_tag'],
            'case_color'=> $request['case_color'],
            'operating_system'=> $request['operating_system'],
            'separate_keyboard'=> $request['separate_keyboard'],
            'keyboard_model'=> $request['keyboard_model'],
            'dongle'=> $request['dongle'],
            'dongle_asset_tag'=> $request['dongle_asset_tag'],
            'power_adapter_asset_tag'=> $request['power_adapter_asset_tag'],
            'computer_name'=> $request['computer_name'],
            'shipping_case'=> $request['shipping_case']
        ]);
 
        return to_route('admin.equipments.index')->with('success', 'Equipment created successfully!');;
    }


    public function update(UpdateequipmentRequest $request,$id): RedirectResponse
    {
        $equipment = Equipment::find($id);

        $data = array(
            'purchase_date'=> $request['purchase_date'],
            'purchase_from'=> $request['purchase_from'],
            'invoice_number'=> $request['invoice_number'],
            'user'=> $request['user'],
            'equipment_type'=> $request['equipment_type'],
            'manufacture'=> $request['manufacture'],
            'equipment_model'=> $request['equipment_model'],
            'serial_number'=> $request['serial_number'],
            'asset_tag'=> $request['asset_tag'],
            'case_color'=> $request['case_color'],
            'operating_system'=> $request['operating_system'],
            'separate_keyboard'=> $request['separate_keyboard'],
            'keyboard_model'=> $request['keyboard_model'],
            'dongle'=> $request['dongle'],
            'dongle_asset_tag'=> $request['dongle_asset_tag'],
            'power_adapter_asset_tag'=> $request['power_adapter_asset_tag'],
            'computer_name'=> $request['computer_name'],
            'shipping_case'=> $request['shipping_case']           
        );
        
        $equipment->update($data);

        return to_route('admin.equipments.index')->with('success', 'Equipment updated successfully!');;
    }


    public function destroy(Request $request): RedirectResponse
    {
        $equipment = Equipment::find($request['id']);
        $equipment->delete();
        return to_route('admin.equipments.index')->with('success', 'Equipment deleted successfully!');;
    }
}
