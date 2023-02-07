@extends('FrontEnd.master')

@section('title')
    Contact Information
@endsection

@section('content')


<!-- breadcrumb -->
	<div class="container">
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Contact Us</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- contact -->
	<div id="contact" class="contact cd-section">
		<div class="container">
			<h3 class="w3ls-title">Contact us</h3>
			<p class="w3lsorder-text">For any queries or to request a quotation or proposal, please get in touch with us !!!! </p>
			<div class="contact-row agileits-w3layouts">
				<div class="col-xs-6 col-sm-6 contact-w3lsleft">
					<div class="contact-grid agileits">
						<h4>Hi! Please help us to serve you better by letting us know some basic details about your event. These are information that you will need to tell us eventually but informing them to us in advance helps us prepare and serve you better !!!</h4><br><br>

                            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
                        <form action="{{ route('contact_show') }}" method="post">
                            @csrf
							<input type="text" name="name" placeholder="Name" required="">
							<input type="email" name="email" placeholder="Email" required="">
							<input type="text" name="phone_number" placeholder="Phone Number" required="">
							<textarea name="message" placeholder="message..." required=""></textarea>
							<input type="submit" value="Submit" >
						</form>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 contact-w3lsright">
					<h6><span>O F C S M S </span>You can also contact us the following ways: </h6>
					<div class="address-row">
						<div class="col-xs-2 address-left">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</div>
						<div class="col-xs-10 address-right">
							<h5>Visit Us</h5>
							<p>Nishat Nagar, Tongi, Gazipur , Bangladesh </p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row w3-agileits">
						<div class="col-xs-2 address-left">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-xs-10 address-right">
							<h5>Mail Us</h5>
							<p><a href="mailto:info@example.com"> ofcsms.abirhasan@gmail.com</a></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-xs-2 address-left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-xs-10 address-right">
							<h5>Call Us</h5>
							<p>+88 015 2132 8545</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- map -->
		<div class="map agileits">
           <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14588.75051485969!2d90.38900244999999!3d23.91840915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1623629666579!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.948805392833!2d-73.99619098458929!3d40.71914347933105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a27e2f24131%3A0x64ffc98d24069f02!2sCANADA!5e0!3m2!1sen!2sin!4v1479793484055"></iframe> --}}

            {{-- <iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/view?key=AIzaSyAJifc7pwvUkN0yrtn7BPn8I-lRg33PSNc&center=24.3333333,91&zoom=12&maptype=satellite" style="border:1px solid #000;"></iframe><a href="http://www.maplandia.com/bangladesh/dhaka-div/kishoreganj-zl/gazipur/" title="google satellite map of Gazipur">Gazipur google map</a> --}}
		</div>
		<!-- //map -->
	</div>
	<!-- //contact -->


    @endsection
