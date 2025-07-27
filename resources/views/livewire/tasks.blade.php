<div>
    <p class="text-center text-gray-600 text-lg mb-3">
        And this is a form with auto refreshing items
    </p>

    <form wire:submit="store" class="space-y-4">
        <!-- Campo Título -->
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
    
        <!-- Campo Descripción -->
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
    
        <!-- Botón Guardar -->
        <button 
            type="submit"
            class="w-full bg-indigo-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400"
        >
            Save
        </button>
    </form>
    
    <!-- Listado de tareas -->
    <div class="mt-8 space-y-4">
        @forelse($tasks as $task)
            <div class="p-4 bg-white rounded-lg shadow hover:shadow-md transition flex justify-between items-start">
                <!-- Información de la tarea -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">{{ $task->title }}</h3>
                    <p class="text-gray-500 text-sm">{{ $task->description }}</p>
                    <span class="inline-block mt-2 px-2 py-1 text-xs font-semibold rounded-full 
                        {{ $task->status === 'done' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ ucfirst($task->status->value) }}
                    </span>
                </div>

                <!-- Botón eliminar -->
                <button 
                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg shadow 
                        transition focus:outline-none focus:ring-2 focus:ring-red-400"
                    wire:click="delete({{ $task->id }})" wire:confirm="Are you sure you want to delete this task?">
                    Delete
                </button>
            </div>
        @empty
            <p class="text-center text-gray-500">No tasks yet. Add one above!</p>
        @endforelse
    </div>

</div>