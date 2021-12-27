@extends('layouts.principal')

@section('titulo', 'Clientes')

@section('conteudo')

<h3>Novo CLiente</h3>

<form action="{{ route('clientes.store') }}" method="post">
    @csrf
    <input type="text" name="nome">
    <br>
    <button type="submit">Cadastrar</button>
</form>

@endsection