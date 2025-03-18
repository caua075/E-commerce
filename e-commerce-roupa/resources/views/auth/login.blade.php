@extends('layouts.main')
@section('Registo')
@section('content')

<form action="/login" method="POST">
    @csrf
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>

@endsection