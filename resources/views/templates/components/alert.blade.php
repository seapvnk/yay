@if (Session::has('info'))
    <div class="toast" style="border-radius:0">
        {{ Session::get('info') }}
        <button 
            onclick="this.parentElement.style.display='none';"
            class="btn btn-clear float-right"
        ></button>
    </div>
@endif