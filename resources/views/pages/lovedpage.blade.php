@extends('layout')
@section('title','Loved Gigs')
@section('main')
    <div class="d-flex flex-column" style="width: 90vw; height: 85vh;">
        <span class="fs-2 fw-bold">Loved Gigs</span>
        
        <div class="d-flex flex-column align-items-center">
            @if ($loves->total() > 0)
                <div class="container p-2" style="width: 90vw;">
                    <div class="row row-cols-4" style="grid-template-columns: auto,auto,auto,auto,auto; gap: 0.5rem;">

                        @foreach ($loves as $love)
                                
                            <div class="card" style="width: 18rem; padding: 0; cursor: pointer;" >
                                <div onclick="window.location = '/gig/{{ $love->gig_id }}'">
                                    <img src="/storage/{{ $love->gig->images }}" class="card-img-top" alt="">
                                    <div class="card-body" style="overflow: hidden;">
                                        <div class="d-flex align-items-center">
                                            <a href="" class="m-1">
                                                <img src="/storage/{{ $love->gig->user->profile_picture }}" style="width: 4vh">
                                            </a>
                                            <h5 class="card-title">{{ $love->gig->user->name }}</h5>
                                        </div>
                                        <p class="card-text">{{ $love->gig->about }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between p-3" style="width: 100%; text-align: right; cursor: auto;">
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
                                        $gigID = $love->gig->id;
                                        $price = $love->gig->basic_price;
                                        $love = 0;

                                        $sql = "SELECT * FROM Love WHERE user_id = $userID AND gig_id = $gigID";
                                        $result = $con->query($sql);

                                        if($result->num_rows > 0){
                                            $love = 1;
                                        }


                                    @endphp
                                    
                                    @if ($love == 1)
                                        <form method="POST" action="/api/love/$userID/$gigID">
                                            @method('DELETE')
                                            @csrf       
                                            <input type="image" style="position: relative; width: 3vh; height: 3vh; z-index: 3;" src="/storage/heart-red.png"></input>
                                        </form>
                                    @else
                                        <form method="POST" action="/api/love/$userID/$gigID">
                                            @csrf       
                                            <input type="image" style="position: relative; width: 3vh; height: 3vh; z-index: 3;" src="/storage/heart.png"></input>
                                        </form>
                                    @endif
                                    <span class="fw-bold">Start from ${{ $price }}</span>
                                </div>
                            </div>

                        @endforeach  

                    </div>
                    <div class="m-4">
                        {{ $loves->links() }}
                    </div>
                </div>
            @else
                <div>
                    <span class="fs-4">No loved gigs</span>
                </div>
            @endif
        </div>

        
        
    </div>

@endsection
