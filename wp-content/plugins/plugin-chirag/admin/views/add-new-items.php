<div class="admin-list-item-container">
<div class="wrap">
	
	<?php $retrieve_nonce = wp_create_nonce( 'name_of_nonce_field' ); ?>
	 <form method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=' . $this->plugin_name . 'add-item' ) ); ?>">
		<input type="hidden" name="name_of_nonce_field" value="<?php echo $retrieve_nonce; ?>"/>
		
		<table class="widefat striped">
			<thead>
				<tr>
					<td><h1>Add New Item Here</h1></td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Enter Name</th>
					<td><input type="text" required name="name" class="name" /></td>
				</tr>
				<tr>
					<th>Enter Email</th>
					<td><input type="text" required name="email" class="email" /></td>
				</tr>
				<tr>
					<th>Enter Phone</th>
					<td><input type="text" required name="phone" class="phone" /></td>
				</tr>
			</tbody>
		</table>
		<?php settings_fields( 'add_new_items' );  ?>
		<?php submit_button( 'Submit' ); ?>
	</form>
</div>
</div>
<style> .admin-list-item-container .wrap { padding: 25px 25px; margin: 20px 20px 0 0; background: #fff; } </style>