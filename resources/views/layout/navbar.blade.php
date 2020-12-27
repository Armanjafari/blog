<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1:8000/create">Create</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1:8000/all">All Articles</a>
                </li>

                @if(auth()->check())

                    <li class="nav-item">
                    <form action="http://127.0.0.1:8000/logout/" method="post">
                        @csrf
                    <button class="nav-link btn badge-danger">Logout !</button>
                    </form>
                    </li>
                @else
                    <li class="nav-item btn btn-info">
                        <a class="nav-link" href="http://127.0.0.1:8000/register"> Register</a>
                    </li>
                    <li class="nav-item btn">
                        <a class="nav-link" href="http://127.0.0.1:8000/login"> Login !</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
