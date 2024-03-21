<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="/" class="navbar-brand p-0">
        <h1 class="m-0 text-primary">NORSU <img src="{{ asset('assets/img/ncictso.png') }}" alt="NORSU CICTSO MIS" style="width:100px; height:100%">MIS</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="/" class="nav-item nav-link">Home</a>
            <a href="#" class="nav-item nav-link">About</a>
            <a href="#" class="nav-item nav-link">Equipment</a>
            <a href="#" class="nav-item nav-link">Service</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    <a href="" class="dropdown-item">Our Operators</a>
                    <a href="" class="dropdown-item">Our Team</a>
                </div>
            </div>
            <a href="{{ route('login') }}" class="nav-item nav-link">My Account</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->