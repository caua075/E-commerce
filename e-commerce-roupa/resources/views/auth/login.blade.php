@extends('layouts.mainLogin')
@section('Login', 'title')
@section('content')

<div class="login-container">
@if(session('msgError'))
  <p class="msgError">{{session('msgError')}}
    <br><span>Tente novamente, se não <a href="/register" style="color: #571515">Cadastre-se</a></span>
  </p>
@endif
  <div class="login-logo">
      <img src="{{ asset('img/tl_princ.ico') }}" class="logo img-fluid mb-2" alt="Logo da Loja" width="100">
  </div>
  <main>
    <div class="login-card">
      <form action="/login" method="POST">
          @csrf
          <h1 class="h3 mb-3 fw-normal text-center">Por favor, inicie sessão</h1>
          <div class="form-floating m-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="name@email.com" required>
            <label for="email">E-mail</label>
          </div>
          <div class="form-floating m-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Senha" required>
            <label for="password">Password</label>
          </div>
          <div class="row d-flex justify-content-center">
            <div class="col d-flex gap-2">
                <button class="btn btn-warning flex-grow-1" type="submit">Entrar</button>
                <a href="/register" class="btn btn-dark flex-grow-1">Registrar</a>
            </div>
          </div>
      </form>
    </div>
  </main>
</div>
@endsection