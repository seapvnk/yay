<nav class="navbar">
    
    <a class="logo" href="#"> yay! </a>
    
    <div class="items">
        @if (true)
            <div class="item">
                <a class="button" href="#">Sign up</a>
            </div>
            <div class="item">
                <a class="button" href="#">Sign up</a>
            </div>
        @else
            <div class="item">
                <form action="javascript:void(0)">
                    <input class="" type="text" placeholder="Search a user">
                    <button class="">search <i class="icofont-search"></i></button>
                </form>
            </div>
        @endif
        
    </div>


</nav>