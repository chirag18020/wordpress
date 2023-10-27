<?php

/**
 * @package    Crude_Operation
 * @subpackage Crude_Operation/admin/partials
 * 
 */
?>
<?php 
global $wpdb;
$table_name = $wpdb->prefix . "list_user";
$data = $wpdb->get_row("SELECT * FROM $table_name WHERE u_id='".$_REQUEST['action-id']."'");  
?>
<div class="admin-list-item-container">
<div id="update-page" class="wrap">
	<?php 
	if(!empty($data)) { 
	$retrieve_nonce = wp_create_nonce('update_data_nonce_field');
	?>
	 <form method="post" >
		<input type="hidden" id="update_data_nonce_field" name="update_data_nonce_field" value="<?php echo $retrieve_nonce; ?>"/>
		<table class="widefat striped">
			<thead>
				<tr>
					<td><h1>Edit Data</h1></td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>User Id</th>
					<td>
						<input type="text" value="<?php echo $_REQUEST['action-id'];?>" required name="action-id" class="u_id" disabled />
						<input type="hidden" value="<?php echo $_REQUEST['action-id'];?>" required name="action-id" class="u_id"/>
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
		<p class="submit"><input type="button" id="updatecrud" class="button button-primary" value="Update" /></p>
		<div id="feedback"></div>
	</form>
<?php } else { echo "Invalid request"; } ?>	
</div>
</div>