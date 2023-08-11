<div class="fixed left-0 top-0 p-4 bg-gray-200 mb-8 flex">
    <div x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
        <div x-show="open" class="mt-2">
            <ul class="space-y-2">
                <li><a href="/tipomaterial" class="hover:text-blue-500">Material</a></li>
                <li><a href="/servicios_importados" class="hover:text-blue-500">Servicios</a></li>
                <li><a href="/talleres" class="hover:text-blue-500">Taller</a></li>
                <!-- Agrega más elementos de menú si es necesario -->
            </ul>
        </div>
    </div>
</div>