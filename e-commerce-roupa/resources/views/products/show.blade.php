@extends('layouts.main')
@section( 'title', ' - Produto')
@section('content')

    <div class="col-md-10 offset-md-1">
    <di class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="/img/products/{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="col-md-5 mx-1">
                    <h2>{{ $product->name }}</h2>
                    <p class="text-muted"><strong>Categoria:</strong> {{ $product->category->name ?? 'Sem categoria' }}</p>
                    <p>{{ $product->description }}</p>
                    <h3>R$ {{ number_format($product->price, 2, ',', '.') }}</h3>

                    <form action="/cart/add" method="post">
                        @csrf
                        <input type="hidden" name="product[name]" value="{{ $product->name }}">
                        <input type="hidden" name="product[price]" value="{{ $product->price }}">
                        <input type="hidden" name="product[product_id]" value="{{ $product->id }}">
                        <input type="hidden" name="product[slug]" value="{{ $product->slug }}">
                        <input type="hidden" name="product[amount]" value="1">
                        <button type="submit" class="btn btn-warning">Adicionar ao carrinho</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="/" class="btn btn-outline-dark">Voltar</a>
        </div>
    </div>
</div>

@endsection