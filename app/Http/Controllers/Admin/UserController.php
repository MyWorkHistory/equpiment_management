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

        return DataTables::of($collection)->make(true);
    }

    public function index(): View
    {
        return view('admin.pages.clients.index');
    }
}
