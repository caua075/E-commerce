@extends('layouts.mainLogin')
@section('Registo', 'title')
@section('content')

<div class="register-container">
    <div class="login-logo">
        <img src="{{ asset('img/tl_princ.ico') }}" class="logo img-fluid mb-2" alt="Logo da Loja" width="100">
    </div>
    <main id="register">
        <div class="register-card">
            <form action="/register" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal text-center">Por favor, registre-se</h1>
                <div class="form-floating m-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nome" required>
                    <label for="name">Nome</label>
                </div>
                <div class="form-floating m-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@email.com" required>
                    <label for="email">E-mail</label>
                </div>
                <div class="form-floating m-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                    <label for="password">Senha</label>
                </div>
                <div class="form-floating m-3">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirme a senha" required>
                    <label for="password_confirmation">Confirme a senha</label>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col d-flex gap-2">
                        <button class="btn btn-warning flex-grow-1" type="submit">Cadastrar</button>
                        <button class="btn btn-dark flex-grow-1" type="reset">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection 
