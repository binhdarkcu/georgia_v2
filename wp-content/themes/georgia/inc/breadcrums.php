<?php
$opt 						= array();
$opt['home'] 				= "Home";
$opt['blog'] 				= "";
$opt['sep'] 				= "";
$opt['prefix']				= "";
$opt['boldlast'] 			= true;
$opt['nofollowhome'] 		= true;
$opt['singleparent'] 		= 0;
$opt['singlecatprefix']		= true;
$opt['archiveprefix'] 		= "";
$opt['searchprefix'] 		= "Search for ";
update_option("bt_breadcrumbs",$opt);

function bt_breadcrumb($prefix = '', $suffix = '', $display = true) {
	global $wp_query, $post;

	$opt = get_option("bt_breadcrumbs");

	if (!function_exists('bold_or_not')) {
		function bold_or_not($input) {
			$opt = get_option("bt_breadcrumbs");
			if ($opt['boldlast']) {
				return '<strong class="current">'.$input.'</strong>';
			} else {
				return $input;
			}
		}
	}

	if (!function_exists('bt_get_category_parents')) {
		// Copied and adapted from WP source
		function bt_get_category_parents($id, $link = FALSE, $separator = '/', $nicename = FALSE){
			$chain = '';
			$parent = &get_category($id);
			if ( is_wp_error( $parent ) )
			   return $parent;

			if ( $nicename )
			   $name = $parent->slug;
			else
			   $name = $parent->cat_name;

			if ( $parent->parent && ($parent->parent != $parent->term_id) )
			   $chain .= get_category_parents($parent->parent, true, $separator, $nicename);

			$chain .= bold_or_not($name);
			return $chain;
		}
	}

	$nofollow = ' ';
	if ($opt['nofollowhome']) {
		$nofollow = ' rel="nofollow" ';
	}

	$on_front = get_option('show_on_front');

	if ($on_front == "page") {
		$homelink = '<a'.$nofollow.'href="'.get_permalink(get_option('page_on_front')).'">'.$opt['home'].'</a>';
		$bloglink = $homelink.' '.$opt['sep'].' <a href="'.get_permalink(get_option('page_for_posts')).'">'.$opt['blog'].'</a>';
	} else {
		$homelink = '<a'.$nofollow.'href="'.get_bloginfo('url').'">'.$opt['home'].'</a>';
		$bloglink = $homelink;
	}

	if ( ($on_front == "page" && is_front_page()) || ($on_front == "posts" && is_home()) ) {
		$output = bold_or_not($opt['home']);
	} elseif ( $on_front == "page" && is_home() ) {
		$output = $homelink.' '.$opt['sep'].' '.bold_or_not($opt['blog']);
	} elseif ( !is_page() ) {
		$output = $bloglink.' '.$opt['sep'].' ';
		if ( ( is_single() || is_category() || is_tag() || is_date() || is_author() ) && $opt['singleparent'] != false) {

			$output .= '<a href="'.get_permalink($opt['singleparent']).'">'.get_the_title($opt['singleparent']).'</a> '.$opt['sep'].' ';
		}
		if (is_single() && $opt['singlecatprefix']) {
			$cats = get_the_category();

			$cat = $cats[0];
			if ( is_object($cat) ) {
				if ($cat->parent != 0) {
					$output .= get_category_parents($cat->term_id, true, " ".$opt['sep']." ");
				} else {
				   //	$output .= '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a> '.$opt['sep'].' ';
				}
			}
		}

		if ( is_category() ) {
			$cat = intval( get_query_var('cat') );
			$output .= bt_get_category_parents($cat, false, " ".$opt['sep']." ");
		} elseif ( is_tag() ) {
			$output .= bold_or_not($opt['archiveprefix']." ".single_cat_title('',false));
		} elseif ( is_date() ) {
			$output .= bold_or_not($opt['archiveprefix']." ".single_month_title(' ',false));
		} elseif ( is_author() ) {
			$user = get_userdatabylogin($wp_query->query_vars['author_name']);
			$output .= bold_or_not($opt['archiveprefix']." ".$user->display_name);
		} elseif ( is_search() ) {
			$output .= bold_or_not('Search "'.stripslashes(strip_tags(get_search_query())).'"');
		} else if ( is_tax() ) {
			$taxonomy 	= get_taxonomy ( get_query_var('taxonomy') );
			//$term_title		=  single_term_title('',false);
			$page= get_page_by_title($taxonomy->label, 'OBJECT', 'page');			
			$term = get_term_by('slug',get_query_var('term') , $taxonomy->name);
			$output .='<a rel="nofollow" href="'.  get_permalink($page->ID) . '">'. $taxonomy->label.'</a> ';
			
			$terms = array($term);						
			while($term->parent){
				$term =get_term( $term->parent	, $term->taxonomy );
				$terms [] =$term ;													
			}
			$terms = array_reverse($terms);
			for ($i=0;$i<count($terms);$i++) {
				$link = get_term_link($terms[$i]);
				if($i+1==count($terms)){
					$output .=$opt['sep']. ' '. bold_or_not( $terms[$i]->name );
				}else
				$output .=$opt['sep']. ' '. '<a rel="nofollow" href="'.  $link . '">'. $terms[$i]->name .'</a> ';
			}
		
		
			
		} else {
               if($post->post_type !='page'){
                 $post_type_label = $opt['blog'];
                 if($post->post_type !='post') {
                      global $wp_post_types;
                      $obj = $wp_post_types[$post->post_type];
                      $post_type_label = $obj->labels->name;
                  }
                  $page= get_page_by_title($post_type_label, 'OBJECT', 'page');
                  $output .= '<a rel="nofollow" href="'. get_permalink($page->ID). '">'. $post_type_label.'</a>';
                  //wp_die($post->post_type);
                  $output .= ' '.$opt['sep'].' ';
             }
              $output .= bold_or_not(get_the_title());


		}

	} else {
		$post = $wp_query->get_queried_object();

		// If this is a top level Page, it's simple to output the breadcrumb
		if ( 0 == $post->post_parent ) {
			$output = $homelink." ".$opt['sep']." ".bold_or_not(get_the_title());
		} else {
			if (isset($post->ancestors)) {
				if (is_array($post->ancestors))
					$ancestors = array_values($post->ancestors);
				else
					$ancestors = array($post->ancestors);
			} else {
				$ancestors = array($post->post_parent);
			}

			// Reverse the order so it's oldest to newest
			$ancestors = array_reverse($ancestors);

			// Add the current Page to the ancestors list (as we need it's title too)
			$ancestors[] = $post->ID;

			$links = array();
			foreach ( $ancestors as $ancestor ) {

				$tmp  = array();
				$tmp['title'] 	= strip_tags( get_the_title( $ancestor ) );
				$tmp['url'] 	= get_permalink($ancestor);
				$tmp['cur'] = false;
				if ($ancestor == $post->ID  ) {
					$tmp['cur'] = true;
				}
				$links[] = $tmp;
			}

			$output = $homelink;
			foreach ( $links as $link ) {
				$output .= ' '.$opt['sep'].' ';
				if (!$link['cur']) {
					$output .= '<a href="'.$link['url'].'">'.$link['title'].'</a>';
				} else {
					    $output .= bold_or_not($link['title']);
				}
			}
		}
	}

	if ($opt['prefix'] != "") {
		$output = $opt['prefix']." ".$output;
	}
	if ($display) {
		echo $prefix.$output.$suffix;
	} else {
		return $prefix.$output.$suffix;
	}
}

function bt_the_breadcrumb() {

		bt_breadcrumb('<div id="bt_breadcrumb">','</div>');
	return;
}

?>