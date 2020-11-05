@extends('templates.default')

@section('content')

<div class="container">
    <form method="post" action="/signup">
        @csrf
        <div class="p-centered" style="width: 100vh; max-width: 90%">
                <h1 class="text-center text-primary my-2">Sign up</h1>
                <p class="text-center">
                    Join us by creating an account!
                </p>
                
                <div class="form-group">
                    <label class="form-label  {{$errors->has('username')? 'text-error' : ''}}" for="name">Nickname</label>
                    <input 
                        class="form-input  {{$errors->has('username')? 'is-error' : ''}}" 
                        type="text" 
                        id="name" 
                        name="username"
                        placeholder="Enter your nickname"
                        value="{{ Request::old('username') ?? '' }}"
                    >
                    @if ($errors->has('username'))
                        <span class="text-error">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label  {{$errors->has('email')? 'text-error' : ''}}" for="email">E-mail</label>
                    <input 
                        class="form-input  {{$errors->has('email')? 'is-error' : ''}}" 
                        type="email" 
                        id="email" 
                        name="email"
                        placeholder="Enter your e-mail"
                        value="{{ Request::old('email') ?? '' }}"
                    >
                    @if ($errors->has('email'))
                        <span class="text-error">{{ $errors->first('email') }}</span>
                    @endif
                </div>


                <div class="form-group">
                    <label class="form-label  {{$errors->has('password')? 'text-error' : ''}}" for="password">Password</label>
                    <input
                        class="form-input  {{$errors->has('password')? 'is-error' : ''}}" 
                        type="password" 
                        id="password" 
                        name="password"
                        placeholder="Enter your password"
                    >
                    @if ($errors->has('password'))
                        <span class="text-error">{{ $errors->first('password') }}</span>
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