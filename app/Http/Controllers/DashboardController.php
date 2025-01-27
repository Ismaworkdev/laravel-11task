<?php

namespace App\Http\Controllers;



use App\Livewire\TaskComponent;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        

        $user = Auth::user(); // Obtén el usuario autenticado

        if ($user) {
            $tasks = $user->task; // Asegúrate de usar ->get() para obtener una colección
        } else {
            $tasks = collect(); // Si no hay usuario autenticado, devuelve una colección vacía
        }
        $taskComponent = new TaskComponent();
        $modal = $taskComponent->modal;
        $abrir = $taskComponent->openCreateModal();
        $cerrar = $taskComponent->closeCreateModal();
        return view('dashboard', compact('tasks', 'modal', 'abrir', 'cerrar'));
    }
}
