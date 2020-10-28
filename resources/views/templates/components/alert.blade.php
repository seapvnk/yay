@if (Session::has('info'))
    <div class="toast toast-success" style="border-radius:0">
        {{ Session::get('info') }}
        <button 
            onclick="this.parentElement.style.display='none';"
            class="btn btn-clear float-right"
        ></button>
    </div>
@endif