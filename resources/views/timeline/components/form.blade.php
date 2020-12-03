<form action="/status/{{ $status->id}}/reply" method="post" class="form row">
    @csrf
    <div class="col col-11">
        <div class="form-group">
            <textarea
                class=" bg-primary 
                        {{ $errors->has("reply-{$status->id}")? 'border-danger' : 'border-secodary' }}
                        text-light
                        form-control 
                        {{ $errors->has("reply-{$status->id}")? 'is-invalid' : '' }}" 
                
                style="resize: none; padding: .2rem 1rem; font-size:18px" 
                name="reply-{{ $status->id }}" 
                id="status" 
                rows="1"
                placeholder="write a comment..."></textarea>
        </div>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
        
        @if ($errors->has("reply-{$status->id}"))
            <div>
                <span class="text-danger">
                    {{ $errors->first("reply-{$status->id}") }}
                </span>
            </div>
        @endif
    </div>

    <div class="col-1">
        <button
            role="submit" 
            class="btn {{ $errors->has("reply-{$status->id}")? 'btn-danger' : '' }}"
        >
            Reply
        </button>
    </div>

</form>