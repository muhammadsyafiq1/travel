<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="#" class="navbar-brand">
            <img src="/frontend/frontend/images/logos/logo.png" alt="logo">
        </a>
        <button 
            class="navbar-toggler navbar-toggler-right" 
            type="button" 
            data-toggle="collapse" 
            data-target="#navb"
        />
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link active">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link">Paket travel</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbardrop" 
                        data-toggle="dropdown">
                        Service
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Info</a>
                        <a href="#" class="dropdown-item">Help</a>
                    </div>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link">Testimonial</a>
                </li>
            </ul>

            <!--mobile button-->
            <form class="form-inline d-sm-block d-md-none">
                <button type="button" class="btn btn-login my-2 my-sm-0" onclick="event.preventDefault(); location.href='{{ route('login') }}'">
                    Masuk
                </button>
            </form>

            <!--desktop button-->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                <button type="button" class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" onclick="event.preventDefault(); location.href='{{ route('login') }}'">
                    Masuk
                </button>
            </form>

        </div>
    </nav>
</div>