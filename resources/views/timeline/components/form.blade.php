<form action="{{ route('status.reply', ['statusID' => $status->id]) }}" method="post" class="form row">
    @csrf
    <div class="col col-11">
        <div class="form-group">
            <input
                class="
                        {{ $errors->has("reply-{$status->id}")? 'border-danger' : 'border-secodary' }}
                        form-control 
                        {{ $errors->has("reply-{$status->id}")? 'is-invalid' : '' }}" 
                
                name="reply-{{ $status->id }}" 
                id="status-{{ $status->id }}" 
                rows="1"
                placeholder="leave a comment">
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
            class="btn {{ $errors->has("reply-{$status->id}")? 'btn-danger' : 'btn-outline-primary' }}"
        >
            Reply
        </button>
    </div>

</form>