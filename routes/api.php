<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\TaskController;
use App\Http\Controllers\Admin\TaskController as TaskAdminController;

//Authenticated Routes
Route::group(["prefix" => "v0.1", "middleware" => "auth:api"], function(){
    
    Route::group(["middleware" => "auth.payment"], function(){
        Route::group(["prefix" => "user"], function(){
            Route::get('/tasks/{id?}', [TaskController::class, "getAllTasks"])->name("task-listing");
            Route::post('/add_update_task/{id?}', [TaskController::class, "addOrUpdateTask"]);
        });
    });

    //Authenticated Routes
    Route::group(["prefix" => "admin"], function(){
        Route::post('/delete_tasks', [TaskAdminController::class, "deleteAllTasks"]);
    });
});

//Unauthenticated Routes
Route::post('/login', [AuthController::class, "login"]);
Route::post('/register', [AuthController::class, "register"]);
Route::get('/error', [AuthController::class, "displayError"])->name("login");




/*
1- Routing DONE
2- Migrations DONE
3- Controllers DONE
5- Services DONE
6- Traits DONE

7- Middlewares DONE
6- Seeders / Factory DONE
9- Testing

4- Models 
8- Advancded Models 

*/  




