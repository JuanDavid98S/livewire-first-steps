<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tasks extends Component
{
    public TaskForm $form;
    public $tasks = [];

    public function mount()
    {
        $this->tasks = $this->listTasks();
    }

    public function store()
    {
        // Valida solo cuando se envía el formulario
        $this->validate();

        Task::create([
            'title' => $this->form->title,
            'description' => $this->form->description,
            'user_id' => Auth::id() ?? 1, // Usuario por defecto
        ]);

        // Limpia formulario y errores de validación
        $this->form->reset();
        $this->resetValidation(); // limpia errores

        // Recarga la lista de tareas
        $this->tasks = $this->listTasks();
    }

    public function listTasks()
    {
        return Task::latest()->get();
    }

    public function delete(Task $task)
    {
        $task->delete();
        $this->tasks = $this->listTasks();
    }

    public function render()
    {
        return view('livewire.tasks');
    }
}
