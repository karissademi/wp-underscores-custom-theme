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