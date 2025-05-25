<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center mb-4">
                    <img src="images/favicon.svg" alt="Mi Caritas Logo" class="h-8 mr-2">
                    <span class="text-lg font-semibold">Mi Caritas</span>
                </div>
                <p class="text-gray-400">Sistema de gestión integral para Cáritas parroquiales. Optimizando la caridad
                    desde 2023.</p>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Enlaces</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/#features') }}" class="text-gray-400 hover:text-white">Funcionalidades</a>
                    </li>
                    <li><a href="{{ url('/#pricing') }}" class="text-gray-400 hover:text-white">Precios</a></li>
                    <li><a href="{{ url('/#contact') }}" class="text-gray-400 hover:text-white">Contacto</a></li>
                    <li><a href="/blog" class="text-gray-400 hover:text-white">Blog</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Legal</h4>
                <ul class="space-y-2">
                    <li><a href="/privacidad" class="text-gray-400 hover:text-white">Política de privacidad</a></li>
                    <li><a href="/terminos" class="text-gray-400 hover:text-white">Términos de servicio</a></li>
                    <li><a href="/cookies" class="text-gray-400 hover:text-white">Política de cookies</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Síguenos</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <x-tabler-brand-facebook class="h-8 w-8" />
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <x-tabler-brand-instagram class="h-8 w-8" />
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <x-tabler-brand-linkedin class="h-8 w-8" />
                    </a>
                </div>
                <div class="mt-8 max-w-md">
                    <p class="text-gray-600 mb-2 text-sm">Suscríbete a nuestro boletín</p>
                    <form class="flex shadow rounded-lg overflow-hidden">
                        <input type="email" placeholder="Tu email"
                            class="w-full px-4 py-2 text-gray-700 bg-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <button type="submit"
                            class="bg-red-600 text-white px-5 py-2 hover:bg-red-700 transition-colors">
                            OK
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p class="flex items-center justify-center gap-1 text-gray-400">
                Hecho por
                <a href="https://github.com/daljo25" target="_blank" rel="noopener noreferrer"
                    class="inline-flex items-center gap-1 text-gray-400 hover:text-white transition">
                    <x-tabler-brand-github class="w-5 h-5" />
                    <span>Daljo25</span>
                </a>
            </p>
        </div>
    </div>
</footer>
