<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskComponent extends Component
{
    public $id;
    public $tasks = [];
    public $title;
    public $description;
    public $modal = false;

    public function mount()
    {

        $this->tasks = $this->getTask();
        // Después de obtener las tareas, refrescamos
        $this->refreshTasks();
    }

    public function render()
    {
        return view('livewire.task-component', [
            'tasks' => $this->tasks,
            'modal' => $this->modal,
        ]);
    }

    public function clearFields()
    {
        $this->title = '';
        $this->description = '';
    }

    public function openCreateModal()
    {
        $this->clearFields();
        $this->modal = true;
        // Refrescar tareas al abrir el modal
        $this->refreshTasks();
    }

    public function closeCreateModal()
    {
        $this->clearFields();
        $this->modal = false;
        // Refrescar tareas al cerrar el modal
        $this->refreshTasks();
    }

    // Método para refrescar las tareas desde la base de datos
    public function refreshTasks()
    {
        $user = Auth::user();
        $this->tasks = $user ? Task::where('user_id', $user->id)->get() : collect();
    }

    public function getTask()
    {
        $user = Auth::user();
        return         $this->tasks = $user ? Task::where('user_id', $user->id)->get() : collect();
    }

    public function createTask()
    {
        $user = Auth::user();

       
        if ($this->id) {
            Task::updateOrCreate(
                ['id' => $this->id, 'user_id' => $user->id],
                ['title' => $this->title, 'description' => $this->description]
            );
        } else {
            
            $newtaskk = new Task();
            $newtaskk->title = $this->title;
            $newtaskk->description = $this->description;
            $newtaskk->user_id = $user->id;
            $newtaskk->save();
        }

        $this->clearFields();
        $this->modal = false;
        $this->tasks = $this->getTask();
        $this->refreshTasks();
    }

    public function updatetask(Task $task)
    {
        $this->id = $task->id;
        $this->title = $task->title;
        $this->description = $task->description;

        $this->modal = true;
    }


    public function delete(Task $task)
    {
        $task->delete();
        $this->tasks = $this->getTask()->sortbyDesc('id');
    }
}
