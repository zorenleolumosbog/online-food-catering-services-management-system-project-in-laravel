@extends('FrontEnd.master')

@section('title')
    Help Information
@endsection

@section('content')



<!-- breadcrumb -->
	<div class="container">
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Help</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- help-page -->
	<div class="help about">
		<div class="container">
			<h3 class="w3ls-title w3ls-title1">How can we help you ???</h3>
			<div class="faq-w3agile">
				<h5>Top 05 Frequently asked questions(FAQ)</h5>
				<ul class="faq">
					<li class="item1"><a href="#" title="click here">Whats the order procedure?</a>
						<ul>
							<li class="subitem1"><p>You can easily Order through our Website<br>
                            You need to follow the following steps:<br>
                            1. You need to register first <br>
                            2. If you are already registered person then you need to select food in the dish list <br>
                            3. Then Add To Cart || or You can keep it in wishlist <br>
                            4. Shipping Information <br>
                            5. Payment Information <br>
                            6. Done!!! Thats it! <br>
                        </p></li>
						</ul>
					</li>
					<li class="item2"><a href="#" title="click here">What is the order delivery time?</a>
						<ul>
							<li class="subitem1"><p> We are currently work in the specific boundary for Covid-19 panademic. Now we take order Gazipur-27 to Airport. So you can expect the the food is in your hand upto 30 to 50 minutes !!!! </p></li>
						</ul>
					</li>
					<li class="item3"><a href="#" title="click here">I can not get the confirmation mail. What can I do now?</a>
						<ul>
							<li class="subitem1"><p>Due to Corona Panademic we get more order from previous. our helpline works almost 12 hours. So please be patience !!! you can get the mail as soon as possible! </p></li>
						</ul>
					</li>
					<li class="item4"><a href="#" title="click here">Is there any product return option or get refund policy?</a>
						<ul>
							<li class="subitem1"><p>In this matter we are very serious!!! When we are 100% sure the food quality then the food will be in your hand!! So you can order our food without any hasitation!!!</p></li>
						</ul>
					</li>
					<li class="item5"><a href="#" title="click here">What is the area boundary to serve your food ?</a>
						<ul>
							<li class="subitem1"><p>We are currently work in the specific boundary for Covid-19 panademic. Now we take order Gazipur-27 to Airport. So you can expect the the food is in your hand upto 30 to 50 minutes !!!!</p></li>
						</ul>
					</li>

				</ul>
				<!-- script for tabs -->
				<script type="text/javascript">
					$(function() {

						var menu_ul = $('.faq > li > ul'),
							   menu_a  = $('.faq > li > a');

						menu_ul.hide();

						menu_a.click(function(e) {
							e.preventDefault();
							if(!$(this).hasClass('active')) {
								menu_a.removeClass('active');
								menu_ul.filter(':visible').slideUp('normal');
								$(this).addClass('active').next().stop(true,true).slideDown('normal');
							} else {
								$(this).removeClass('active');
								$(this).next().stop(true,true).slideUp('normal');
							}
						});

					});
				</script>
				<!-- script for tabs -->
			</div>
			{{-- <div class="help-search">
				<h5>You can register yourself for listing and we will contact you:</h5>
				<form action="#" method="post">
					<input type="search" name="Search" placeholder="Please type your query eg.Return and email" required="">
					<button type="submit" class="btn btn-default" aria-label="Left Align">
						Submit
					</button>
				</form>
			</div> --}}
		</div>
	</div>

	<!-- //help-page -->




 @endsection
