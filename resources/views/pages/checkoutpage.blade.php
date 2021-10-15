@extends('layout')
@section('title','Check Out')
@section('main')
    <div class="" style="width: 90vw; height: 85vh;">
        <span class="fs-2 fw-bold">Gig Checkout</span>
        <div class="d-flex">
            <div class="card p-3" style="width: 68vw; margin: 1vw 1vw 1vw 0;border-radius: 10px;">
                <div class="d-flex">
                    <div class="d-flex flex-column w-75">
                        <span>{{ $gig-> category }}</span>
                        <span class="fs-3 fw-bold">{{ $gig->title }}</span>
                        <div class="d-flex justify-content-start align-items-center w-100 m-2">
                            <img src="/storage/{{ $gig->user->profile_picture }}" alt="" class="m-2" style="width: 5vh; height: 5vh;">
                            <span>{{ $gig->user->name }}</span>
                        </div>
                        <p>{{ $gig->about }}</p>
                    </div>
                    <div class="w-25">
                        <img src="/storage/{{ $gig->images }}" alt="">
                    </div>
                </div>
            </div>
            <div style="width: 18vw; margin: 1vw;">
                <div class="card p-3" style="border-radius: 10px;">
                    @php
                        $gigtype = null;
                        $price = 0;

                        if($type == "Basic")
                        {
                            $gigtype = "Basic";
                            $price = $gig->basic_price;
                        }
                        else
                        if($type == "Standard")
                        {
                            $gigtype = "Standard";
                            $price = $gig->standard_price;
                        }  
                        else
                        if($type == "Premium")
                        {
                            $gigtype = "Premium";
                            $price = $gig->premium_price;
                        }      
                    @endphp

                    <span class="fs-5 fw-bold">{{ $gigtype }}</span>
                    <span class="fw-bold">$ {{ $price }}</span>
                    <form method="POST" action="/gig/checkout/{{ $gig->id }}" class="w-100">   
                        @csrf
                        <button type="submit" class="btn btn-success w-100" style="margin: 5% 0 5% 0; background-color: #34D399; border: none;">Checkout</button>
                        <input type="text" name="currentType" value="{{ $gigtype }}" hidden>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection