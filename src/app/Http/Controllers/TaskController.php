<?php

namespace App\Http\Controllers;

use App\Task;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TextInput;
use Datetime;

class TaskController extends Controller
{
    public function index (){

        $tasks_checklimit = Task::all();

        $today = new DateTime();

        foreach($tasks_checklimit as $task){
            $limit_day = new DateTime($task->limit);
            if($limit_day < $today){
                $task->over_limit = true;
                $task->save();
            }
        }


        // sort('HI')
        $tasks_pri1 = Task::where('priority','HI')
                ->orderBy('created_at', 'asc')->get();
        // sort('MID')
        $tasks_pri2 = Task::where('priority','MID')
                ->orderBy('created_at', 'asc')->get();
        // sort('LOW')
        $tasks_pri3= Task::where('priority','LOW')
                ->orderBy('created_at', 'asc')->get();


        $task_exit = false;
        if(count($tasks_pri1)>0||count($tasks_pri2)>0||count($tasks_pri3)>0){
            $task_exit = true;
        }

        $tasks = ['tasks_pri1'=>$tasks_pri1,'tasks_pri2'=>$tasks_pri2,'tasks_pri3'=>$tasks_pri3];

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


    public function delete(Task $tasks) {
        $tasks->delete();

        return redirect('/tasks');
}

    public function edit_open(Task $tasks){


       return view('/edits', ['tasks' => $tasks]);
     }

     public function edit_execute(TextInput $request ,Task $tasks ){


        $tasks->name = $request->name;
        $tasks->priority = $request->priority;
        $tasks->limit = $request->limit;
        $tasks->save();

        return redirect('/tasks');
    }
}
