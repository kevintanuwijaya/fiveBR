@extends('layout')
@section('title','Login Page')
@section('main')
<div class="d-flex justify-content-center" style="background-color: #DC2625; width: 100vw;">
    @if ($error == '1')
        <span class="fs-2 fw-bold" style="color: white;">Invalid Credential</span>
    @endif
</div>
<div class="mt-10 sm:mt-0" style="width: 30%; height: 85vh;">

    

    <div class="px-4 sm:px-0">
        <h3 class="fs-2 fw-bold" style="text-align: center;">Login</h3>
    </div>
    <div class="md:grid md:grid-cols-2 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
        <form method="POST" action="/login">
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden" style="padding: 10%;">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="email" class="@error('email') form-control is-invalid @else form-control  @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="@error('password') form-control is-invalid @else form-control  @enderror" id="exampleInputPassword1">
                    @error('password')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>
                <div class="d-flex flex-column w-100">
                    <button type="submit" class="btn btn-success" style="margin: 5% 0 5% 0; background-color: #34D399; border: none;">Login</button>
                    <a href="/register" type="button" class="btn btn-success" style="margin: 5% 0 5% 0; background-color: #D0FAE4; border: none; color: #3BB583;">register</a>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection