@extends('layout')
@section('title','Gigs Detail')
@section('main')
<div class="d-flex p-4" style="width: 100vw;">
    <div class="d-flex flex-column m-1" style="width: 75vw;">
        <span>{{ $gig->category }}</span>
        <span class="fs-4 fw-bold">{{ $gig->title }}</span>
        <div class="d-flex align-items-center m-3">
            <img class="rounded-circle" src="/storage/{{ $gig->user->profile_picture }}" alt="profile" style="width: 5vh; height: 5vh; margin: 0 1% 0 0;">
            <span>{{ $gig->user->name }}</span>
            <span style="margin: 0 1% 0 1%;">|</span>
            <img src="/storage/star.png" style="width: 3vh; height: 3vh; margin: 0 0.2% 0 0.5%;" alt="">

            @php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "laravel";
                
                $con = new mysqli($servername,$username,$password,$dbname);

                if($con->connect_error){
                    die("Connection failed: " . $con->connect_error);
                }

                $gigID = $gig->id;
                $average = 1;

                $sql = "SELECT AVG(star) AS [Average] FROM Love WHERE gig_id = $gigID";
                $average = floor($con->query($sql));

            @endphp
            

            <span style="margin: 0 1% 0 1%; color: black;">{{ $average }}</span>

            <span style="margin: 0 1% 0 1%;">|</span>

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
                    <input type="image" style="position: relative; width: 3vh; height: 3vh; z-index: 3;" src="/storage/heart-red.png"></input>
                </form>
            @else
                <form method="POST" action="/api/love/{{ Auth::id() }}/{{ $gig->id }}">
                    @csrf       
                    <input type="image" style="position: relative; width: 3vh; height: 3vh; z-index: 3;" src="/storage/heart.png"></input>
                </form>
            @endif

        </div>
        <div>
            <img class="w-100" src="/storage/{{ $gig->images }}" alt="adawaw">
        </div>
        <div class="" style="margin-top: 4%;">
            <span class="fs-3 fw-bold">About This Gig</span>
            <p>{{ $gig->about }} </p>
            <br>
        </div>
        <div style="margin: 2% 0 2% 0;">
            <span class="fw-bold">About The Seller</span>
            <div class="d-flex align-items-center m-2">
                <img class="rounded-circle" src="/storage/{{ $gig->user->profile_picture }}" alt="profile" style="width: 10vh; height: 10vh;" class="m-2">
                <div class="m-2">
                    <span>{{ $gig->user->name }}</span>
                    <div>{{ $gig->user->description }}</div>
                </div>
            </div>
        </div>
        <div class="card p-3">
            <span>Member since</span>
            <span class="fw-bold">{{ $gig->user->created_at->format('M d, Y') }}</span>
            <hr style="margin: 1% 0 1% 0;">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam nihil, optio, in nostrum neque distinctio amet magni similique itaque dicta quos doloremque aliquam. Totam quasi provident temporibus laudantium, expedita voluptatem!</p>
        </div>  
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
                $reviewStatus = 0;

                $sql = "SELECT * FROM transactions WHERE user_id = $userID AND gig_id = $gigID";
                $result = $con->query($sql);

                $sql = "SELECT * FROM reviews WHERE user_id = $userID AND gig_id = $gigID";
                $result2 = $con->query($sql);

                if($result->num_rows > 0 && $result2->num_rows == 0){
                    $reviewStatus = 1;
                }


            @endphp
        
            
        @if ($reviewStatus == 1)
            <div style="margin: 1.5% 0 1.5% 0;">
                <form action="/gig/review/{{ $gig->id }}" method="POST" class="card p-3">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Rating</label>
                        <input type="number" name="star" class="form-control" id="formGroupExampleInput" placeholder="Rating" max="5" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100" style=" background-color: #34D399; border: none;">Post</button>
                    </div>
                </form>
            </div>
        @endif

        <div style="margin: 2% 0 0 0;">

            @foreach ($gig->review as $review )
                <hr>
                    <div class="" style="margin: 1% 0 1% 0;">
                        <div class="d-flex align-items-center" style="margin: 1% 0 1% 0;">
                            <img class="rounded-circle" src="/storage/{{ $review->user->profile_picture }}" style="width: 5vh; height: 5vh; margin: 0 0.5% 0 0;" alt="">
                            <span class="fw-bold" style="margin: 0 0.5% 0 0.5%;">{{ $review->user->name }}</span>
                            <img src="/storage/star.png" style="width: 2vh; height: 2vh; margin: 0 0.2% 0 0.5%;" alt="">
                            <span style="margin: 0 0 0 0.2%;">{{ $review->star }}</span>
                        </div>
                        <div style="margin: 1% 0 1% 0;">
                            <p>{{ $review->content }}</p>
                        </div>
                        <div>
                             @php
                                $time = time();
                                $reviweTime = strtotime($review->created_at);

                                $totaldiff = 0;
                                $measure = "";

                                $totaldiff = abs($time - $reviweTime);
                                $measure = "seconds";

                                if($totaldiff > 60)
                                {
                                    $totaldiff = floor($totaldiff/60);
                                    $measure = "minutes";

                                    if($totaldiff > 60)
                                    {
                                        $totaldiff = floor($totaldiff/60);
                                        $measure = "hours";

                                        if($totaldiff > 24)
                                        {
                                            $totaldiff = floor($totaldiff/60);
                                            $measure = "days";

                                            if($totaldiff > 31)
                                            {
                                                $totaldiff = floor($totaldiff/60);
                                                $measure = "months";

                                                if($totaldiff > 365)
                                                {
                                                    $totaldiff = floor($totaldiff/60);
                                                    $measure = "years";
                                                }
                                            }
                                        }
                                    }
                                }
                             @endphp
                             <span>Published {{ $totaldiff }} {{ $measure }} ago</span> 
                        </div>
                    </div>
                <hr>    
            @endforeach

        </div>
    </div>
    <div class="m-3" style="width: 25vw;">
        @if (Auth::check() && Auth::id() == $gig->user->id)
            <a href="/gig/edit/{{ $gig->id }}" type="btn" class="btn btn-success w-100" style="margin: 5% 0 5% 0; background-color: #34D399; border: none;">Edit Gig</a>
            <br>
        @endif
        <div class="card d-flex flex-column p-3" style="margin-bottom: 2%;">
            <div class="d-flex justify-content-between">
                <span class="fw-bold">Starter Package</span>
                <span class="fw-bold">${{ $gig->basic_price }}</span>
            </div>
            <div style="margin-top: 2%;">
                <p>{{ $gig->basic_description }}</p>
            </div>
            @if (Auth::check() && Auth::id() != $gig->user->id)
                <a href="/gig/checkout/{{ $gig->id }}/Basic" type="btn" class="btn btn-success w-100" style="margin: 2% 0 1% 0; background-color: #34D399; border: none;">Continue ${{ $gig->basic_price }}</a>
            @endif
        </div>
        <div class="card d-flex flex-column p-3" style="margin-bottom: 2%;">
            <div class="d-flex justify-content-between">
                <span class="fw-bold">Best Package</span>
                <span class="fw-bold">${{ $gig->standard_price }}</span>
            </div>
            <div style="margin-top: 2%;">
                <p>{{ $gig->standard_description }}</p>
            </div>
            @if (Auth::check() && Auth::id() != $gig->user->id)
                <a href="/gig/checkout/{{ $gig->id }}/Standard" type="btn" class="btn btn-success w-100" style="margin: 2% 0 1% 0; background-color: #34D399; border: none;">Continue ${{ $gig->standard_price }}</a>
            @endif
        </div>
        <div class="card d-flex flex-column p-3">
            <div class="d-flex justify-content-between">
                <span class="fw-bold">Premium Package</span>
                <span class="fw-bold">${{ $gig->premium_price }}</span>
            </div>
            <div style="margin-top: 2%;">
                <p>{{ $gig->premium_description }} </p>
            </div>
            @if (Auth::check() && Auth::id() != $gig->user->id)
                <a href="/gig/checkout/{{ $gig->id }}/Premium" type="btn" class="btn btn-success w-100" style="margin: 2% 0 1% 0; background-color: #34D399; border: none;">Continue ${{ $gig->premium_price }}</a>
            @endif
        </div>
    </div>


</div>
@endsection