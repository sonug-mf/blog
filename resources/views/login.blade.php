@extends('layout.publiclayout')

@section('header-css')
<style>
    .form-element{
        width: 100%;
        padding: 10px;
        border: 1px lightcyan;
        border-radius: 20px;
    }

    .form-group{
        margin-top: 5px;
        margin-bottom: 5px;
    }
</style>
@endsection

@section('main')
<main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
    <h1>Login Form</h1>

    <div class="col-span-10 bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <form method="post" action="/login">
            @csrf
            <div class="form-group">
                <input type="text" class="form-element" name="email" placeholder="Enter Email Address" />
                <span style="color: red; padding: 2px; float: left; margin-left: 14px;">@error('email') {{ $message }} @enderror</span>
            </div>

            <div>
                <input type="password" class="form-element" name="password" placeholder="Enter Password" />
                <span style="color: red; padding: 2px; float: left; margin-left: 14px;">@error('password') {{ $message }} @enderror</span>

            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit" style="float: right; margin-top: 17px;">Login</button>
            </div>
        </form>
    </div>
</main>
@endsection