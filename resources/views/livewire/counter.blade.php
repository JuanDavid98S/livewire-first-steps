<div>
    <h1>Se supone que es un contador, con opción para sumar uno y restar uno.</h1>

    <div class="flex items-center justify-center space-x-2">
        <!-- Botón "-" -->
        <button 
            class="bg-red-500 text-white px-4 py-2 rounded-l-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition">
            -
        </button>

        <!-- Campo de entrada -->
        <input 
            type="text"
            class="w-20 text-center border-t border-b border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 rounded-none"
            readonly
        >

        <!-- Botón "+" -->
        <button 
            class="bg-green-500 text-white px-4 py-2 rounded-r-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 transition">
            +
        </button>
    </div>

</div>
