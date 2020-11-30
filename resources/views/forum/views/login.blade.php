@extends('forum.layouts.app')

@section('content')
<br><br>
<main id="tt-pageContent" class="tt-offset-none">
    <div class="container">
        <div class="tt-loginpages-wrapper">
            <div class="tt-loginpages">
                <a href="{{route('forum.index')}}" class="tt-block-title">
                    <img src="{{ asset('fassets/images/logo.png') }}" alt="">
                    <div class="tt-title">
                        Welcome to Forum19
                    </div>
                </a>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="form-default" action="{{route('forum.auth.login')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="loginUserPhone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="loginUserPhone" placeholder="09082544787">
                    </div>
                    <div class="form-group">
                        <label for="loginUserPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="loginUserPassword" placeholder="************">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="settingsCheckBox01" name="checkbox">
                                    <label for="settingsCheckBox01">
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        <span class="tt-text">Remember me</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary btn-block">Log in</button>
                    </div>
                    <div class="tt-notes">
                        By Logging in, signing in or continuing, I agree to
                        Forum19’s <a href="#" class="tt-underline">Terms of Use</a> and <a href="#" class="tt-underline">Privacy Policy.</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection