@extends('templates.default')

@section('content')

<style>
    .row {
        margin: auto;
        width: 60%;
    }

    @media screen and (max-width: 768px) {
        .row {
            width: 100%;
        }   
    }

</style>
    
    <div class="container">
        <div class="row">
            <form action="/status" method="post">
                <div class="form-group">
                    <label class="form-label" for="status">Status</label>
                    <textarea class="form-input" style="resize: none" name="status" id="status" placeholder="What's up {{ Auth::user()->getNameOrUsername() }}" rows="3"></textarea>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                @if ($errors->has('status'))
                    <div>
                        <span class="text-error">
                            {{ $errors->first('status') }}
                        </span>
                    </div>
                @endif
                <button
                    role="submit" 
                    class="btn btn-lg {{ $errors->has('status')? 'btn-error' : '' }}"
                >
                    Update status
                </button>
            </form>

            <div class="divider"><div>

            @if (!$statuses->count())
                <div class="empty">
                    <div class="empty-icon">
                        <i style="font-size: 16vh" class="icofont-users"></i>
                    </div>
                    <p class="empty-title h5">Nothing to see :p</p>
                    <p class="empty-subtitle">
                        There's nothing in your timeline, yet.
                    </p>
                </div>
            @else
                @foreach ($statuses as $status)
                    @include('timeline.components.status')
                @endforeach
            @endif

            {{ $statuses->render() }}
        </div>
    </div>
@stop