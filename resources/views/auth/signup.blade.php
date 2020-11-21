@extends('templates.default')

@section('content')

<div class="container">
    <form method="post" action="/signup" class="d-flex justify-content-center">
        @csrf
        <div class="p-centered" style="width: 100vh; max-width: 90%">
                <h1 class="text-secondary my-2">Sign up</h1>
                <h4 class="text-muted mb-4">Join us by creating an account!</h4>
                
                <div class="form-group">
                    <label class="form-label  {{$errors->has('username')? 'is-invalid' : ''}}" for="username">Username:</label>
                    <input 
                        class="form-control  {{$errors->has('username')? 'is-invalid' : ''}}" 
                        type="text" 
                        id="username" 
                        name="username"
                        placeholder="Enter your username"
                        value="{{ Request::old('username') ?? '' }}"
                    >
                    @if ($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label  {{$errors->has('email')? 'is-invalid' : ''}}" for="email">E-mail:</label>
                    <input 
                        class="form-control  {{$errors->has('email')? 'is-invalid' : ''}}" 
                        type="email" 
                        id="email" 
                        name="email"
                        placeholder="Enter your e-mail"
                        value="{{ Request::old('email') ?? '' }}"
                    >
                    @if ($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label  {{$errors->has('password')? 'is-invalid' : ''}}" for="password">Password:</label>
                    <input 
                        class="form-control  {{$errors->has('email')? 'is-invalid' : ''}}" 
                        type="password" 
                        id="password" 
                        name="password"
                        placeholder="Enter your password"
                    >
                    @if ($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    @endif
                </div>

                <div class="form-group" style="display: flex; justify-content: flex-end">
                    <button class="btn btn-primary btn-lg my-2" role="submit">Sign up</button>
                </div>

                <input type="hidden" name="_token" value="{{ Session::token() }}">
        </div>
    </form>
</div>    

@stop