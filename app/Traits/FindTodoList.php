<?php

namespace App\Traits;

use App\Models\TodoList;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

trait FindTodoList{
    use ApiResponse;
    protected function todolist(string $todo_list_id)
    {

        $todo_list = TodoList::where('id', $todo_list_id )
            ->where('user_id', Auth::id())
            ->first();  

            if (!$todo_list) {
                throw new ModelNotFoundException('Todo list not found');
            }

        return $todo_list;
    }

}

