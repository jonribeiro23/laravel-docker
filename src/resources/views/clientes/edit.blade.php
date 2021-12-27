@extends('layouts.principal')

@section('titulo', 'Clientes')

@section('conteudo')

<h3>Editar CLiente</h3>

<form action="{{ route('clientes.update', $cliente['id']) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="nome" value="{{ $cliente['nome'] }}">
    <br>
    <button type="submit">Salvar</button>
</form>

@endsection