@extends('layouts.app')

@section('title')Регистрация@endsection
@section('content')
    <div class="container p-3">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Введите имя" value="{{old('name')}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Введите email" value="{{old('email')}}">
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
                        <label for="password_confirm">Проверка пароля</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirmation" placeholder="Повторите пароль">
                    </div>
                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>

@endsection
