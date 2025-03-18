@extends('layouts.main')
@section('Registo')
@section('content')

<form action="/register" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nome" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="password" placeholder="Senha" required>
    <input type="password" name="password_confirmation" placeholder="Confirme a senha" required>
    <button type="submit">Cadastrar</button>
</form>

@endsection 
