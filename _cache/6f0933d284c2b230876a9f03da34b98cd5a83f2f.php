<style>

#nav-toggle{
    display: none;
}

#nav-toggle-label{
	display: none;
}

#nav-toggle + div a:hover{
	background-color: #ccc;
	color: white;
}

#nav-toggle + div a{
	display: block;
	text-align: left;
}

#home{
	text-align: center;
}

#home img{
	padding-top: 40px;
	padding-bottom: 40px;
	width: 80px;
}
@media  only screen and (max-width: 700px) {
	#nav-toggle-label{
		display: block;
		color: #333;
		text-align: center;
	}

	#nav-toggle:checked + div{
	    display: block;
	}  

	#nav-toggle + div{
	    display: none;
	} 

	#nav-toggle + div a{
		display: block;
		text-align: center;
	}
}	
</style>
<div id="home">
    <img src="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('assets/images/name.jpg', '/').'');  ?>" />
</div>
<label id="nav-toggle-label" for="nav-toggle">MENU</label>
<input id="nav-toggle" type="checkbox" />
<div>
	<ul>
	    <li><a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('/', '/').'/');  ?>">首頁／Home</a></li>
	    <li><a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('/works', '/').'/');  ?>">作品／Works</a></li>
	    <li><a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('about', '/').'/');  ?>">關於／About</a></li>
	    <li><a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('blog', '/').'/');  ?>">文章／Essay</a></li>
	    <li><a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('about', '/').'/');  ?>">聯絡／Contact</a></li>
	</ul>
</div>