 add_filter('manage_pages_columns', 'column_page');
function column_page($defaults) {
	$defaults['column_template'] = 'Page Template';
	return $defaults;
}
 
 
 function page_template_field() {
$custom_field_id = get_post_meta($post_ID);
	if ($custom_field_id) {
		$custom_field_value = get_post_meta($custom_field_id,'page_template');
	return $custom_field_value;
	}
}
 





add_action('manage_pages_custom_column','column_page_content',10,2);
function column_page_content($column_name, $post_ID) {
	if ($column_name == 'column_template') {
		$column_template_list = page_template_field($post_ID);

		if ($column_template_list) {
			echo '<p> '. $column_template_list .' </p>';
		}
	}
}
