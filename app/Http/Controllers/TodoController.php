<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;


class TodoController extends Controller
{
    public function index(){
        $Todo = Todo::all();
        
        //dd($Todo);

        return view('todos.index', ['todos' => $Todo]);
    }

    public function create(){
        return view('todos.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required|string', // タイトルは必須
        ], [
            'title.required' => 'タスクのタイトルを入力してください。',
        ]);

        if ($validator->fails()) {
            return redirect()->route('todos.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        $todo = new Todo();
        $todo->title = $request->input('title');
        $todo->save();

        return redirect()->route('todos.index');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * 編集したTODOを更新する
     */
    public function update(Request $request, Todo $todo)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string', // タイトルは必須
        ], [
            'title.required' => 'タスクのタイトルを入力してください。',
        ]);

        if ($validator->fails()) {
            return redirect()->route('todos.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        $todo->title = $request->input('title');
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'TODOが更新されました');
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return redirect()->route('todos.index')->with('error', '指定されたTODOが見つかりませんでした');
        }

        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'TODOが削除されました');
    }

    public function error(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string', // タイトルは必須
        ], [
            'title.required' => 'タスクのタイトルを入力してください。',
        ]);

        if ($validator->fails()) {
            return redirect()->route('todos.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        $todo = new Todo();
        $todo->title = $request->input('title');
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'タスクが追加されました。');
    }

}
