@extends('layout')
@section('title','Home Page')
@section('main')
    <div style="height: 50vh; width: 100vw;">
        <img src="storage/red-cloth-background-3.jpg" style="height: 50vh; width: 100vw;" alt="">
        <div class="d-flex flex-column position-absolute start-50 translate-middle" style="top: 35%; width: 50%;">
            <p class="text-white fs-1 fw-bold">Find the perfect <i>freelance</i></p>
            <p class="text-white fs-1 fw-bold">services for your business</p>
            <form class="d-flex" action="/search" method="GET">
                    <input style="width: 80%;" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="gig_name">
                    <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="d-flex flex-column" style="width: 60vw;">
        <span class="fs-3 fs-bold" style="text-align: start; margin: 1% 0 1% 0;">Popular Categories</span>
        <form action="/search" method="GET">
            <div class="d-flex justify-content-between">
                <div class="btn btn-light m-1" style="width: 25%">
                    <button name="category" value="Digital Marketing" style="width: 100%; height: 100%;">Digital Marketing</button>
                </div>
                <div class="d-flex flex-column m-1" style="width: 25%;">
                    <div class="btn btn-light m-1">
                        <button name="category" value="Writing & Translation">Writing & Translation</button>
                    </div>
                    <div class="btn btn-light m-1">
                        <button name="category" value="Business">Business</button>
                    </div>
                </div>
                <div class="btn btn-light m-1" style="width: 25%;">
                    <button name="category" value="Music and Audio" style="width: 100%; height: 100%;">Music and Audio</button>
                </div>
                <div class="d-flex flex-column m-1" style="width: 25%;">
                    <div class="btn btn-light m-1">
                        <button name="category" value="Programming & Tech">Programming & Tech</button>
                    </div>
                    <div class="btn btn-light m-1">
                        <button name="category" value="Data">Data</button>
                    </div> 
                </div>
            </div>
        </form>
    </div>
    <div class="d-flex flex-column">
        <span class="fs-2 fw-bold" style="margin: 1% 0 1% 0;">All Gigs</span>
        <div class="container p-2" style="width: 60vw;">
            <div class="row row-cols-4" style="grid-template-columns: auto,auto,auto,auto,auto; gap: 0.5rem;">

                @foreach ($gigs as $gig)
                        
                    <div class="card" style="width: 14rem; padding: 0; cursor: pointer;" >
                        <div onclick="window.location = '/gig/{{ $gig->id }}'">
                            <img src="/storage/{{ $gig->images }}" class="card-img-top" alt="">
                            <div class="card-body" style="overflow: hidden;">
                                <div class="d-flex align-items-center">
                                    <a href="" class="m-1">
                                        <img src="/storage/{{ $gig->user->profile_picture }}" style="width: 4vh">
                                    </a>
                                    <h5 class="card-title">{{ $gig->user->name }}</h5>
                                </div>
                                <p class="card-text">{{ $gig->about }}</p>
                            </div>
                        </div>
                        <class class="d-flex justify-content-between p-3" style="width: 100%; text-align: right; cursor: auto;">

                        @if (Auth::check())
                            
                        
                            @php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "laravel";
                                
                                $con = new mysqli($servername,$username,$password,$dbname);

                                if($con->connect_error){
                                    die("Connection failed: " . $con->connect_error);
                                }

                                $userID = Auth::id();
                                $gigID = $gig->id;
                                $love = 0;

                                $sql = "SELECT * FROM Love WHERE user_id = $userID AND gig_id = $gigID";
                                $result = $con->query($sql);

                                if($result->num_rows > 0){
                                    $love = 1;
                                }


                            @endphp
                            
                            @if ($love == 1)
                                <form method="POST" action="/api/love/{{ Auth::id() }}/{{ $gig->id }}">
                                    @method('DELETE')
                                    @csrf       
                                    <input type="image" style="position: relative; width: 3vh; width: 3vh; z-index: 3;" src="/storage/heart-red.png"></input>
                                </form>
                            @else
                                <form method="POST" action="/api/love/{{ Auth::id() }}/{{ $gig->id }}">
                                    @csrf       
                                    <input type="image" style="position: relative; width: 3vh; width: 3vh; z-index: 3;" src="/storage/heart.png"></input>
                                </form>
                            @endif
                        @endif
                            <span class="fw-bold">Start from {{ $gig->basic_price }}$</span>
                        </class>
                    </div>

                @endforeach  

            </div>
            <div style="margin: 2%;">
                {{ $gigs->links() }}
            </div>
        </div>
    </div>




@endsection