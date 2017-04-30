@extends('_includes.base')

@section('pageTitle', '- Contact')

@section('body')
	<style>
#splash-images{
    width: 70% !important;
    min-width: 720px !important;
}

@media only screen and (max-width: 550px) {
    #splash-images{
        width: 100% !important;
        min-width: 100% !important;
    }
}
	</style>
		<img id="splash-images" src="@url('assets/images/contact_me.jpg')" />
		<br/>
		<h3>歡迎您於我聯絡！</h3>

		email：sculptorlai@gmail.com<br/>
		tel：+886 0928-625-372

@stop