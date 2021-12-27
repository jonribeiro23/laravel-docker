@extends('layouts.principal')

@section('titulo', 'Departamentos')

@section('conteudo')
    <h1>Departamentos</h1>

    <ul>
        <li>Computadores</li>
        <li>Eletrônicos</li>
        <li>Acessórios</li>
        <li>Roupas</li>
    </ul>

    @alerta(['tipo' => 'error', 'titulo' => 'Erro'])
        <p>Algo errado não está certo</p>
    @endalerta

    @alerta(['tipo' => 'warning', 'titulo' => 'Erro'])
        <p>Algo errado não está certo</p>
    @endalerta

@endsection