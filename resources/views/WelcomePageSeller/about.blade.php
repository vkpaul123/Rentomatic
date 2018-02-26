@extends('WelcomePageSeller.layouts.app')
@section('title', 'About')

@section('select_HOME', '')
@section('select_ABOUT', 'class=active')
@section('select_CONTACT', '')

@section('body')
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	 <div id="blue">
	 	<div class="container">
	 		<div class="row">
	 			<h3>About Us.</h3>
	 		</div><!-- /row -->
	 	</div> <!-- /container -->
	 </div><!-- /blue -->

	 
	<!-- *****************************************************************************************************************
	 AGENCY ABOUT
	 ***************************************************************************************************************** -->

	 <div class="container mtb">
	 	<div class="row">
	 		<div class="col-lg-6">
	 			<img class="img-responsive" src="{{ asset('assets/welcomePage/img/agency.jpg') }}" alt="">
	 		</div>
	 		
	 		<div class="col-lg-6" style="text-align: justify;">
	 			<h4>Get to know us!.</h4>
	 			<p>Rentomatica is only an intermediary offering its platform to facilitate the transactions between Seller and Customer/Buyer/User and is not and cannot be a party to or control in any manner any transactions between the Seller and the Customer/Buyer/User. Rentomatica shall neither be responsible nor liable to mediate or resolve any disputes or disagreements between the Customer/Buyer/User and the Seller and both Seller and Customer/Buyer/User shall settle all such disputes without involving Rentomatica in any manner. </p>
	 			<p>Rentomatica design is based on rigorous research, unique product developments, and innovative initiative which has been readily accepted by users. In an attempt to best serve the users, features on the Rentomatica realty portal are constantly invented, evaluated and upgraded. 

                It is here that top-notch properties of major Indian metros are showcased for audiences in India .	 Headquartered in Banglore.</p>
	 			<p><br/><a href="contact" class="btn btn-theme">Contact Us</a></p>
	 		</div>
	 </div><! --/container -->
	</div>

	<!-- *****************************************************************************************************************
	 TEEAM MEMBERS
	 ***************************************************************************************************************** -->
     <!--
	 <div class="container mtb">
	 	<div class="row centered">
		 	<h3 class="mb">MEET OUR TEAM</h3>
		 	
		 	<div class="col-lg-2 col-md-2 col-sm-2 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
				<div class="he-wrap tpl6">
				<img src="{{asset('assets/welcomePage/img/team/team01.jpg')}}" alt="">
					<div class="he-view">
						
					</div><! he view >		
				</div><! he wrap >
				<h4>Vikramsinh<br>Dantkale</h4>
				<h5 class="ctitle">CEO</h5>
				<p>Jobs4mobs - Find Your dream job TODAY!</p>
				<div class="hline"></div>
		 	</div><! /col-lg-4 >

		 	<div class="col-lg-2 col-md-2 col-sm-2">
				<div class="he-wrap tpl6">
				<img src="{{asset('assets/welcomePageEmployer/img/team/team02.jpg')}}" alt="">
					<div class="he-view">
						
					</div><!he view >		
				</div><! he wrap >
				<h4>Amritha<br>AP</h4>
				<h5 class="ctitle">LEAD DESIGNER</h5>
				<p>Jobs4mobs - Find Your dream job TODAY!</p>
				<div class="hline"></div>
		 	</div><! /col-lg-4 >

		 	<div class="col-lg-2 col-md-2 col-sm-2">
				<div class="he-wrap tpl6">
				<img src="{{asset('assets/welcomePage/img/team/team03.jpg')}}" alt="">
						
				</div><! he wrap >
				<h4>Sandeep<br>Jose</h4>
				<h5 class="ctitle">LEAD DEVELOPER</h5>
				<p>Jobs4mobs - Find Your dream job TODAY!</p>
				<div class="hline"></div>
		 	</div><! /col-lg-3 -->	 	
		 	
	 	</div><! --/row -->
	 </div><! --/container -->
	 
	<!-- *****************************************************************************************************************
	 TESTIMONIALS
	 ***************************************************************************************************************** -->
	 <!-- <div id="twrap">
	 	<div class="container centered">
	 		<div class="row">
	 			<div class="col-lg-8 col-lg-offset-2">
	 				<i class="fa fa-comment-o"></i>
	 				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	 				<h4><br/>Marcel Newman</h4>
	 				<p>WEB DESIGNER - BLACKTIE.CO</p>
	 			</div>
	 		</div><! --/row -->
	 	<!--</div><! --/container -->
	 <!--</div><! --/twrap -->
	 
	 
	<!-- *****************************************************************************************************************
	 OUR CLIENTS
	 ***************************************************************************************************************** -->
	{{-- <div id="cwrap">
	 	<div class="container">
	 		<div class="row centered">
	 			<h3>OUR CLIENTS</h3>
	 			<div class="col-lg-3 col-md-3 col-sm-3">
	 				<img src="{{ asset('assets/welcomePage/img/clients/client01.png') }}" class="img-responsive">
	 			</div>
	 			<div class="col-lg-3 col-md-3 col-sm-3">
	 				<img src="{{ asset('assets/welcomePage/img/clients/client02.png') }}" class="img-responsive">
	 			</div>
	 			<div class="col-lg-3 col-md-3 col-sm-3">
	 				<img src="{{ asset('assets/welcomePage/img/clients/client03.png') }}" class="img-responsive">
	 			</div>
	 			<div class="col-lg-3 col-md-3 col-sm-3">
	 				<img src="{{ asset('assets/welcomePage/img/clients/client04.png') }}" class="img-responsive">
	 			</div>
	 		</div><! --/row
	 	<!--</div><! --/container -->
	<!-- </div><! --/cwrap --> --}}

	 @endsection