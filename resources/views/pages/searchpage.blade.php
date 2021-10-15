@extends('layout')
@section('title','Search')
@section('main')
<div class="d-flex flex-column m-3" style="width: 90vw;">
    <div>
        <form method="GET" action="/search" class="d-flex justify-content-between w-100">
            @csrf
            <div class="mb-3" style="width: 14vw; margin: 0 0.6vw 0 0;">
                <input name="gig_name" class="form-control" type="text" placeholder="Search..." aria-label="default input example" value="@if (request()->has('gig_name')){{ request()->get('gig_name')}}@endif">
            </div>
            <div class="mb-3" style="width: 14vw; margin: 0 0.6vw 0 0.6vw;">
                <input class="@error('title') form-control is-invalid @else form-control  @enderror" name="category" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." value="@if (request()->has('category')){{ request()->get('category')}}@endif">
                <datalist id="datalistOptions">
                    <option value="Graphics & Design">
                    <option value="Digital Marketing">
                    <option value="Writing & Translation">
                    <option value="Video & Animation">
                    <option value="Music & Animation">
                    <option value="Music & Audio">
                    <option value="Programming & Tech">
                    <option value="Data">
                    <option value="Business">
                    <option value="Lifestyle">
                </datalist>
            </div>
            <div class="mb-3" style="width: 14vw; margin: 0 0.6vw 0 0.6vw;">
                <input name="min_budget" class="form-control" type="number" placeholder="Min Budget" aria-label="default input example" value="@if (request()->has('min_budget')){{ request()->get('min_budget')}}@endif">
            </div>
            <div class="mb-3" style="width: 14vw; margin: 0 0.6vw 0 0.6vw;">
                <input name="max_budget" class="form-control" type="number" placeholder="Max Budget" aria-label="default input example" value="@if (request()->has('max_budget')){{ request()->get('max_budget')}}@endif">
            </div>
            <div class="mb-3" style="width: 14vw; margin: 0 0.6vw 0 0.6vw;">
                <input name="author_name" class="form-control" type="text" placeholder="Default input" aria-label="default input example" value="@if (request()->has('author_name')){{ request()->get('author_name')}}@endif">
            </div>
            <button type="submit" class="btn btn-success mb-3" style="width: 14vw; margin: 0 0 0 0.6vw; background-color: #34D399; border: none;">Submit</button>
        </form>
    </div>
    <div class="container w-100" style="margin: 0;">
        <div class="row row-cols-4" style="width: 90vw; grid-template-columns: auto,auto,auto,auto,auto; gap: 1rem;">

            @foreach ($gigs as $gig)
                
                <div class="card" style="width: 20rem; padding: 0; cursor: pointer;" onclick="window.location = '/gig/{{ $gig->id }}'">
                    <img src="storage/{{ $gig->images }}" class="card-img-top" alt="">
                    <div class="card-body" style="overflow: hidden;">
                        <div class="d-flex align-items-center">
                            <a href="" class="m-1">
                                <img src="storage/{{ $gig->user->profile_picture }}" style="width: 4vh">
                            </a>
                            <h5 class="card-title">{{ $gig->user->name }}</h5>
                        </div>
                        <p class="card-text">{{ $gig->about }}</p>
                    </div>
                    <a href="#" class="btn btn-light" style="width: 100%; text-align: right;">
                        <span class="fw-bold">Start from {{ $gig->basic_price }}$</span>
                    </a>
                </div>

            @endforeach  

        </div>
    </div>
    <div class="m-3">
        {{ $gigs->links() }}
    </div>
</div>
@endsection