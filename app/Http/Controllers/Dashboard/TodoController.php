<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'dashboard.todos.create',
            [
                'boards' => Board::where('user_id', Auth::id())->get()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'deadline' => 'required|date',
            'board_id' => 'required|integer'
        ]);

        Todo::create([
            'title'    => $request->title,
            'deadline' => $request->deadline,
            'board_id' => $request->board_id,
            'topic' => $request->topic,
            'user_id' => Auth::id()
        ]);

        return redirect('dashboard/boards');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('dashboard.todos.info', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('dashboard.todos.edit', [
            'todo' => $todo,
            'boards' => Board::where('user_id', Auth::id())->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        if (Auth::id() == $todo->user_id) {
            $todo->fill($request->post())->update();
            $todo->save();

            return redirect('dashboard/boards');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        if (Auth::id() == $todo->user_id) {
            $todo->delete();

            return redirect('dashboard/boards');
        }
    }

    public function complated($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->state = 1;
        $todo->save();

        return redirect('dashboard/boards');
    }
}
