<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TodoListRequests;
use App\Http\Resources\Api\TodoListResource;
use App\Models\TodoList;
use App\Models\User;
use App\Traits\ApiResponse;
use App\Traits\FindTodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    use ApiResponse, FindTodoList;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $todo_lists = Auth::user()->todos()->orderBy('completed', 'asc')->get();
        return TodoListResource::collection($todo_lists);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(TodoListRequests $request)
    {
        $to_do_list_request = array_merge($request->validated(), ['user_id' => Auth::id()]);
        $to_do_list = TodoList::create($to_do_list_request);
        return new TodoListResource($to_do_list);
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoList $to_do_list)
    {
        // $todo_list = $this->todolist($todolist_id);
        // if (!$todo_list) return $this->message('Todo list not found', 500);
        return new TodoListResource($to_do_list);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoListRequests $request, TodoList $to_do_list)
    {
        // dd($request);
        $to_do_list->update($request->validated());
        return new TodoListResource($to_do_list);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoList $to_do_list)
    {
        $to_do_list->delete();
        return $this->message('Todo List deleted successfully', 200);
    }
}
