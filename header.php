<!doctype html>
<html lang="en">
<head>
	<title><?php if ($pageTitle) { echo $pageTitle . ' | '; } ?>St. Martha Catholic Community</title>
	<meta charset="utf-8">
	<link rel="icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="includes/unslider.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#slider').unslider({
				speed: 500,               //  The speed to animate each slide (in milliseconds)
				delay: 8000,              //  The delay between slide animations (in milliseconds)
				keys: true,               //  Enable keyboard (left, right) arrow shortcuts
				dots: true,				  //  Display dot navigation
				fluid: true
			});
		});
	
		$(window).load(function() {
			$("#<?=$pageFile?>").addClass("active");
			var width = $(".active").width();
			var position = $(".active").position();
			var newPos = position.left + (width / 2 + 10) + "px";
			$("#active-arrow").css({"margin-left": newPos});
			$("#active-arrow").delay(200).animate({"margin-top": "16px"}, 200);
			
			$(".nav-link").click(function(e) {
				event.preventDefault();
				$("#main-content").animate({ "opacity": 0 }, 300, function() {
					$(this).load(e.target.id + ".php", function() {
						if (e.target.id == "about-us") {
							$('#slider').unslider({
								speed: 500,               //  The speed to animate each slide (in milliseconds)
								delay: 8000,              //  The delay between slide animations (in milliseconds)
								keys: true,               //  Enable keyboard (left, right) arrow shortcuts
								dots: true,				  //  Display dot navigation
								fluid: true
							});
						}
						$(this).animate({ "opacity": 1 }, 300);
					});
				});
				var title = $(this).text();
				var page = $(this).attr("id");
				var fullTitle = title + " | St. Martha Catholic Community";
				document.title = fullTitle;
				if (typeof (history.pushState) != "undefined") {
					var obj = { Page: fullTitle, Url: page };
					history.pushState(obj, obj.Page, obj.Url);
				}
				var width = $(this).width();
				var position = $(this).position();
				var newPos = position.left + (width / 2 + 10) + "px";
				$("#active-arrow").animate({"margin-left": newPos}, 200);
				$(".nav-link").removeClass("active");
				$(this).addClass("active");
			});
			
		});
	</script>
</head>
<body>
	<div id="header">
		<div class="container">
			<a href="about-us" id="logo"></a>
			<div id="header-right">
				<div id="search-button"></div>
				<div id="sign-in-register-link">
					<a href="">Sign In</a>
					&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="">Register</a>
				</div>
			</div>
			<div id="nav">
				<a href="about-us" class="nav-link" id="about-us">About Us</a>
				<a href="parish" class="nav-link" id="parish">Parish</a>
				<a href="school" class="nav-link" id="school">School</a>
				<a href="athletics" class="nav-link" id="athletics">Athletics</a>
				<a href="stewardship" class="nav-link" id="stewardship">Stewardship</a>
				<a href="news" class="nav-link" id="news">News</a>
				<a href="calendar" class="nav-link" id="calendar">Calendar</a>
				<div id="active-arrow"></div>
			</div>
		</div>
	</div>
	
	<div id="main-content">