@if (Session::has('info'))

    <div 
        class="toast" 
        style="position: absolute; width: 320px; left: 2%; top: 10%; z-index: 25 !important" 
        role="alert" 
        aria-live="assertive" 
        aria-atomic="true"
    >
        <div class="toast-header">
            <i class="icofont-bell"></i>
            <strong class="mr-auto">Yay!</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="toast-body">
            {{ session('info') }}
        </div>

    </div>
@endif

@if (Session::has('error-alert'))

    <div 
        class="toast bg-danger" 
        style="position: absolute; width: 320px; left: 2%; top: 10%" 
        role="alert" 
        aria-live="assertive" 
        aria-atomic="true"
    >
        <div class="toast-header bg-danger text-white">
            <i class="icofont-bell"></i>
            <strong class="mr-auto">Yay!</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="toast-body text-white">
            {{ session('error-alert') }}
        </div>

    </div>
@endif


<script>

window.onload = function() {
    $('.toast').toast({
        delay: 4000,
        animation: true,
    })
    $('.toast').toast('show')
}
</script>