<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    use WithoutModelEvents;

    public function run(): void{
        $this->call([
           TaskSeeder::class,
           //UserSeeder::class 
        ]);
    }
}

/*
Unit Testing ==> Functions/Methods Testing 
Feature Testing ==> A whole feature / route 

/get_tasks:
- middleware (auth)
- middleware (payment) 
- request form (validation)
- getAllTasks 
- services
- response 
*/