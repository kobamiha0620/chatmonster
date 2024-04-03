<?php
global $active_sidebar;
if ( ! $active_sidebar ) $active_sidebar = get_active_sidebar();
if ( $active_sidebar ) :
?>
		<aside class="p-sidebar l-secondary">
<?php
		dynamic_sidebar( $active_sidebar );
?>
		</aside>
<?php
endif;
