<?php  $footer = get_field("footer", "option"); ?>
<!--New footer --->
<footer>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="footer-text">
			<?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
      </div>
      <div class="col-lg-6">
	  <?php if(!empty($footer['social_media'])) { ?>
        <div class="social-icon">
          <ul>
			<?php foreach($footer['social_media'] as $social_link) { ?>
				<li><a href="<?php echo $social_link['social_media_url']; ?>" target="_blank"><img class="img-fluid" src="<?php echo $social_link['social_icon']['url']; ?>" /></a></li>
			<?php } ?>
          </ul>
        </div>
		<?php } ?>
      </div>
    </div>
  </div>
</footer>
<div class="spiner-load"><div class="loader"></div></div>
<!--End New footer --->
</body>
</html>