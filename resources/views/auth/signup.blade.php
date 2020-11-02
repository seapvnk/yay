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
                    <label class="form-label" for="name">Nickname</label>
                    <input 
                        class="form-input" 
                        type="text" 
                        id="name" 
                        name="name"
                        placeholder="Enter your name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">E-mail</label>
                    <input 
                        class="form-input" 
                        type="email" 
                        id="email" 
                        name="email"
                        placeholder="Enter your e-mail"
                        required
                    >
                </div>


                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input
                        class="form-input" 
                        type="password" 
                        id="password" 
                        name="password"
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <div class="form-group" style="display: flex; justify-content: flex-end">
                    <button class="btn btn-primary btn-lg my-2" role="submit">Sign up</button>
                </div>

                <input type="hidden" name="_token" value="{{ Session::token() }}">
        </div>
    </form>
</div>    

@stop