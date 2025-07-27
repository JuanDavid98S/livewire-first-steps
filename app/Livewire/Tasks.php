<?php

namespace App\Livewire;

use App\Enums\TaskStatusEnum;
use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tasks extends Component
{
    public TaskForm $form;
    public $tasks = [];
    public $completedTasks = [];
    public $taskId = '';

    public function mount()
    {
        $this->tasks = $this->listTasks();
        $this->completedTasks = $this->listCompletedTasks();
    }

    public function store()
    {
        // Validated only when the form is submitted
        $this->validate();

        Task::create([
            'title' => $this->form->title,
            'description' => $this->form->description,
            'user_id' => Auth::id() ?? 1, // Just a user to fill the relationship
        ]);

        // Clean form and validation errors
        $this->form->reset();
        $this->resetValidation();

        //Notifying
        session()->flash('message', 'Task saved successfully');

        // Recharges tasks
        $this->tasks = $this->listTasks();
    }

    public function listTasks()
    {
        return Task::latest()
            ->where('status', TaskStatusEnum::PENDING)
            ->get();
    }

    public function listCompletedTasks()
    {
        return Task::latest()
            ->where('status', TaskStatusEnum::DONE)
            ->get();
    }

    public function delete(Task $task)
    {
        $task->delete();
        $this->tasks = $this->listTasks();
        session()->flash('message', 'Task Deleted successfully');
    }

    public function prepareUpdate(Task $task)
    {
        $this->form->reset();
        $this->form->title = $task->title;
        $this->form->description = $task->description;
        $this->taskId = $task->id;
    }

    public function update(Task $task)
    {
        $this->validate();

        $task->update([
            'title' => $this->form->title,
            'description' => $this->form->description
        ]);

        //Notifying
        session()->flash('message', 'Task updated successfully');

        //Reset form, validation
        $this->refreshForm();
        $this->tasks = $this->listTasks();
    }

    public function markAsDone(Task $task)
    {
        $task->status = TaskStatusEnum::DONE;
        $task->save();

        $this->tasks = $this->listTasks();
        $this->completedTasks = $this->listCompletedTasks();
        session()->flash('message', 'You have completed a task, congratulations!');
    }

    public function refreshForm()
    {
        $this->form->reset();
        $this->resetValidation();
        $this->taskId = '';
    }

    public function cleanSession()
    {
        session()->forget('message');
    }

    public function render()
    {
        return view('livewire.tasks');
    }
}
