@section('navigation')
    <nav class="navbar navbar-expand-md  navbar-dark" style="background-color: #0829a0;">
        <a class="navbar-brand" href="#" style="font-size:22px; font-weight:bold;">BenZee Residency</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            </ul>
            <span style="color:#ffffff;font-size: 15px; font-weight: bold">Welcome , {{ Auth::user()->fullname }}</span> &nbsp&nbsp&nbsp

            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="form-inline my-2 my-lg-0">
                @csrf
                <button type="submit" class="btn btn-outline-primary text-white">Log out</button>
            </form>
        </div>
</nav>

    <div class="" style="background-color: #0B3BE9;">
        <nav class="nav nav-underline" style="color:#ffffff;">
            <a class="nav-link active" href="{{ route('home') }}" style="color:#ffffff;font-size:18px; font-weight:bold; margin-right:20px;">
                <span class="fas fa-columns" style=""></span> Dashboard
            </a>
            <a class="nav-link" href="{{ route('manage') }}" style="color:#ffffff;font-size: 18px; font-weight: bold; margin-right:20px;">
                <span class="fas fa-list"></span> Manage
               <!-- <span class="badge badge-pill bg-dark align-text-bottom">27</span> -->
            </a>
            <a class="nav-link " href="#" style="color:#ffffff;font-size: 18px; font-weight: bold; margin-right:20px;">
                <span class="fas fa-money-bill-alt"></span> Payments
            </a>
            <a class="nav-link" href="#" style="color:#ffffff;font-size: 18px; font-weight: bold; margin-right:20px;">
                <span class="fas fa-chart-pie"></span> Reports
            </a>
            <a class="nav-link" href="#" style="color:#ffffff;font-size: 18px; font-weight: bold; margin-right:20px;">
                <span class="fas fa-bullhorn"></span> Anouncem.
            </a>
            <a class="nav-link" href="#" style="color:#ffffff;font-size: 18px; font-weight: bold; margin-right:20px;">
                <span class="fas fa-cogs"></span> Settings
            </a>
        </nav>
    </div>
@endsection