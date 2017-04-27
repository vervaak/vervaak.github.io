@extends('_includes.base')

@section('pageDescription')@yield('post::brief')@endsection

@section('body')

    <div class="ten columns">
            
            <a href="@url('blog')">上一頁／Back</a>

            <h1>@yield('post::title')</h1>

            <small>@yield('post::date')</small>

            @yield('post_body')

            <a href="@url('blog')">上一頁／Back</a>
    </div>

@stop
