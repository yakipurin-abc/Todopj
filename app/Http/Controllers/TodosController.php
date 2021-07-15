<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Todo;

class TodosController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('index', ['todos' => $todos]);
    }
    public function store(Request $request) {
        $this->validate($request, todo::$rules);
        $todo = new Todo();
        $todo->content = $request->content;
        $todo->save();
        return redirect('/');
    }
    public function update(Request $request) {
        $this->validate($request, todo::$rules);
        $todo = Todo::find($request->id);
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/');
    }
    public function delete(Request $request) {
        $todo = Todo::find($request->id);
        $todo->delete();
        return redirect('/');
    }
}