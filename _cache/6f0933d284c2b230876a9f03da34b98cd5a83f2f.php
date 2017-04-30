<style>

#home{
	text-align: center;
}

#home img{
	padding-top: 60px;
	padding-bottom: 60px;
	width: 80px;
}

.nav-toggle{
	display: none;
}

#nav-bar{
	background-color: white;
	margin-bottom: 4rem;
}

ul.nav-items{
     list-style-type: none;
     padding: 0px;
}

ul.nav-items a{
	display: block;
    border-top: 1px solid  #eee;
    padding-top: 1.2rem;
    padding-bottom: 1.2rem;
    color: grey;
    text-decoration: none;    
}

ul.nav-items a:hover{
	background-color: #ccc;
	color: black;
}

#nav-bar-top{
	display: none;
}
	
@media  only screen and (max-width: 550px) {
	.nav-toggle{
		display: block;
		color: #333;
		text-align: center;
		background-color: white;
	} 

	.nav-toggle + ul{
	    display: none;
	} 

	.nav-toggle + ul a{
		text-align: center;
	}

	#nav-bar-top{
		padding-top: 1rem;
		padding-bottom: 1rem;
		width: 100%;
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		background-color: white;
		border-bottom: 1px solid #ddd;
	}
}	
</style>
<div id="home">
    <img src="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('assets/images/name.jpg', '/').'');  ?>" />
</div>
<div id="nav-bar" >
	<div class="nav-toggle" onclick="myFunction(this)"> MENU </div>
	<ul class="nav-items">
	    <li><a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('/', '/').'/');  ?>">首頁／Home</a></li>
	    <li><a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('works', '/').'/');  ?>">作品／Works</a></li>
	    <li><a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('about', '/').'/');  ?>">關於／About</a></li>
	    <li><a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('blog', '/').'/');  ?>">文章／Essay</a></li>
	    <li><a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('contact', '/').'/');  ?>">聯絡／Contact</a></li>
	</ul>
</div>

<script>

	function myFunction(e){
		if($(e).siblings( ".nav-items" ).css( "display" ) == "none"){
			$(e).siblings( ".nav-items" ).css( "display", "block" );
		}else{
			$(e).siblings( ".nav-items" ).css( "display", "none" );
		}			
	}

   $( document ).ready(function() {
	    var nav = document.getElementById("nav-bar");
	    var navClone = nav.cloneNode(true);
	    navClone.style.display = "none";
	    navClone.setAttribute("id", "nav-bar-top");
	    document.body.appendChild(navClone);

		$(window).scroll(function () {
			var width = $(window).width();
			if ($(window).scrollTop() > 350 && width < 550) {
				$('#nav-bar-top').fadeIn();
			}else{
				$('#nav-bar-top').fadeOut();
			}
		});   			
    });
</script>

