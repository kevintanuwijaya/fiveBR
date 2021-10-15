@extends('layout')

@section('main')
<div style="width: 70vw">

    @if ($errors->any())
        <div style="margin: 0 0 0 2%;">
            <span style="color: red;">Please fix the following errors</span>
            <ul style="list-style: disc; margin: 0 0 0 2%;">
                @foreach ($errors->all() as $err )
                    <li style="color: red;">{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
    
    @if ($gig == null)
        @section('title','Insert Gig')
        action="/gig/create"
    @else
        @section('title','Edit Gig')
        action="/gig/edit/{{ $gig->id }}"
    @endif

    enctype="multipart/form-data">
        @csrf
        <div class="sm:overflow-hidden" style="padding: 1%;">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input value="@if($gig != null) {{ $gig->title }} @endif" class="@error('title') form-control is-invalid @else form-control  @enderror" name="title" type="text" placeholder="Default input" aria-label="default input example">
                @error('title')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleDataList" class="form-label">Category</label>
                <input value="@if($gig != null) {{ $gig->category }} @endif" class="@error('category') form-control is-invalid @else form-control  @enderror" name="category" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
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
                @error('category')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">about</label>
                <textarea name="about" type="text" rows="7" class="@error('about') form-control is-invalid @else form-control  @enderror">@if ($gig != null){{ $gig->about }}@endif</textarea>
                @error('about')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <div style="width: 30%;">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Basic Price</label>
                        <input value="@if ($gig != null){{ $gig->basic_price }}@endif" name="basic_price" type="number" class="@error('basic_price') form-control is-invalid @else form-control  @enderror">
                        @error('basic_price')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Basic Price Description</label>
                        <textarea name="basic_price_description" type="text" rows="7" class="@error('basic_price_description') form-control is-invalid @else form-control  @enderror" id="exampleFormControlTextarea1">@if ($gig!=null){{ $gig->basic_description }}@endif</textarea> 
                        @error('basic_price_description')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div style="width: 30%;">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Standard Price</label>
                        <input value="@if ($gig!=null){{ $gig->standard_price }}@endif" name="standard_price" type="file" class="@error('standard_price') form-control is-invalid @else form-control  @enderror">
                        @error('standard_price')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Standard Price Description</label>
                        <textarea name="standard_price_description" type="text" rows="7" class="@error('standard_price_description') form-control is-invalid @else form-control  @enderror" id="exampleFormControlTextarea1">@if ($gig!=null){{ $gig->standard_description }}@endif</textarea>
                        @error('standard_price_description')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div style="width: 30%;">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Premium Price</label>
                        <input value="@if ($gig!=null){{ $gig->premium_price }}@endif" name="premium_price" type="number" class="@error('premium_price') form-control is-invalid @else form-control  @enderror">
                        @error('premium_price')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Premium Price Description</label>
                        <textarea name="premium_price_description" type="text" rows="7" class="@error('premium_price_description') form-control is-invalid @else form-control  @enderror" id="exampleFormControlTextarea1">@if ($gig!=null){{ $gig->premium_description }}@endif</textarea>
                        @error('premium_price_description')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Images</label>
                <input name="image" class="@error('image') form-control is-invalid @else form-control  @enderror" type="file" id="formFile">
                @error('image')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex flex-column w-100">
                <button type="submit" class="btn btn-success" style="margin: 1% 0 1% 0; background-color: #34D399; border: none;">Submit</button>
                <a href="#" type="button" class="btn btn-success" style="margin: 1% 0 1% 0; background-color: #D0FAE4; border: none; color: #3BB583;">Cancel</a>
                
            </div>
        </div>
    </form>

    @if ($gig!=null)
        <form method="POST" action="/gig/{{ $gig->id }}" style="padding: 0 1% 0 1%;">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger" style="background-color: #DC2625; border: none; color: #FFFFFF; width: 100%;">Delete</button>    
        </form>  
    @endif
    
    
</div>

@endsection