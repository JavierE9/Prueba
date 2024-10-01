@extends('layouts.templateApp')

@section('titulo', 'GRÁFICO LINEAL')

@section('contenido')

<div class="container mx-auto p-9">
    <h1 class="text-3xl text-center font-bold mb-6">CANTIDAD DE DOCUMENTOS APROBADOS POR MES</h1>

    @php

        $lineColor = '#4299E1';  
        $pointColor = '#2B6CB0'; 
        $maxHeight = 200;        
        $totalMeses = count($labels); 
        $maxValue = max($data) ?: 1; 


        $stepX = $totalMeses > 1 ? 100 / ($totalMeses - 1) : 0;  // Ancho del gráfico (100%) dividido por el número de meses menos 1
        $points = [];


        $mesesEnEspañol = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ];

        foreach ($data as $index => $count) {
            $scaledY = ($count / $maxValue) * $maxHeight;  // Escalar el Y
            $points[] = [
                'x' => $index * $stepX,
                'y' => $maxHeight - $scaledY,
                'count' => $count, // Agregar el conteo para mostrar en el gráfico
                'label' => $mesesEnEspañol[$index], // Usar los nombres de meses en español
                // Calcular el cambio porcentual solo si el mes anterior tiene datos
                'percentage_change' => ($index > 0 && $data[$index - 1] > 0) ? 
                    round((($count - $data[$index - 1]) / $data[$index - 1]) * 100, 2) . '%' : 'N/A'
            ];
        }

        // Generar marcas y valores para el eje Y
        $yStep = $maxValue > 0 ? ceil($maxValue / 5) : 1; // Divide el rango en 5 partes
        $yLabels = range(0, $maxValue, $yStep); // Valores para el eje Y
        $total = array_sum($data); // Calcular el total
    @endphp

    <div class="flex justify-center mb-6">
        <svg width="100%" height="300" viewBox="0 0 1300 300">
            <line x1="50" y1="250" x2="{{ 50 + (100 * ($totalMeses - 1)) }}" y2="250" stroke="black" stroke-width="2" /> <!-- Eje X -->
            <line x1="50" y1="250" x2="50" y2="0" stroke="black" stroke-width="2" />   
            @foreach ($yLabels as $yLabel)
                @php
                    $yPos = $maxHeight - ($yLabel / $maxValue * $maxHeight) + 50; // Escalar Y para la posición
                @endphp
                <line x1="40" y1="{{ $yPos }}" x2="50" y2="{{ $yPos }}" stroke="black" stroke-width="1" />
                <text x="30" y="{{ $yPos + 5 }}" text-anchor="end" fill="black" font-size="12">{{ $yLabel }}</text>
            @endforeach

            <polyline fill="none" stroke="{{ $lineColor }}" stroke-width="2"
                points=" @foreach ($points as $point) {{ ($point['x'] * 12) + 50 }},{{ $point['y'] + 50 }} @endforeach " />

            @foreach ($points as $point)
                <circle cx="{{ ($point['x'] * 12) + 50 }}" cy="{{ $point['y'] + 50 }}" r="4" fill="{{ $pointColor }}" />
                
                <text x="{{ ($point['x'] * 12) + 50 }}" y="{{ $point['y'] + 35 }}" text-anchor="middle" fill="gray" font-size="10">
                    {{ $point['count'] }}
                </text>
                
                <text x="{{ ($point['x'] * 12) + 50 }}" y="{{ $point['y'] + 20 }}" text-anchor="middle" fill="#2D3748" font-size="14" font-weight="bold">
                    {{ $point['label'] }} 
                </text>
                

                <title>{{ $point['label'] }}: {{ $point['count'] }} (Cambio: {{ $point['percentage_change'] }})</title>
            @endforeach
        </svg>
    </div>

    <div class="flex justify-center">
        <p class="text-lg font-bold">Total: {{ $total }}</p>
    </div>

</div>

@endsection
