<?php

	// Single post
	if ( is_single() )
		get_template_part('loop', 'single');

	elseif ( is_page() )
		get_template_part('loop', 'page');

	// Post excerpts
	else
		get_template_part('loop', 'excerpts');

?>