@extends('_includes.base')

@section('body')
		<style>
			#index-img{
				width: 80%;
				min-width: 720px;
			}

			@media only screen and (max-width: 550px) {
			    #index-img{
			        width: 100%;
			        min-width: 100%;
			    }
			}			
		</style>
        <a href="@url('/works')"><img id="index-img" src="assets/images/index_image.jpg" ></a>
@stop