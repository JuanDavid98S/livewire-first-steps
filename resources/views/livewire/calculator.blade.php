<div class="max-w-xs mx-auto bg-gray-900 rounded-xl shadow-lg p-4 text-white">
    <!-- Display -->
    <div class="bg-gray-800 rounded-lg p-4 mb-4 text-right text-2xl font-mono tracking-wide h-20 flex flex-col items-end justify-center">
        <div>{{ $operation }}</div>
        <div class="text-lg text-gray-400">{{ $result }}</div>
    </div>

    <!-- Botones -->
    <div class="grid grid-cols-4 gap-3">
        <!-- Fila 1 -->
        <button wire:click="clear" class="bg-gray-700 hover:bg-gray-600 rounded-lg py-3 text-xl">C</button>
        <button wire:click="backspace" class="bg-gray-700 hover:bg-gray-600 rounded-lg py-3 text-xl flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9l-3 3m0 0l3 3m-3-3h12M6 6l-4 6 4 6h12a2 2 0 002-2V8a2 2 0 00-2-2H6z" />
            </svg>
        </button>
        <button wire:click="addToOperation('%')" class="bg-gray-700 hover:bg-gray-600 rounded-lg py-3 text-xl">%</button>
        <button wire:click="addToOperation('÷')" class="bg-orange-500 hover:bg-orange-400 rounded-lg py-3 text-xl">÷</button>

        <!-- Fila 2 -->
        <button wire:click="addToOperation('7')" class="bg-gray-800 hover:bg-gray-700 rounded-lg py-3 text-xl">7</button>
        <button wire:click="addToOperation('8')" class="bg-gray-800 hover:bg-gray-700 rounded-lg py-3 text-xl">8</button>
        <button wire:click="addToOperation('9')" class="bg-gray-800 hover:bg-gray-700 rounded-lg py-3 text-xl">9</button>
        <button wire:click="addToOperation('×')" class="bg-orange-500 hover:bg-orange-400 rounded-lg py-3 text-xl">×</button>

        <!-- Fila 3 -->
        <button wire:click="addToOperation('4')" class="bg-gray-800 hover:bg-gray-700 rounded-lg py-3 text-xl">4</button>
        <button wire:click="addToOperation('5')" class="bg-gray-800 hover:bg-gray-700 rounded-lg py-3 text-xl">5</button>
        <button wire:click="addToOperation('6')" class="bg-gray-800 hover:bg-gray-700 rounded-lg py-3 text-xl">6</button>
        <button wire:click="addToOperation('−')" class="bg-orange-500 hover:bg-orange-400 rounded-lg py-3 text-xl">−</button>

        <!-- Fila 4 -->
        <button wire:click="addToOperation('1')" class="bg-gray-800 hover:bg-gray-700 rounded-lg py-3 text-xl">1</button>
        <button wire:click="addToOperation('2')" class="bg-gray-800 hover:bg-gray-700 rounded-lg py-3 text-xl">2</button>
        <button wire:click="addToOperation('3')" class="bg-gray-800 hover:bg-gray-700 rounded-lg py-3 text-xl">3</button>
        <button wire:click="addToOperation('+')" class="bg-orange-500 hover:bg-orange-400 rounded-lg py-3 text-xl">+</button>

        <!-- Fila 5 -->
        <button wire:click="addToOperation('0')" class="col-span-2 bg-gray-800 hover:bg-gray-700 rounded-lg py-3 text-xl">0</button>
        <button wire:click="addToOperation('.')" class="bg-gray-800 hover:bg-gray-700 rounded-lg py-3 text-xl">.</button>
        <button wire:click="calculate" class="bg-green-500 hover:bg-green-400 rounded-lg py-3 text-xl">=</button>
    </div>
</div>
