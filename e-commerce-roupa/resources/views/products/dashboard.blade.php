@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<h1>Lista de Produtos</h1>
<table class="table table-striped table-bordered text-center">
    <thead class="table thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do Produto</th>
            <th scope="col">Categoria</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @if(count($products) == 0)
        <tr>
            <td colspan="4" class="text-center">Nenhum produto encontrado</td>
        </tr>
        @endif
        @foreach($products as $product)
        <tr>
            <td scope="row">{{ $loop->index+1 }}</td>
            <td><a href="/products/{{ $product->id }}" style="text-decoration:none">{{ $product->name }}</a></td>
            <td>{{ $product->category->name }}</td>
            <td>
                <a href="/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">Editar</a>
                <form action="/products/{{ $product->id }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark btn-sm" onclick="return confirm('Você tem certeza que deseja excluir este produto?')">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection