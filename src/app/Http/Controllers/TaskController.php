<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TextInput;
use Datetime;
use DB;

class TaskController extends Controller
{
    public function index (){

        $tasks_checklimit = Task::all();

        $today = new DateTime('0:0:0');
     
        foreach($tasks_checklimit as $task){
            $limit_day = new DateTime($task->limit);
            if($limit_day < $today){
                $task->over_limit = true;
                $task->save();
            }
            if($limit_day >= $today){
                $task->over_limit = false;
                $task->save();
            }
        }

        $tasks = Task::orderBy('limit','asc')->orderBy('priority','asc')
        ->orderBy('created_at', 'asc')->get();

        $task_exit = false;
        if(count($tasks)>0){
            $task_exit = true;
        }

        return view('tasks', compact('task_exit','tasks'));
    }

    public function add(TextInput $request) {

        $task = new Task();
        $task->name = $request->name;
        $task->priority = $request->priority;
        $task->limit = $request->limit;

        $task->save();

        return redirect('/tasks');
    }

    public function edit_open(Task $tasks){

       return view('/edits', ['tasks' => $tasks]);
    }

     public function edit_execute(TextInput $request ,Task $tasks){

        $tasks->name = $request->name;
        $tasks->priority = $request->priority;
        $tasks->limit = $request->limit;

        $tasks->save();

        return redirect('/tasks');
    }

    public function delete(Task $tasks) {
        $tasks->delete();

        return redirect('/tasks');  
    }      

}
