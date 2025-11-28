<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Services\TaskServices;

class TaskController extends Controller{

    function getAllTasks($id = null){
        if(!$id){
            $tasks = Task::all();
            return $this->responseJSON($tasks);
        }

        $task = Task::find($id);
        return $this->responseJSON($task);
    }

    function addOrUpdateTask(Request $request, $id = "add"){
        if($id == "add"){
            $task = new Task;
        }else{
            $task = Task::find($id);
            if(!$task){
                return $this->responseJSON(null, "failure", 400);
            }
        }

        $task->name = $request["name"];
        $task->color = $request["color"];
        $task->description = $request["description"];

        if($task->save()){
            return $this->responseJSON($task);
        }

        return $this->responseJSON(null, "failure", 400);
    }

}



//Task::first(); <- this is an obj
//Task::last(); <- this is an obj
//Task::where("title", "project")->get(); <- this is an array
//Task::where("title", "project")->first(); <- this is an obj
//Task::where()->orWhere()->get();
//Task::find(5)->delete();
//$task = Task::create([]); XXXXX 
//$task = Task::update([]);
//::where("age", >, 10); 
//::where("age", <>, 10); 
