<?php

namespace App\Livewire\Forms;

use App\Enums\TaskStatusEnum;
use Livewire\Form;

class TaskForm extends Form
{
    public $title = '';
    public $description = '';
    public $status = TaskStatusEnum::PENDING;

    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'description' => 'required|max:500',
        ];
    }
}
