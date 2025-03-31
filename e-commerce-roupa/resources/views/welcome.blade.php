@extends('layouts.main')
@section('title')

@section('content')

  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" id="container-principal">
    <div class="col p-2 mx-auto my-3">
      <h1 class="display-3 fw-bold">
        <img src="/img/tl_princ.jpeg" class="mx-1" width="50" alt="Logo da Loja">
        Gabaldi MensWear
        <img src="/img/tl_princ.jpeg" class="mx-1" width="50" alt="Logo da Loja">
      </h1>
      <h3 class="fw-normal text-muted mb-3">A qualidade que você precisa com o preço que cabe no seu bolso</h3>
    </div>  
  </div>

  @if(isset($search))
    <h2 class="text-center my-4">Resultados da Busca para "{{ $search }}"</h2>
  @else
    <h2 class="text-center my-4">Produtos em Destaque</h2>
  @endif

  <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($products as $product)
      <div class="col">
        <div class="card shadow h-100">
          <a href="/products/{{ $product->id }}"><img src="img/products/{{$product->image}}" alt="{{ $product->name }}" class="bd-placeholder-img card-img-top" width="100%" height="225"></a>
          <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="/products/{{ $product->id }}" class="btn btn-sm btn-outline-dark">Saber mais</a>
                @auth
                @if(Auth::user()->is_admin)
                  <a href="/products/{{ $product->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                @endif
                @endauth
              </div>
              <small class="text-muted">{{ $product->created_at->format('d/m/Y') }}</small>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    @if (count($products) == 0 && $search)
      <div class="col-md-6 offset-md-3 text-center">
        <div class="card shadow h-auto">
          <div class="card-body">
            <h4 class="card-title">Nenhum produto encontrado</h4>
            <p class="card-text">Infelizmente não encontramos nenhum produto com o termo "{{ $search }}". </p>
            <a href="/">Ver outros produtos!</a>
          </div>
        </div>
      </div>
    @endif
  </div>
@endsection