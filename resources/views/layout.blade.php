<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title> @yield('title') </title>
    <style>
        .main{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .scroll::-webkit-scrollbar{
            display: none;
        }
    </style>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="d-flex justify-content-start align-items-center">
                <a class="navbar-brand fs-2 fw-bold" href="/">fiveBR</a>
                <form class="d-flex h-75" action="/search" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="gig_name">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div style="width: 15%;">
                <div class="collapse navbar-collapse w-100"  id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item" style="padding: 0 2% 0 2%;">
                            <div class="btn-group">
                                <a type="button" class="btn btn-link" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="text-decoration: none; color: black;">
                                    Categories
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg-end" style="width: 30vw; border-radius: 10px;">
                                    <div class="container">
                                        <form action="/search" method="GET">
                                            <div class="row row-cols-2">
                                                <button class="col btn btn-light" name="category" value="Graphics & Design">Graphics & Design</button>
                                                <button class="col btn btn-light" name="category" value="Digital Marketing">Digital Marketing</button>
                                                <button class="col btn btn-light" name="category" value="Writing & Translation">Writing & Translation</button>
                                                <button class="col btn btn-light" name="category" value="Video & Animation">Video & Animation</button>
                                                <button class="col btn btn-light" name="category" value="Music & Animation">Music & Animation</button>
                                                <button class="col btn btn-light" name="category" value="Music & Audio">Music & Audio</button>
                                                <button class="col btn btn-light" name="category" value="Programming & Tech">Programming & Tech</button>
                                                <button class="col btn btn-light" name="category" value="Data">Data</button>
                                                <button class="col btn btn-light" name="category" value="Business">Business</button>
                                                <button class="col btn btn-light" name="category" value="Lifestyle">Lifestyle</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @can('userlogin')
                        <li>
                            <div class="btn-group">
                                <button type="button" class="btn btn-link" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                    <img class="rounded-circle" src="/storage/{{ $user->profile_picture }}" style="width: 6vh">
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                    <li><a href="/profile/{{ Auth::id() }}" class="dropdown-item" type="button">Profile</a></li>
                                    <li><a href="/transaction" class="dropdown-item" type="button">Transaction</a></li>
                                    <li><a href="/loved" class="dropdown-item" type="button">Loved Gigs</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a href="/logout" class="dropdown-item" type="button">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item" style="padding: 0 2% 0 2%;">
                            <a type="button" class="btn btn-success" style="background-color: #34D399; border: none;" href="/register">  Register  </a>
                        </li>
                        <li class="nav-item" style="padding: 0 2% 0 2%;">
                            <a type="button" class="btn btn-success" style="background-color: #D0FAE4; border: none; color: #3BB583;" href="/login">  Login  </a>
                        </li>
                    @endcan
                    </ul>
                </div>
            </div>    
        </div>
    </nav>

    <div class="main">
        @yield('main')
    </div>

    <div class="d-flex justify-content-start align-items-center">
        <span class="fs-2 fw-bold m-2">fiveBr</span>
        <span class="m-2">&copy Fiverr international Ltd. 2021</span>
    </div>
</body>
</html>