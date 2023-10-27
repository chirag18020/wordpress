<?php 
/*
 Template Name: Calculator
 Text Domain:  ecomwp
*/
get_header();
?>


<!-- Begin Popular Search Area -->
        <div class="popular-search_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="popular-search">
                            <label>Popular Search:</label>
                            <a href="javascript:void(0)">Brakes & Rotors,</a>
                            <a href="javascript:void(0)">Lighting,</a>
                            <a href="javascript:void(0)">Perfomance,</a>
                            <a href="javascript:void(0)">Wheels & Tires</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Search Area End Here -->

	<!--
     <div class="choose-product">
			<input type="text" value="500" id="val1" >
			<input type="submit" value="MakePayment" id="submit" >
			<a href="http://localhost/wordpress/makepayment/?Mode=payment&val1=500" target="_blank">Make Payment</a>
	 </div>
	 --->
	 <div class="choose-product">
		<form action="http://localhost/wordpress/makepayment" method="post">	
			<input type="text" name="val1" value="500" id="val1" >
			<input type="hidden" name="Mode" value="payment" id="Mode" >
			<input type="date" name="date" value="" id="date" >
			<input type="submit" value="MakePayment" id="submit" >
	 </div>


<?php get_footer(); ?>