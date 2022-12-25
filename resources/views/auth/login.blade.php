@extends('layouts.app')

@section('title')Авторизация@endsection
@section('content')
    <div class="container p-3">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Введите email">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль">
                    </div>
                    <div class="form-group mb-2">
                        <a href="">Забыли пароль?</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Войти</button>
                </form>
            </div>
        </div>
    </div>

@endsection

