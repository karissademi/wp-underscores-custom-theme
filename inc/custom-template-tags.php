<?php

 /*
  * Retrieve Permalink For Custom Page
  */
function custom_get_page_permalink($slug) {
    $page = get_page_by_path($slug);
    if(isset($page)) {
        return get_permalink($page);
    }
}

function custom_pagination($wp_query) {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $markerNumber = 999999999;
    echo paginate_links(array(
        'base'         => str_replace($markerNumber, '%#%', esc_url(get_pagenum_link($markerNumber))),
	'format'       => '%#%',
	'total'        => $wp_query->max_num_pages,
	'current'      => $paged,
	'prev_text'    => '«',
	'next_text'    => '»',
	'type'         => 'plain',
    ));
}