@extends('layouts.templateApp')

@section('titulo', 'GRÁFICO CIRCULAR')

@section('contenido')

<div class="container mx-auto p-4">
    <h1 class="text-3xl text-center font-bold mb-6">CANTIDAD DE DOCUMENTOS POR RELEVANCIA</h1>

    @php
        $total = $data->sum('count');
        $colors = [
            'Alta' => '#E64C65',   // Rojo
            'Media' => '#FCB150',  // Naranja
            'Baja' => '#48BB78'    // Verde
        ];

        $angles = [];
        foreach ($data as $item) {
            $relevance = ucfirst(strtolower($item->relevance));
            if (array_key_exists($relevance, $colors)) {
                $percentage = ($item->count / $total) * 100;
                $angles[] = [
                    'label' => $relevance,
                    'angle' => $percentage * 3.6 // Convertir porcentaje a grados
                ];
            }
        }
    @endphp

    <div class="flex justify-center mb-6">
        <svg width="300" height="300" viewBox="0 0 300 300">
            <g transform="translate(150, 150)">
                @php
                    $startAngle = 0;
                @endphp
                @foreach ($angles as $item)
                    @php
                        $endAngle = $startAngle + $item['angle'];
                        $largeArc = $item['angle'] > 180 ? 1 : 0;

                        $x1 = 100 * cos(deg2rad($startAngle));
                        $y1 = 100 * sin(deg2rad($startAngle));
                        $x2 = 100 * cos(deg2rad($endAngle));
                        $y2 = 100 * sin(deg2rad($endAngle));
                    @endphp
                    <path d="M 0 0 L {{ $x1 }} {{ $y1 }} A 100 100 0 {{ $largeArc }} 1 {{ $x2 }} {{ $y2 }} Z" fill="{{ $colors[$item['label']] }}" stroke="white" stroke-width="2"/>
                    @php
                        $startAngle = $endAngle;
                    @endphp
                @endforeach

                <circle cx="0" cy="0" r="70" fill="white"/>
                <text x="0" y="-5" text-anchor="middle" font-size="24" fill="black">{{ $total }}</text> <!-- Texto en el centro -->
                <text x="0" y="20" text-anchor="middle" font-size="14" fill="black">Total</text> <!-- Texto debajo del total -->
            </g>
        </svg>
    </div>

    <div class="flex justify-center">
        @foreach ($data as $item)
            @php
                $relevance = ucfirst(strtolower($item->relevance));
            @endphp
            <div class="flex items-center mr-4">
                <div class="w-4 h-4 rounded-full" style="background-color: {{ $colors[$relevance] ?? '#E2E8F0' }};"></div>
                <span class="ml-2">{{ $relevance }}: {{ $item->count }}</span>
            </div>
        @endforeach
    </div>
</div>

@endsection
