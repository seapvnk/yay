@extends('templates.default')


@section('content')

    <div class="container" style="padding: 2rem">
        <h3>Results for "<span class="text-info">{{ Request::input('query') }}</span>"</h3>

        @if (!$users->count())
            <div class="empty">
                <div class="empty-icon">
                    <i style="font-size: 16vh" class="icofont-search-user"></i>
                </div>
                <p class="empty-title h5">No results found</p>
                <p class="empty-subtitle">
                    We didn't find any user with name similar to 
                    "<span class="text-primary">{{ Request::input('query') }}</span>"
                </p>
            </div>
        @else
            <div class="columns">
                <div class="container results-container">
                    @foreach ($users as $user)
                        @include('user.components.block')   
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@stop