@extends('templates.default')

@section('content')
    
    <div class="container">

        <form action="/status" method="post">

            <div class="form-group mt-4">

                <textarea 
                    class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" 
                    style="resize: none" 
                    name="status" 
                    id="status" 
                    placeholder="What's up {{ Auth::user()->getNameOrUsername() }}" 
                    rows="3"></textarea>

            </div>

            <input type="hidden" name="_token" value="{{ Session::token() }}">
            
            @if ($errors->has('status'))
                <div>
                    <span class="text-danger">
                        {{ $errors->first('status') }}
                    </span>
                </div>
            @endif

            <button
                role="submit" 
                class="btn float-right btn-outline-primary {{ $errors->has('status')? 'btn-danger' : '' }}"
            >
                Update status
            </button>

        </form>

        <div class="clearfix"></div>
        <hr>

        @if (!$statuses->count())
            @include('templates.components.empty', [
                'title' => 'Nothing to see :p',
                'message' => "There's nothing in your timeline, yet."
            ])
        @else
            @foreach ($statuses as $status)
                @include('timeline.components.status')
            @endforeach
        @endif

        {{ $statuses->render() }}

    </div>
    
@stop