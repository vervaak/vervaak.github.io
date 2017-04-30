@extends('_includes.base')

@section('pageTitle', '- Works')

@section('body')
	<style>
		.light-box{
			display: none;
		}

		.thumb{
			max-height: 150px;
		}

		.thumb-wrap{
			display: inline-block;
			padding: 12px;
		}

		@media only screen and (max-width: 700px) {


		    .light-box{
		    	max-width: 375px;
		    }

			.thumb{
				max-width: 200px;
			}

		}		
	</style>
<?php

	$folder = '/Users/sijung/github/vervaak.github.io/content/assets/images/works';

    $dir = new RecursiveDirectoryIterator($folder);
    $ite = new RecursiveIteratorIterator($dir);
    $files = new RegexIterator($ite, '/^.+\.jpg$/i', RegexIterator::GET_MATCH);
    $fileList = array();
    foreach($files as $file) {
        $fileList = array_merge($fileList, $file);
    }

?>	
	@foreach($fileList as $image)
		<?php 
			$originalFilePath = $image;
			$path  = str_replace("/Users/sijung/github/vervaak.github.io/content/","/", $originalFilePath); 
			$extension_pos = strrpos($path, '.'); 
			$thumbPath = substr($path, 0, $extension_pos) . '_mobile' . substr($path, $extension_pos);
			
			$originalFileName  = str_replace("/Users/sijung/github/vervaak.github.io/content/assets/images/works","", $originalFilePath); 

			$tagData = uniqid();
		?>
		<a href="{{$path}}" data-lightbox="{{$tagData}}" data-title="{{$originalFileName}}"><img class="thumb" src="{{$thumbPath}}" /></a>

	@endforeach		
<script src="/assets/vendor/lightbox-master/js/lightbox.js"></script> 
@stop