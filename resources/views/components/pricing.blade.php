<!-- Price -->
<section id="pricing" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Planes a medida para tu parroquia</h2>
            <p class="text-xl text-gray-600">Precios especiales para instituciones eclesiales</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <!-- Plan Básico -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <div class="bg-red-600 text-white py-4 px-6">
                    <h3 class="text-xl font-semibold">Básico</h3>
                    <p class="text-red-100">Perfecto para parroquias pequeñas</p>
                </div>
                <div class="p-6">
                    <div class="mb-6">
                        <span class="text-4xl font-bold">€29</span>
                        <span class="text-gray-500">/mes</span>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            Hasta 50 beneficiarios
                        </li>
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            Gestión de donaciones
                        </li>
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            5 usuarios
                        </li>
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            Soporte básico
                        </li>
                    </ul>
                    <a href="/register?plan=basic"
                        class="block w-full text-center px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition-colors">
                        Elegir plan
                    </a>
                </div>
            </div>

            <!-- Plan Recomendado -->
            <div class="border-2 border-red-600 rounded-lg overflow-hidden transform md:scale-105 shadow-lg">
                <div class="bg-red-700 text-white py-4 px-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-semibold">Estándar</h3>
                            <p class="text-red-100">El más popular</p>
                        </div>
                        <span class="bg-white text-red-700 text-xs font-bold px-2 py-1 rounded">RECOMENDADO</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="mb-6">
                        <span class="text-4xl font-bold">€59</span>
                        <span class="text-gray-500">/mes</span>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            Hasta 300 beneficiarios
                        </li>
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            Gestión completa
                        </li>
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            15 usuarios
                        </li>
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            Soporte prioritario
                        </li>
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            Informes diocesanos
                        </li>
                    </ul>
                    <a href="/register?plan=standard"
                        class="block w-full text-center px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition-colors">
                        Elegir plan
                    </a>
                </div>
            </div>

            <!-- Plan Diocesano -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <div class="bg-red-600 text-white py-4 px-6">
                    <h3 class="text-xl font-semibold">Diocesano</h3>
                    <p class="text-red-100">Para grandes necesidades</p>
                </div>
                <div class="p-6">
                    <div class="mb-6">
                        <span class="text-4xl font-bold">€99</span>
                        <span class="text-gray-500">/mes</span>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            Beneficiarios ilimitados
                        </li>
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            Gestión multi-parroquia
                        </li>
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            Usuarios ilimitados
                        </li>
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            Soporte 24/7
                        </li>
                        <li class="flex items-center">
                            <x-tabler-check class="h-5 w-5 text-red-500 mr-2" />
                            Informes consolidados
                        </li>
                    </ul>
                    <a href="/register?plan=diosesan"
                        class="block w-full text-center px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition-colors">
                        Elegir plan
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-8 text-gray-500">
            <p>¿Necesitas un plan personalizado? <a href="#contact" class="text-red-600 hover:underline">Contáctanos</a>
            </p>
        </div>
    </div>
</section>
