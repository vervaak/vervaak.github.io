@extends('_includes.base')

@section('pageTitle', '- Blog')

@section('body')
    <style>
        article h1 a{
            color: #323336;
            text-decoration: none;
        }

    </style>
    <div >
        @foreach($paginatedBlogPosts as $post)

            <article>
                    <h1><a href="@url($post->path)">{{ $post->title }}</a></h1>   
                    <p>{{ str_limit($post->brief, 130) }}</p>
                    <a href="@url($post->path)">read more</a>
                    <br/>
            </article>

        @endforeach

        @include('_includes.blog_paginator')
    </div>


@stop