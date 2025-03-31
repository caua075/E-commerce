@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <!-- Products Section -->
        <div class="col-md-4">
            <a href="/admin/productsDashboard" alt="Detalhar Produtos"><h3 class="text-center">Produtos</h3></a> 
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Users Section -->
        <div class="col-md-4">
            <a href="/admin/usersDashboard"><h3 class="text-center">Usuários</h3></a>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection