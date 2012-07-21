<div class="wrap epiceditor-options-page">
	
	<div id="icon-options-general" class="icon32"><br></div>
	<h2>EpicEditor Options</h2>
	<p>My options go here. This was included from the includes directory in my EpicEditor page.</p>
	
	<form method="post" action="options.php">
	
		<?php wp_nonce_field('update-options'); ?>
		
		<table class="form-table">
			<tr>
				<th><label>Output Message</label></th>
				<td>
					<input name="epiceditor_options" type="text" id="epiceditor_options" class="regular-text" value="<?php echo get_option('epiceditor_options'); ?>" />
					<p class="description">This could be any sort of text. Example: "Hello world!"</p>
				</td>
			</tr>
			
		</table>
		
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="epiceditor_options" />
		
		<?php submit_button(); ?>
	
	</form>
	
</div>