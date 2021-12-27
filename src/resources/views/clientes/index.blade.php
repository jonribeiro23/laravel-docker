@extends('layouts.principal')

@section('titulo', 'Clientes')

@section('conteudo')

    <h3>{{$titulo}}</h3>
    <a href="{{ route('clientes.create') }}">Novo Cliente</a>

    @if(count($clientes) > 0)
    <ul>
        @foreach ($clientes as $cliente)
            <li> 
                {{$cliente['id']}} - {{ $cliente['nome'] }} 
                |
                @if($loop->first)
                    (*)
                @endif
                @if($loop->last)
                    (:.)
                @endif
                | <a href="{{ route('clientes.edit', $cliente['id']) }}">Editar</a>
                | <a href="{{ route('clientes.show', $cliente['id']) }}">Ver</a>
                | <form action="{{ route('clientes.destroy', $cliente['id']) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <br>
                    <button type="submit">Apagar</button>
                </form>
            </li>
        @endforeach
    </ul>
    @else
    <h3>Não há clientes cadastrados</h3>
    @endif

    @empty($clientes)
        <h3>Não há clientes cadastrados</h3>
    @endempty

@endsection