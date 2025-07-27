<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\ENums\TaskStatusEnum;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id'
    ];

    /**

    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
    protected function casts(): array
    {
        return [
            'status' => TaskStatusEnum::class,
        ];
    }
}
