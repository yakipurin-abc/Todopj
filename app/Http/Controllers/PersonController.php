<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('select * from people');
        return view('index', ['items' => $items]);
    }
    public function add(Request $request)
    {
        return view('add');
    }
    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name, age) values (:name, :age)', $param);
        return redirect('/');
    }
}