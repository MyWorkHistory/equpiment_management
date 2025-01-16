<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class EquipmentTypeController extends Controller
{
    public function index(): View
    {
        return view('admin.pages.equipment-type.index');
    }
}
