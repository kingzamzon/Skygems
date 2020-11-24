<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forum - Responsive HTML5 Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Forum - Responsive HTML5 Template">
    <meta name="author" content="Forum">
    <link rel="shortcut icon" href="{{ asset('fassets/favicon/favicon.ico') }}">
    <meta name="format-detection" content="telephone=no">
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