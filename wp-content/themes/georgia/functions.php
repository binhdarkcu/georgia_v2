<?php
    //add theme support
    add_theme_support('post-thumbnails',array('post','page','sliders','testimonials','promotion','homeland'));

    //register post type
    //include TEMPLATEPATH.'/post-type/registry-post-type.php';
	
	//register post type
    //include TEMPLATEPATH.'/taxonomy-custom/taxonomy-custom.php';
	
	//register meta box
	require_once( 'meta-box/init.php' );

    //change label post
    include 'inc/change_label_post.php';
	
	//add type columns
    //include 'inc/type_column.php';
	
	//filter home
    //include 'inc/filter_home.php';
	
	//contact form
	//include TEMPLATEPATH . '/email/smtp.php';
	//include TEMPLATEPATH . '/email/xtemplate.contact.php';
	
	//contact form
	//include TEMPLATEPATH . '/email/xtemplate.jimform.php';
	
	//register menu
	function register_menu() {
	  register_nav_menu('menu_top',__( 'menu_top' ));
	  
		register_nav_menus( array(
			'menu_top' => 'Header - Menu'
		) );
	}
	add_action( 'init', 'register_menu' );
	
	//rewrite view all category
	function change_viewall_url_rewrite() {
		if ( is_category()) {
			wp_redirect( home_url( "/category/view-all" ));
			exit();
		}	
	}
	//add_action( 'template_redirect', 'change_viewall_url_rewrite' );
	
	function get_page_id_by_slug($slug){
	    global $wpdb;
	    $id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."'AND post_type = 'page'");
	    return $id;
	}
	
	function get_post_id_by_slug($slug){
	    global $wpdb;
	    $id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."'AND post_type = 'post'");
	    return $id;
	}
	
	function get_post_id( $slug, $post_type ) {
		if(!empty($slug)){
		    $query = new WP_Query(
		        array(
		            'name' => $slug,
		            'post_type' => $post_type
		        )
		    );
		
		    $query->the_post();
		
		    return get_the_ID();
		}
	}


/*TinyMCE*/
function my_format_TinyMCE( $in ) {
    $in['remove_linebreaks'] = false;
    $in['gecko_spellcheck'] = false;
    $in['keep_styles'] = true;
    $in['accessibility_focus'] = true;
    $in['tabfocus_elements'] = 'major-publishing-actions';
    $in['media_strict'] = false;
    $in['paste_remove_styles'] = false;
    $in['paste_remove_spans'] = false;
    $in['paste_strip_class_attributes'] = 'none';
    $in['paste_text_use_dialog'] = true;
    $in['wpeditimage_disable_captions'] = true;
    $in['plugins'] = 'tabfocus,paste,media,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpfullscreen';
    $in['content_css'] = get_template_directory_uri() . "/editor-style.css";
    $in['wpautop'] = false;
    $in['apply_source_formatting'] = false;
    $in['block_formats'] = "Paragraph=p; Heading 3=h3; Heading 4=h4";
    $in['toolbar1'] = 'bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,wp_fullscreen,wp_adv ';
    $in['toolbar2'] = 'formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help ';
    $in['toolbar3'] = '';
    $in['toolbar4'] = '';
    return $in;
}
add_filter( 'tiny_mce_before_init', 'my_format_TinyMCE' );