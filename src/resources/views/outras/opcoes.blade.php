@extends('layouts.principal')

@section('titulo', 'Opções')

@section('conteudo')
    <div>
        <ul class="options">
            <li><a class="warning {{ $opc == 1 ? 'selected' : '' }}" href="{{ route('opcoes', 1) }}">warning</a></li>
            <li><a class="info {{ $opc == 2 ? 'selected' : '' }}" href="{{ route('opcoes', 2) }}">info</a></li>
            <li><a class="success {{ $opc == 3 ? 'selected' : '' }}" href="{{ route('opcoes', 3) }}">success</a></li>
            <li><a class="error {{ $opc == 4 ? 'selected' : '' }}" href="{{ route('opcoes', 4) }}">error</a></li>
        </ul>
    </div>

    @if (isset($opc))
        @switch($opc)
            @case(1)
                @alerta(['tipo' => 'warning', 'titulo' => 'Erro'])
                    <p>Algo errado não está certo</p>
                @endalerta
                @break

            @case(2)
                @alerta(['tipo' => 'info', 'titulo' => 'Erro'])
                    <p>Algo errado não está certo</p>
                @endalerta
                @break

            @case(3)
                @alerta(['tipo' => 'success', 'titulo' => 'Erro'])
                    <p>Algo errado não está certo</p>
                @endalerta
                @break

            @case(4)
                @alerta(['tipo' => 'error', 'titulo' => 'Erro'])
                    <p>Algo errado não está certo</p>
                @endalerta
                @break

            @default

        @endswitch
    @endif

@endsection
