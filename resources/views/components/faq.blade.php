<!-- FAQ -->
        <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Preguntas frecuentes</h2>
                <p class="text-xl text-gray-600">Resolvemos tus dudas más comunes</p>
            </div>
            
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full flex justify-between items-center p-4 text-left hover:bg-gray-50 focus:outline-none">
                        <span class="font-medium">¿Es compatible con los requisitos de informes de Cáritas Diocesana?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="px-4 pb-4 hidden">
                        <p class="text-gray-600">Sí, nuestro sistema está diseñado específicamente para cumplir con los formatos y requisitos de informes que solicitan las Cáritas Diocesanas. Incluimos plantillas preconfiguradas que facilitan la generación de estos reportes.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full flex justify-between items-center p-4 text-left hover:bg-gray-50 focus:outline-none">
                        <span class="font-medium">¿Cómo protegemos los datos sensibles de los beneficiarios?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="px-4 pb-4 hidden">
                        <p class="text-gray-600">Utilizamos encriptación de datos tanto en tránsito como en reposo, cumpliendo con el RGPD. Además, ofrecemos controles de acceso granular para que solo el personal autorizado pueda ver la información sensible.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full flex justify-between items-center p-4 text-left hover:bg-gray-50 focus:outline-none">
                        <span class="font-medium">¿Ofrecen capacitación para los voluntarios?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="px-4 pb-4 hidden">
                        <p class="text-gray-600">Sí, incluimos videotutoriales paso a paso, manuales descargables y sesiones de capacitación online gratuitas para que todos los voluntarios puedan usar el sistema con confianza.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full flex justify-between items-center p-4 text-left hover:bg-gray-50 focus:outline-none">
                        <span class="font-medium">¿Podemos migrar nuestros datos existentes?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="px-4 pb-4 hidden">
                        <p class="text-gray-600">Por supuesto. Nuestro equipo de soporte puede ayudarte a importar datos desde Excel, Access u otros sistemas que estés utilizando actualmente, sin coste adicional en los planes Estándar y Diocesano.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Script for FAQ toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqButtons = document.querySelectorAll('.border button');
            
            faqButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const answer = this.nextElementSibling;
                    const icon = this.querySelector('svg');
                    
                    if (answer.classList.contains('hidden')) {
                        answer.classList.remove('hidden');
                        icon.classList.add('transform', 'rotate-180');
                    } else {
                        answer.classList.add('hidden');
                        icon.classList.remove('transform', 'rotate-180');
                    }
                });
            });
        });
    </script>