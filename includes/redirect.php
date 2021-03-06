<?php
// Redirection for Homepage and Archive Pages when Turned Off from options panel
function ampforwp_check_amp_page_status() {
  global $redux_builder_amp;

  if ( ampforwp_is_amp_endpoint() ) {
    if ( is_archive() && $redux_builder_amp['ampforwp-archive-support'] == 0 ) {
      global $wp;
      $redirection_location  =  add_query_arg( '', '', home_url( $wp->request ) );
      $redirection_location  =  trailingslashit($redirection_location );
      $redirection_location  =  dirname($redirection_location);
      wp_safe_redirect( $redirection_location );
      exit;
    }
  }
}
add_action( 'template_redirect', 'ampforwp_check_amp_page_status', 10 );


function ampforwp_page_template_redirect() {
  global $redux_builder_amp;

  if($redux_builder_amp['amp-mobile-redirection']){

    session_start();
    if( $_SESSION['ampforwp_amp_mode']=='mobile-on' && $_SESSION['ampforwp_mobile']=='exit'){
      return;
    }
    if( wp_is_mobile() && $_SESSION['ampforwp_amp_mode']=='mobile-on' && $_GET['nonamp']==1){
      // non mobile session variable creation
      session_start();
      $_SESSION['ampforwp_mobile']='exit';
      if ( ampforwp_is_amp_endpoint() ) {
        session_destroy();
      }
    }

	  if ( wp_is_mobile() ) {
			if ( ampforwp_is_amp_endpoint() ) {
				return;
			} else {
        if(is_page() && $redux_builder_amp['amp-on-off-for-all-pages'] == 0){return;}
        if( !isset($_SESSION['ampforwp_amp_mode']) || !isset($_GET['nonamp']) ) {
          $_SESSION['ampforwp_amp_mode']='mobile-on';
          if ( is_home() ) {
            if ( $redux_builder_amp['ampforwp-homepage-on-off-support'] == 1 ) {
              wp_redirect( trailingslashit( esc_url( home_url() ) ) . AMP_QUERY_VAR ,  301 );
              exit();
            }
  				}
          elseif ( is_archive() ) {
            if ( $redux_builder_amp['ampforwp-archive-support'] == 1 ) {
              global $wp;
              $current_archive_url = home_url( $wp->request );
              wp_redirect( trailingslashit( esc_url( $current_archive_url ) ) . AMP_QUERY_VAR , 301 );
              exit();
            }
  				} else {
            $ampforwp_amp_post_on_off_meta = get_post_meta( get_the_ID(),'ampforwp-amp-on-off',true);
            if( $ampforwp_amp_post_on_off_meta === 'hide-amp' ) {
              //dont Echo anything
            } else {
  					wp_redirect( trailingslashit( esc_url( ( get_permalink( $id ) ) ) ) . AMP_QUERY_VAR , 301 );
  					exit();
            }
  				}
			  }
      }
		}

	}
}
add_action( 'template_redirect', 'ampforwp_page_template_redirect', 30 );


add_action( 'template_redirect', 'ampforwp_page_template_redirect_archive', 10 );
function ampforwp_page_template_redirect_archive() {

	if ( is_404() ) {
		if( ampforwp_is_amp_endpoint() ) {
			global $wp;
			$ampforwp_404_url 	= add_query_arg( '', '', home_url( $wp->request ) );
			$ampforwp_404_url	= trailingslashit($ampforwp_404_url );
			$ampforwp_404_url = dirname($ampforwp_404_url);
			wp_redirect( esc_url( $ampforwp_404_url )  , 301 );
			exit();
		}
	}
}
