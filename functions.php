<?php
function pagination( $pages = 1 )
{  
	global $post;
	
	if ( get_query_var('paged') ) {
	    $paged = get_query_var('paged');
	} else if ( get_query_var('page') ) {
	    $paged = get_query_var('page');
	} else {
	    $paged = 1;
	}   

	echo '<div class="prev-next">';
	if ( $paged == 1 ) {
		echo '<span class="nav-prev"><img src="' . get_stylesheet_directory_uri() . '/images/gray-left-arrow.png" /></span>';
		if ( $pages > $paged ) {
			echo '<span class="nav-date">' . mysql2date('M j', $post->post_date) . '</span>';
			echo '<span class="nav-next"><a href="'. get_pagenum_link( ( $paged + 1 ) ) . '" /><img src="' . get_stylesheet_directory_uri() . '/images/right-arrow.png" /></a></span>';
		} else {
			echo '<span class="nav-date">' . mysql2date('M j', $post->post_date) . '</span>';
    		echo '<span class="nav-next"><img src="' . get_stylesheet_directory_uri() . '/images/gray-right-arrow.png" /></span>';
		}
	} else if ( $paged > 1  && $paged < $pages ) {
		if ( $pages > $paged ) {
			echo '<span class="nav-prev"><a href="'. get_pagenum_link( ( $paged - 1 ) ) . '" /><img src="' . get_stylesheet_directory_uri() . '/images/left-arrow.png" /></a></span>';
			echo '<span class="nav-date">' . mysql2date('M j', $post->post_date) . '</span>';
    		echo '<span class="nav-next"><a href="'. get_pagenum_link( ( $paged + 1 ) ) . '" /><img src="' . get_stylesheet_directory_uri() . '/images/right-arrow.png" /></a></span>';
		}
	} else if ( $paged == $pages ) {
		echo '<span class="nav-prev"><a href="'. get_pagenum_link( ( $paged - 1 ) ) . '" /><img src="' . get_stylesheet_directory_uri() . '/images/left-arrow.png" /></a></span>';
		echo '<span class="nav-date">' . mysql2date('M j', $post->post_date) . '</span>';
    	echo '<span class="nav-next"><img src="' . get_stylesheet_directory_uri() . '/images/gray-right-arrow.png" /></span>';
	}
	echo '<div/>';
}
?>