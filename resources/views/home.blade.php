@extends('templates.default')

@section('content')
    <img 
        src="https://source.unsplash.com/1600x900/?social" 
        style="height: 30vh; width: 100vw; object-fit: cover"
        class="img-fluid" 
    >
    
    <div class="jumbotron" style="height: 56vh">
        <h1 class="display-4">Welcome to Yay</h1>
        <p class="lead">Share experiences and thoughts with people that <br>
                        don't really know you and also don't care
        </p>
        <hr class="my-4">
        
        <p>It  will be fun! :^D</p>
        
        <a class="btn btn-primary btn-lg" href="/signup" role="button">Sign up</a>
    </div>
@stop