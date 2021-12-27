<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $clientes = [
        ['id' => 1, 'nome' => 'Ademir'],
        ['id' => 2, 'nome' => 'Bianca'],
        ['id' => 3, 'nome' => 'Wladmir'],
        ['id' => 4, 'nome' => 'Letícia'],
    ];

    public function __construct()
    {
        $clientes = session('clientes');
        if(!isset($clientes))
            session(['clientes' => $this->clientes]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = session('clientes');
        // return view('clientes.index', compact(['clientes']));
        return view('clientes.index')
        ->with('clientes', $clientes)
        ->with('titulo', 'Meus clientes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = session('clientes');
        $dados = $request->get('nome');

        if( $clientes == []) {
            $clientes[] =  ['id' => 1, 'nome' => $dados];    
        }else{
            $clientes[] =  ['id' => end($clientes)['id'] + 1, 'nome' => $dados];
        }
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = session('clientes');
        $cl = array_filter($clientes, function($c) use ($id) { return $c['id'] == $id;});
        return view('clientes.cliente', compact(['cl']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = session('clientes');
        $cliente = $clientes[$this->getIndex($id, $clientes)];
        return view('clientes.edit', compact(['cliente']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = session('clientes');
        $clientes[$this->getIndex($id, $clientes)]['nome'] = $request->get('nome');
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = session('clientes');
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        array_splice($clientes, $index, 1);
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    private function getIndex($id, $clientes)
    {
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        return $index;
    }
}
