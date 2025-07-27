<div>
    <p class="text-center text-gray-600 text-lg mb-3">
        And this is a form with auto refreshing items
    </p>

    <form @if (!empty($taskId)) wire:submit="update({{ $taskId }})" @else wire:submit="store" @endif class="space-y-4">
        <!-- Refresh button -->
        <button 
            type="button"
            class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg shadow 
                   transition focus:outline-none focus:ring-2 focus:ring-green-400"
            title="Refresh form"
            wire:click="refreshForm"
        >
            <!-- Ícono Refresh -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M4 4v6h6M20 20v-6h-6M4 14a8 8 0 0115.31-3M20 10a8 8 0 01-15.31 3"/>
            </svg>
        </button>

        <!-- Title field -->
        <div>
            <input 
                type="text" 
                wire:model="form.title" 
                placeholder="Task Title"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
            @error('form.title') 
                <span class="text-sm text-red-500">{{ $message }}</span> 
            @enderror
        </div>
    
        <!-- Description field -->
        <div>
            <input 
                type="text" 
                wire:model="form.description" 
                placeholder="Task description"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
            @error('form.description') 
                <span class="text-sm text-red-500">{{ $message }}</span> 
            @enderror
        </div>
    
        <!-- Save button -->
        <button 
            type="submit"
            class="w-full bg-indigo-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400"
        >
            {{ $taskId ? 'Update' : 'save' }}
        </button>
    </form>
    
    <!-- Task list -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($tasks as $task)
            <div class="p-4 bg-white rounded-lg shadow hover:shadow-md transition flex flex-col justify-between">
                <!-- Task Info -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">{{ $task->title }}</h3>
                    <p class="text-gray-500 text-sm">{{ $task->description }}</p>
                    <span class="inline-block mt-2 px-2 py-1 text-xs font-semibold rounded-full 
                        {{ $task->status->value === 'done' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ ucfirst($task->status->value) }}
                    </span>
                </div>

                <div class="flex space-x-2 mt-3">
                    <!-- Update button -->
                    <button 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg shadow 
                               transition focus:outline-none focus:ring-2 focus:ring-blue-400"
                        wire:click="prepareUpdate({{ $task->id }})">
                        Update
                    </button>

                    <!-- Delete button -->
                    <button 
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg shadow 
                               transition focus:outline-none focus:ring-2 focus:ring-red-400"
                        wire:click="delete({{ $task->id }})" wire:confirm="Are you sure you want to delete this task?">
                        Delete
                    </button>

                    @if ($task->status->value === 'pending')
                        <!-- Mark as done button -->
                        <button 
                            class="flex items-center space-x-2 bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-lg shadow transition focus:outline-none focus:ring-2 focus:ring-green-400"
                            wire:click="markAsDone({{ $task->id }})">
                            Done
                            <!-- Check icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">No tasks yet. Add one above!</p>
        @endforelse
    </div>
    <!-- Lista de tareas completadas -->
    <div class="mt-8">
        <h3 class="text-lg font-semibold text-gray-700 mb-3">Completed Tasks</h3>
        <ul class="list-disc list-inside space-y-1 text-gray-600">
            @forelse ($completedTasks as $task)
                <li>
                    <strong>Title:</strong> {{ $task->title }}...
                    <strong>Done:</strong> {{ $task->description }}
                </li>
            @empty
                <li class="text-gray-400">No completed tasks yet.</li>
            @endforelse
        </ul>
    </div>

    @if (session()->has('message'))
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ session('message') }}</h2>
                <button 
                    type="button"
                    wire:click="cleanSession"
                    class="mt-4 bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    OK
                </button>
            </div>
        </div>
    @endif
</div>
