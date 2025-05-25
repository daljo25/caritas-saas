<x-layout>

    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Solicitar acceso al sistema</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tenant-request.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium text-sm text-gray-700">Nombre completo *</label>
                <input type="text" name="name" required class="w-full px-4 py-2 border rounded" />
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-sm text-gray-700">Correo electrónico *</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border rounded" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Teléfono *</label>
                    <input type="text" name="phone" required class="w-full px-4 py-2 border rounded" />
                </div>
            </div>

            <div>
                <label class="block font-medium text-sm text-gray-700">Nombre de la parroquia *</label>
                <input type="text" name="parish_name" required class="w-full px-4 py-2 border rounded" />
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-sm text-gray-700">Dirección</label>
                    <input type="text" name="parish_address" class="w-full px-4 py-2 border rounded" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Ciudad</label>
                    <input type="text" name="parish_city" class="w-full px-4 py-2 border rounded" />
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-sm text-gray-700">Sitio web</label>
                    <input type="url" name="parish_website" class="w-full px-4 py-2 border rounded" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Diócesis</label>
                    <input type="text" name="parish_diocese" class="w-full px-4 py-2 border rounded" />
                </div>
            </div>

            <div>
                <label class="block font-medium text-sm text-gray-700">Plan deseado</label>
                <select name="plan" required class="w-full px-4 py-2 border rounded">
                    <option value="Basico">Plan Básico</option>
                    <option value="Estandar">Plan Estandar</option>
                    <option value="Diocesano">Plan Diocesano</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-sm text-gray-700">Mensaje (opcional)</label>
                <textarea name="mensaje" rows="3" class="w-full px-4 py-2 border rounded"></textarea>
            </div>

            <div class="pt-4">
                @honeypot
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
                    Enviar solicitud
                </button>
            </div>
        </form>
    </div>

</x-layout>
