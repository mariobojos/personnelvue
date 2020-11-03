@extends('layout')

@section('content')
<div id="app">
{{--    <router-link to="/" class="nav-link">Example</router-link>--}}
{{--    <router-link to="/main" class="nav-link">Main</router-link>--}}
{{--    <router-link to="/add" class="nav-link">Add Personnel</router-link>--}}
    <div class="container">
        <router-view class="col-12"></router-view>
    </div>
</div>
<script src="../js/app.js"></script>
@endsection


