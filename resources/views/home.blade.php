@extends('layouts.templateApp')

@section('titulo', 'Home')

@section('contenido')

<div class="container mx-auto my-10">
    <div class="relative w-full overflow-hidden">
        <div class="flex transition-transform duration-700 ease-in-out" id="slider">
            <div class="min-w-full">
                <img src="{{ asset('s1.jpg') }}" alt="Slide 1" class="w-full h-96 object-cover">
            </div>
            <div class="min-w-full">
                <img src="{{ asset('s2.png') }}" alt="Slide 2" class="w-full h-96 object-cover">
            </div>
            <div class="min-w-full">
                <img src="{{ asset('s3.jpg') }}" alt="Slide 3" class="w-full h-96 object-cover">
            </div>
        </div>
        <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">❮</button>
        <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">❯</button>
    </div>

    <div class="mt-10 p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4">Requisitos de la Aplicación</h2>
        <p class="text-gray-700">
            La entrega de la prueba deberá realizarse mediante la plataforma GitHub, en un repositorio público.
            Se requiere una aplicación web con:
        </p>
        <ul class="list-disc list-inside text-gray-700 mt-2">
            <li>Autenticación de usuarios
                <ul class="list-disc list-inside ml-6">
                    <li>Existen diferentes perfiles de usuarios con distintos privilegios:
                        <ul class="list-disc list-inside ml-6">
                            <li>Administración: Puede ver, crear, editar y borrar.</li>
                            <li>Responsable: Puede ver y crear.</li>
                            <li>Asignado: Puede ver.</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>Listado de documentos corporativos de una empresa, los cuales contienen la siguiente información relacionada:
                <ul class="list-disc list-inside ml-6">
                    <li>Nombre del documento</li>
                    <li>Descripción</li>
                    <li>Relevancia (Alta, media y baja)</li>
                    <li>Fecha de aprobación del documento</li>
                    <li>Fecha de subida a la aplicación</li>
                    <li>Documento PDF</li>
                </ul>
            </li>
            <li>Gráfico circular que muestre la cantidad de documentos que hay por relevancia.</li>
            <li>Gráfico lineal que muestre la cantidad de documentos aprobados por mes del último año.</li>
            <li>Filtros por nivel de relevancia y fecha.</li>
            <li>Endpoint que mediante petición web nos proporcione la información de estos documentos agrupada por nivel de relevancia.</li>
        </ul>
        <h3 class="text-lg font-semibold mt-4">Requisitos:</h3>
        <ul class="list-disc list-inside text-gray-700 mt-2">
            <li>Desarrollar la aplicación sobre el framework Laravel.</li>
            <li>Evidenciar el conocimiento del control de versiones a través de la herramienta GIT.</li>
            <li>Documento Word con el razonamiento del uso de las librerías escogidas.</li>
            <li>Documento Word con la explicación y los pasos a seguir para desplegar este proyecto en local.</li>
        </ul>
        <h3 class="text-lg font-semibold mt-4">Se valorará:</h3>
        <ul class="list-disc list-inside text-gray-700 mt-2">
            <li>Legibilidad del código así como una buena arquitectura.</li>
            <li>Uso correcto de las librerías empleadas.</li>
            <li>Uso de tecnologías frontend.</li>
        </ul>
    </div>
</div>

<script>
    let currentIndex = 0;
    const slides = document.querySelectorAll('#slider > div');
    const totalSlides = slides.length;
    const slideInterval = 3000; 
    let autoSlide;

    document.getElementById('next').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateSlider();
        resetAutoSlide();
    });

    document.getElementById('prev').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateSlider();
        resetAutoSlide();
    });

    function updateSlider() {
        const offset = -currentIndex * 100;
        document.getElementById('slider').style.transform = `translateX(${offset}%)`;
    }

    function startAutoSlide() {
        autoSlide = setInterval(() => {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        }, slideInterval);
    }

    function resetAutoSlide() {
        clearInterval(autoSlide);
        startAutoSlide();
    }

    startAutoSlide();
</script>

@endsection
