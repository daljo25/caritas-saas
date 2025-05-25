    <!-- Header -->
    <header class="bg-white shadow-sm py-4">
        <div class="container flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="images/favicon.svg" alt="Red heart logo with a friendly smile, representing Mi Caritas. The logo appears cheerful and welcoming. White background." class="h-10 mr-3">
                    <span class="text-3xl font-semibold text-red-700">Mi Caritas</span>
                </a>
            </div>
            <nav class="">
                <ul class="flex space-x-8">
                    <li><a href="#features" class="text-gray-700 hover:text-red-600">Funcionalidades</a></li>
                    <li><a href="#pricing" class="text-gray-700 hover:text-red-600">Precios</a></li>
                    <li><a href="#contact" class="text-gray-700 hover:text-red-600">Contacto</a></li>
                    <li><a href="/admin" class="text-red-600 font-medium">Iniciar Sesión</a></li>
                </ul>
            </nav>
            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    <li><a href="#features" class="text-gray-700 hover:text-red-600">Funcionalidades</a></li>
                    <li><a href="#pricing" class="text-gray-700 hover:text-red-600">Precios</a></li>
                    <li><a href="#contact" class="text-gray-700 hover:text-red-600">Contacto</a></li>
                    <li><a href="/admin" class="text-red-600 font-medium">Iniciar Sesión</a></li>
                </ul>
            </nav>
            <button class="md:hidden text-gray-700">
                <x-tabler-menu />
            </button>
        </div>
    </header>