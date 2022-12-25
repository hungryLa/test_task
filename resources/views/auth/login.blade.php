@extends('layouts.app')

@section('title')Авторизация@endsection
@section('content')
    <div class="container p-3 ">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Введите email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Введите пароль">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <a href="{{route('password.request')}}">Забыли пароль?</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Войти</button>
                </form>
            </div>
        </div>
    </div>

@endsection

