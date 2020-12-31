@extends('templates.default')

@section('content')

<div class="container">
    <div class="d-flex flex-md-row flex-column">
        @include('profile.partials.update')
        @include('profile.partials.delete')
    </div>
</div>

@stop
