<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task; 
use App\Models\User;
class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::find(1);
        $taskk = new Task();
        $taskk->title = 'Task1';
        $taskk->description = 'Esto es la tarea 1 ';
        //$taskk->email_verified_at = now();
        $taskk->user_id = 10;      
          $taskk->save();
    }
}
