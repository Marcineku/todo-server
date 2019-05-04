<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;
use App\Models\TodoListRecord;

class TodoController extends Controller
{
    public function get_lists(Request $request)
    {
        $user = $request->user();
        return $user->todo_lists()->get();
    }

    public function get_list(Request $request, Int $id)
    {
        $user = $request->user();
        return TodoList::where('user_id', $user->id)
            ->where('id', $id)
            ->first();
    }

    public function create_list(Request $request)
    {
        $user = $request->user();
        $list = new TodoList([
            'name' => $request->name,
            'user_id' => $user->id
        ]);
        $list->save();

        return response()->json([
            'message' => 'Successfully created new list!'
        ], 201);
    }

    public function delete_list(Request $request, Int $id)
    {
        $user = $request->user();
        TodoList::where('user_id', $user->id)
            ->where('id', $id)
            ->delete();

        return response()->json([
            'message' => 'Successfully deleted list!'
        ], 200);
    }

    public function update_list(Request $request, Int $id)
    {
        $user = $request->user();
        $list = TodoList::where('user_id', $user->id)
            ->where('id', $id)
            ->first();
        $list->name = $request->name;
        $list->save();

        return response()->json([
            'message' => 'Successfully updated list!'
        ], 200);
    }

    public function get_records(Request $request, Int $list_id)
    {
        return TodoListRecord::where('list_id', $list_id)->get();
    }

    public function get_record(Request $request, Int $list_id, Int $id)
    {
        return TodoListRecord::where('list_id', $list_id)
            ->where('id', $id)->first();
    }

    public function create_record(Request $request, Int $list_id)
    {
        $record = new TodoListRecord([
            'content' => $request->content,
            'list_id' => $list_id
        ]);
        $record->save();

        return response()->json([
            'message' => 'Successfully created new record!'
        ], 201);
    }

    public function delete_record(Request $request, Int $list_id, Int $id)
    {
        TodoListRecord::where('list_id', $list_id)
            ->where('id', $id)
            ->delete();

        return response()->json([
            'message' => 'Successfully deleted list!'
        ], 200);
    }

    public function update_record(Request $request, Int $list_id, Int $id)
    {
        $record = TodoListRecord::where('list_id', $list_id)
            ->where('id', $id)
            ->first();
        $record->content = $request->content;
        $record->is_done = $request->is_done;
        $record->save();

        return response()->json([
            'message' => 'Successfully updated record!'
        ], 200);
    }
}
