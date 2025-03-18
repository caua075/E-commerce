@extends('layouts.main')
@section('title', 'Editar Produtos')
@section('content')

<div id="form-products">
    <form action="/products/update/{{ $product->id }}" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 60%;">
        <h2 class="text-center mb-4">Editando {{$product->name}}</h2>
        @csrf
        @method('PUT')
        <!-- Nome do Produto -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome do Produto</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
        </div>
        <!-- Descrição -->
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ $product->description }}</textarea>
        </div>
        <div class="row mb-3">
            <!-- Seleção de Categoria -->
            <div class="col-md-6">
                <label for="category_id" class="form-label">Categoria</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach     
                </select>
            </div>
            <!-- Preço -->
            <div class="col-md-6">
                <label for="price" class="form-label">Preço</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ $product->price }}">
            </div>
        </div>
        <div class="row mb-3">
            <!-- Tamanho -->
            <div class="col-md-6">
                <label for="size" class="form-label">Tamanho</label>
                <input type="text" name="size" id="size" class="form-control" value="{{ $product->size }}">
            </div>
            <!-- Estoque -->
            <div class="col-md-6">
                <label for="stock" class="form-label">Estoque</label>
                <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}">
            </div>
        </div>
        <!-- Imagem -->
         <div class="row mb-3">
            <div class="col-md-9">
                <label for="image" class="form-label">Imagem</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="col-md-2">
                <img src="/img/products/{{ $product->image }}" alt="{{ $product->name }}" class="img-preview" width="100">
            </div>
        </div>
        <!-- Botão de Envio e Limpeza -->
        <div class="d-flex justify-content-start">
            <button type="submit" class="btn btn-warning">Editar Produto</button>
            <button type="button" class="btn btn-dark ms-2" onclick="window.location.href='/products/{{ $product->id }}'">Cancelar</button>
        </div>
    </form>
</div>

@endsection