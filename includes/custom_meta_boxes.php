<?php

	function add_sample_meta(){

		// Adds a meta box to one or more screens.
		// Reference -> https://developer.wordpress.org/reference/functions/add_meta_box/
		add_meta_box('sample', 'Sample Meta Box', 'display_sample_meta', array('bv_blank'), 'normal', 'high');

	}

	function display_sample_meta( $post ){

		// Make the incoming $post var a global
		global $post;

		// Returns a multidimensional array with all custom fields of a particular post or page
		// Reference -> https://codex.wordpress.org/Function_Reference/get_post_custom
		$values = get_post_custom( $post->ID );

		// The nonce field is used to validate that the contents of the form request came from the current site and not somewhere else
		// Reference -> https://codex.wordpress.org/Function_Reference/wp_nonce_field
		wp_nonce_field( 'sample_meta_box_nonce', 'meta_box_nonce' );

		// Checking if $values is set | escaping attributes
		$sample_input_txt 	 = isset( $values['sample_input'] ) ? esc_attr( $values['sample_input'][0] ) : '';
		$sample_select_txt 	 = isset( $values['sample_select'] ) ? esc_attr( $values['sample_select'][0] ) : '';
		$sample_radio_txt 	 = isset( $values['sample_radio'] ) ? esc_attr( $values['sample_radio'][0] ) : '';
		$sample_textarea_txt 	 = isset( $values['sample_textarea'] ) ? esc_attr( $values['sample_textarea'][0] ) : '';
		$filearray = get_post_meta( get_the_ID(), 'sample_file_upload', true );
		$this_file = $filearray['url'];

		?>

		<!--Sample Input-->
		<div class="meta-wrapper">
			<label for="sample_input">Sample Input:</label><br />
			<input name="sample_input" id="sample_input" placeholder="Enter Sample here..." value="<?php echo $sample_input_txt; ?>">
		</div>
		<!--Sample Input-->

		<!--Sample Select-->
		<div class="meta-wrapper">
			<label for="sample_select">Sample Select:</label><br />
			<select name="sample_select" id="sample_select">
				<option value="Sample001" <?php selected( $sample_select_txt, 'Sample001' ); ?>>Sample001</option>
				<option value="Sample002" <?php selected( $sample_select_txt, 'Sample002' ); ?>>Sample002</option>
				<option value="Sample003" <?php selected( $sample_select_txt, 'Sample003' ); ?>>Sample003</option>
				<option value="Sample004" <?php selected( $sample_select_txt, 'Sample004' ); ?>>Sample004</option>
				<option value="Sample005" <?php selected( $sample_select_txt, 'Sample005' ); ?>>Sample005</option>
			</select>
		</div>
		<!--Sample Select-->

		<!--Sample Radio-->
		<div class="meta-wrapper">
		<label for="sample_radio">Sample Radio:</label><br />
		<input type="radio" name="sample_radio" value="sample1" <?php checked( $sample_radio_txt, 'sample1' ); ?>> Sample 1<br>
		<input type="radio" name="sample_radio" value="sample2" <?php checked( $sample_radio_txt, 'sample2' ); ?>> Sample 2<br>
		<input type="radio" name="sample_radio" value="other" <?php checked( $sample_radio_txt, 'other' ); ?>> other
		</div>
		<!--Sample Radio-->

		<!--Sample Textarea-->
		<div class="meta-wrapper">
		<label for="sample_textarea">Sample Textarea:</label><br />
		<textarea name="sample_textarea"><?php echo $sample_textarea_txt; ?></textarea>
		</div>
		<!--Sample Textarea-->

		<!--Sample  File Uploader-->
		<div class="meta-wrapper">
			<label for="sample_file_upload">Upload your here:</label>
			<input type="file" id="sample_file_upload" name="sample_file_upload" value="" />
			<a href="<?php echo $this_file; ?>" target="_blank"><?php echo $this_file; ?></a>
		</div>
		<!--Sample  File Uploader-->

		<div class="meta-wrapper">
			<iframe src="<?php echo $this_file; ?>"></iframe>
		</div>

		<?php

	}
	// end of display_sample_meta
	
	// sample_meta_box_save ~~~>
	include(plugin_dir_path(__FILE__) . 'sample_meta_box_save.php');
	// end of sample_meta_box_save ~~~>