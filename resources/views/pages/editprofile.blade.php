@extends('layout')
@section('title','Edit Profile')
@section('main')
<div class="mt-10 sm:mt-0" style="width: 30%;">
    <div class="md:grid md:grid-cols-2 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
        <form method="POST" action="/profile/edit/{{ $user->id }}" enctype="multipart/form-data" >
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden" style="padding: 10%;">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" name="name" class="@error('name') form-control is-invalid @else form-control  @enderror" id="exampleFormControlInput1" value="{{ $user->name }}">
                    @error('name')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" name="email" class="@error('email') form-control is-invalid @else form-control  @enderror" id="exampleFormControlInput1" value="{{ $user->email }}">
                    @error('email')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">About (Optional)</label>
                    <input type="text" name="about" class="@error('about') form-control is-invalid @else form-control  @enderror" id="exampleFormControlInput1" value="{{ $user->about }}">
                    @error('about')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input type="file" id="formFile" name="picture" class="@error('picture') form-control is-invalid @else form-control  @enderror">
                    @error('picture')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description (Optional)</label>
                    <textarea class="@error('description') form-control is-invalid @else form-control  @enderror" name="description" id="exampleFormControlTextarea1" rows="3">{{ $user->description}} </textarea>
                    @error('description')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex flex-column w-100">
                    <button type="submit" class="btn btn-success" style="margin: 5% 0 5% 0; background-color: #34D399; border: none;">Submit</button>
                    <a href="/register" type="button" class="btn btn-success" style="margin: 5% 0 5% 0; background-color: #D0FAE4; border: none; color: #3BB583;">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>  

@endsection