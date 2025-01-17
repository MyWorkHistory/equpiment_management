<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Models\EquipmentType;
use App\Http\Requests\CreateEquipmentTypeRequest;
use App\Http\Requests\UpdateEquipmentTypeRequest;
use Illuminate\Http\RedirectResponse;

class EquipmentTypeController extends Controller
{
    public function index(): View
    {
        return view('admin.pages.equipment-type.index');
    }

    public function getJson(): JsonResponse
    {
        $collection = EquipmentType::query();

        return DataTables::of($collection)          
            
           
            ->addColumn('action', function ($row) {
                $editUrl = route('admin.equipment-types.edit', $row->id);
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
 
    public function edit(Request $request,$id): View
    {
        $e_type = EquipmentType::find($id);
        return view('admin.pages.equipment-type.edit',compact('e_type'));
    }

    public function create(): View
    {            
        return view('admin.pages.equipment-type.create');
    }

    public function store(CreateEquipmentTypeRequest $request): RedirectResponse
    {
        
        $e_type = EquipmentType::create([
            'type_name' => $request['type_name'],           
        ]);
 
        return to_route('admin.equipment-types.index')->with('success', 'Equipment Type created successfully!');;
    }


    public function update(UpdateEquipmentTypeRequest $request,$id): RedirectResponse
    {
        $e_type = EquipmentType::find($id);

        $data = array(
            'type_name' => $request['type_name'],             
        );
        
        $e_type->update($data);

        return to_route('admin.equipment-types.index')->with('success', 'Equipment Type updated successfully!');;
    }


    public function destroy(Request $request): RedirectResponse
    {
        $e_type = EquipmentType::find($request['id']);
        $e_type->delete();
        return to_route('admin.equipment-types.index')->with('success', 'Equipment Type deleted successfully!');;
       
    }

}
