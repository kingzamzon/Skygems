<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forum - Skygems CBT Plus</title>
    <meta name="keywords" content="Skygems CBT Plus">
    <meta name="description" content="Forum - Skygems CBT Plus">
    <meta name="author" content="Skygems CBT Plus">
    <link rel="shortcut icon" href="{{ asset('fassets/favicon/favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('fassets/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@include('forum.layouts.header')

@yield('content')

@include('forum.layouts.modal')
<script src="{{ asset('fassets/js/bundle.js') }}"></script>
@include('forum.layouts.svg')
</body>
</html>