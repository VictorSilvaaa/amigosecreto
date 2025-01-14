<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function create()
    {
        return view('group.create');
    }

    public function store(Request $request)
    {
        return response()->json(['criado com sucesso!', $request->all()]);
    }
}
