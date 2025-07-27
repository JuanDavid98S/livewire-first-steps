<div class="flex flex-col items-center space-y-4">
    <p class="text-center text-gray-600 text-lg">
        So, here goes a counter
    </p>

    <div class="flex items-center space-x-2">
        <!-- Botón "-" -->
        <button 
            wire:click="decrement"
            class="bg-red-500 text-white px-4 py-2 rounded-l-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition">
            -
        </button>

        <!-- Input -->
        <input 
            type="text"
            wire:model="count"
            class="w-16 text-center border-t border-b border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 rounded-none"
            readonly
        >

        <!-- Botón "+" -->
        <button 
            wire:click="increment"
            class="bg-green-500 text-white px-4 py-2 rounded-r-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 transition">
            +
        </button>
    </div>
</div>
