@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Список пользователей</h1>
        <br>

        <br><br><br>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>E-mail</th>
                <th>Роль</th>
                <th>Дата регистрации</th>

            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->email}}</td>
                    <td>@if($user->isAdmin) Администратор @else Пользователь @endif </td>
                    <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>

                </tr>
            @endforeach
        </table>
    </main>
@stop