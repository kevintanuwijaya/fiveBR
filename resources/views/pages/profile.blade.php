@extends('layout')
@section('title','title')
@section('main')
    <div class="d-flex p-4" style="width: 100vw; height: 83vh;">
        <div class="card d-flex flex-column align-items-center m-2 p-4" style="width: 30%;">
            <img class="rounded-circle" src="/storage/{{ $user->profile_picture }}" style="height: 20vh; width: 20vh;" alt="">
            <span class="fs-2 fs-bold">{{ $user->name }}</span>
            <p>{{ $user->about }}</p>

            @if (Auth::id() == $user->id)
                <a href="/profile/edit/{{ $user->id }}" type="btn" class="btn btn-success w-100" style="margin: 5% 0 5% 0; background-color: #34D399; border: none;">Edit Profile</a>
            @endif

            <p>Description</p>
            <p>{{ $user->description }}</p>
            <br>
            <div class="w-100 d-flex justify-content-between">
                <div class="d-flex">
                    <span>photo </span>
                    <span>Member Since</span>
                </div>
                <span>Tanggal</span>
            </div>
        </div>
        <div class="m-2" style="width: 70%; height: 80vh;">
           <div class="w-100 d-flex justify-content-between m-2">
               <span class="fs-3 fw-bold">{{ $user->name }}'s Gig</span>
               @if( Auth::id() == $user->id)
                    <a href="/gig/create" type="button" class="btn btn-success w-25" style="background-color: #34D399; border: none;">+ Create Gig</a>
               @endif
           </div>
            <div class="w-100 container overflow-scroll m-2 scroll" style="height: 75vh;">
                <div class="row row-cols-3" style="grid-template-columns: auto,auto,auto">
                    
                @foreach ($gigs as $gig)
                    
                    <div class="card" style="width: 23rem; margin: 1rem; padding: 0; cursor: pointer;" onclick="window.location = '/gig/{{ $gig->id }}'">
                        <img src="/storage/{{ $gig->images }}" class="card-img-top" alt="Gambar">
                        <div class="card-body" style="overflow: hidden;">
                            <div class="d-flex align-items-center">
                                <a href="" class="m-1">
                                    <img class="rounded-circle" src="/storage/{{ $user->profile_picture }}" style="width: 4vh">
                                </a>
                                <h5 class="card-title">{{ $gig->user->name }}</h5>
                            </div>
                            <p class="card-text">{{ $gig->about }}</p>
                        </div>
                        <a href="#" class="btn btn-light" style="width: 100%; text-align: right;">
                            <span class="fw-bold">Start from {{ $gig->standard_price }}$</span>
                        </a>
                    </div>

                @endforeach  
                    
                </div>
            </div>
        </div>
    </div>
@endsection