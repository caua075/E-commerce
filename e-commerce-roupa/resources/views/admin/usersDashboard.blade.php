@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<h1>Lista de Usuários</h1>
<table class="table table-striped table-bordered text-center">
    <thead class="table thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do Usuário</th>
            <th scope="col">E-mail</th>
            <th scope="col">Admin</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @if(count($users) == 0)
        <tr>
            <td colspan="4" class="text-center">Nenhum usuário encontrado</td>
        </tr>
        @endif
        @foreach($users as $user)
        <tr>
            <td scope="row">{{ $loop->index+1 }}</td>
            <td><a href="/users/{{ $user->id }}" style="text-decoration:none">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>
                @if($user->is_admin)
                    <span>Sim</span>
                @else
                    <span>Não</span>
                @endif
            </td>
            <td>
                <form action="#" method="POST" style="display:inline-block;">
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