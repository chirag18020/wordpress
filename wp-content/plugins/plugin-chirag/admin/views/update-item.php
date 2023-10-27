<?php 
$data = "";
global $wpdb;
$table_name = $wpdb->prefix . "list_user";
$data = $wpdb->get_row("SELECT * FROM $table_name WHERE u_id='".$_REQUEST['item-id']."'");  
?>
<div class="admin-list-item-container">
<div class="wrap">
	<?php 
	if(!empty($data)) {
	$retrieve_nonce = wp_create_nonce( 'update_page_item' ); ?>
	 <form method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=' . $this->plugin_name . 'update-item' ) ); ?>">
		<input type="hidden" name="update_page_item" value="<?php echo $retrieve_nonce; ?>"/>
		<table class="widefat striped">
			<thead>
				<tr>
					<td><h1>Edit Item</h1></td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>User Id</th>
					<td>
						<input type="text" value="<?php echo $_REQUEST['item-id'];?>" required name="u_id" class="u_id" disabled />
						<input type="hidden" value="<?php echo $_REQUEST['item-id'];?>" required name="u_id" class="u_id"/>
					</td>
				</tr>
				<tr>
					<th>Enter Name</th>
					<td><input type="text" value="<?php echo $data->u_name; ?>" required name="name" class="name" /></td>
				</tr>
				<tr>
					<th>Enter Email</th>
					<td><input type="text" value="<?php echo $data->u_email; ?>" required name="email" class="email" /></td>
				</tr>
				<tr>
					<th>Enter Phone</th>
					<td><input type="text" value="<?php echo $data->u_phone; ?>" required name="phone" class="phone" /></td>
				</tr>
			</tbody>
		</table>
		<?php settings_fields( 'Update_Items' );  ?>
		<?php submit_button( 'Submit' ); ?>
	</form>
<?php } else { echo "Invalid request"; } ?>	
</div>
</div>
<style> .admin-list-item-container .wrap { padding: 25px 25px; margin: 20px 20px 0 0; background: #fff; } </style>