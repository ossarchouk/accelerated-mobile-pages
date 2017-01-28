<?php global $redux_builder_amp; 
add_image_size( 'amp_design3_thumb', 450, 270 );
add_action( 'amp_post_template_head', function() {
    remove_action( 'amp_post_template_head', 'amp_post_template_add_fonts' );
}, 9 );

add_action( 'amp_post_template_head', 'ampforwp_add_head' );
function ampforwp_add_head( $amp_template ) {
    ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|PT+Serif:400,700">
    <?php
}


add_action('amp_post_template_css', 'ampforwp_additional_style_input_2');

// 6. Add required Javascripts for Design 3
add_action('amp_post_template_head','ampforwp_register_additional_scripts_designthree', 20);
function ampforwp_register_additional_scripts_designthree() { ?>
<script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
<?php if( is_home() ) { ?><script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
<?php } }

// Search Form
function ampforwp_get_search_form() {
	$form = '<form role="search" method="get" id="searchform" class="searchform" target="_top" action="' .  trailingslashit( get_bloginfo('url') ) . '?' . AMP_QUERY_VAR . '">
                <div>
                    <label class="screen-reader-text" for="s">' . _x( 'Type your search query and hit enter:', 'label' ) . '</label>
                    <input type="text" placeholder="Type here" value="' . get_search_query() . '" name="s" id="s" />
                    <input type="submit" id="searchsubmit" value="'. esc_attr_x( 'Search', 'submit button' ) .'" />
                </div>
            </form>';
    return $form;        
}
function ampforwp_the_search_form() {
	echo ampforwp_get_search_form();
}
function advanced_search_query($query) {
	$ampforwp_is_amp_endpoint = ampforwp_is_amp_endpoint();
		if ( ! $ampforwp_is_amp_endpoint ) {
			return $query;
		}	 
		if($query->is_search() ) {
			$query->set( 'amp', '1' );
		}
}
function addfdsfsfbnsdfkhf() {
	add_action('pre_get_posts', 'advanced_search_query', 1000);
}
add_action('pre_amp_render_post','addfdsfsfbnsdfkhf');


function ampforwp_additional_style_input_2( $amp_template ) {
	global $redux_builder_amp;
	$get_customizer = new AMP_Post_Template( $post_id );
	// Get content width
	$content_max_width       = absint( $get_customizer->get( 'content_max_width' ) );
	// Get template colors
	$theme_color             = $get_customizer->get_customizer_setting( 'theme_color' );
	$text_color              = $get_customizer->get_customizer_setting( 'text_color' );
	$muted_text_color        = $get_customizer->get_customizer_setting( 'muted_text_color' );
	$border_color            = $get_customizer->get_customizer_setting( 'border_color' );
	$link_color              = $get_customizer->get_customizer_setting( 'link_color' );
	$header_background_color = $get_customizer->get_customizer_setting( 'header_background_color' );
	$header_color            = $get_customizer->get_customizer_setting( 'header_color' );
	?>

/* Global Styling */
body{
	background: #f1f1f1;
    font: 16px/1.4 Sans-serif;
}
a {
	color: #312C7E;
	text-decoration: none
}
.clearfix, .cb{
    clear: both
}

/* Template Styles */
.amp-wp-content, .amp-wp-title-bar div {
    <?php if ( $content_max_width > 0 ) : ?>
    max-width: <?php echo sprintf( '%dpx', $content_max_width ); ?>;
    margin: 0 auto;
    <?php endif; ?>
}

/* Slide Navigation code */
.nav_container{
    padding: 18px 15px;
    background: #312C7E;
    color: #fff;
    text-align: center
}
amp-sidebar {
  width: 250px;
}
.amp-sidebar-image {
  line-height: 100px;
  vertical-align:middle;
}
.amp-close-image {
   top: 15px;
   left: 225px;
   cursor: pointer;
}

.toggle-navigationv2 ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.toggle-navigationv2 ul ul li a  {
    padding-left: 35px;
    background: #fff;
    display: inline-block
}
.toggle-navigationv2 ul li a{
    padding: 15px 25px;
    width: 100%;
    display: inline-block;
    background: #fafafa;
    font-size: 14px;
    border-bottom: 1px solid #efefef;
}
.close-nav{
    font-size: 12px;
    background: rgba(0, 0, 0, 0.25);
    letter-spacing: 1px;
    display: inline-block;
    padding: 10px;
    border-radius: 100px;
    line-height: 8px;
    margin: 14px;
    left: 191px;
    color: #fff;
}
.close-nav:hover{
    background: rgba(0, 0, 0, 0.45);
}
.toggle-navigation ul{
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: inline-block;
    width: 100%
}
.menu-all-pages-container:after{
    content: "";
    clear: both
}
.toggle-navigation ul li{
    font-size: 13px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.11);
    padding: 11px 0px;
    width: 25%;
    float: left;
    text-align: center;
    margin-top: 6px
}
.toggle-navigation ul ul{
    display: none
}
.toggle-navigation ul li a{
    color: #eee;
    padding: 15px;
}
.toggle-navigation{
    display: none;
    background: #444;
}
.toggle-text{
    color: #fff;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 3px;
    display: inherit;
    text-align: center;
}
.toggle-text:before{
    content: "...";
    font-size: 32px;
    position: ;
    font-family: georgia;
    line-height: 0px;
    margin-left: 0px;
    letter-spacing: 1px;
    top: -3px;
    position: relative;
    padding-right: 10px;
}
.nav_container:hover + .toggle-navigation,
.toggle-navigation:hover,
.toggle-navigation:active,
.toggle-navigation:focus{
    display: inline-block;
    width: 100%;
}


/* Pagination */
.amp-wp-content.pagination-holder {
    background: none;
    padding: 0;
    box-shadow: none;
    height: auto;
    min-height: auto;
}
#pagination{
    width: 100%;
    margin-top: 20px;
}
#pagination .next, #pagination .prev{ margin: 0px 6% 10px 6%; }
#pagination .next a, #pagination .prev a{
    background: #26519e;
    width: 100%;
    color: #fff;
    display: inline-block;
    text-align: center;
    font-size: 15px;
    padding: 14px 0%;
    border-radius: 4px;
}
/* Sticky Social bar in Single */
.ampforwp-social-icons-wrapper{
    margin: 0.65em 0px 0.65em 0px;
    height: 28px;
}
.sticky_social{
    width: 100%;
    bottom: 0;
    display: block;
    left: 0;
    box-shadow: 0px 4px 7px #000;
    background: #fff;
    padding: 7px 0px 0px 0px;
    position: fixed;
    margin: 0;
    z-index: 10;
    text-align: center;
}
.whatsapp-share-icon {
    width: 50px;
    height: 20px;
    display: inline-block;
    background: #5cbe4a;
    padding: 4px 0px;
    position: relative;
    top: -4px;
}
/* Header */
#header{
    background: #26519e;
    text-align: center;
    height:50px
}
#header h1{
    text-align: center;
    font-size: 16px;
    left: -20px;
    position: relative;
    font-weight: bold;
    line-height: 53px;
    padding: 0;
    margin: 0;
    text-transform: uppercase;
}
 
main .amp-wp-content{

}
.home-post_image {
    float: left;
    width:33%;
    padding-right: 2%;
}
.amp-wp-title {
    margin-top: 0px;
}
h2.amp-wp-title {  
    font-family: 'Roboto Slab', serif;
    font-weight: 700;
    font-size: 20px;
    margin-bottom: 7px;
    line-height: 1.3;
}
h2.amp-wp-title a{ 
    color: #000; 
}
.amp-wp-tags{     list-style-type: none;
    padding: 0;
    margin: 0 0 9px 0;
    display: inline-flex; }
.amp-wp-tags li{ 
    display: inline;
    background: #d4d4d4;
    color: #fff;
    padding: 5px 10px;
    font-size: 12px;
    margin-right: 8px;
}
.amp-loop-list{     border-bottom: 1px solid #ededed;
    padding: 25px 15px 25px 15px }
.amp-loop-list .amp-wp-post-content{
    float: left;
    width: 65%;
}
.amp-loop-list .featured_time{
    color:#b3b3b3; 
    padding-left:0
}  
.amp-wp-post-content p{
    color: grey;
    line-height: 1.5;
    font-size: 14px;
    margin: 8px 0 10px;
    font-family:'PT Serif', serif
}
/* Footer */  
#footer{
    background: #151515;
    color: #eee;
    font-size: 13px;
    text-align: center;
    letter-spacing: 0.2px;
    padding: 35px 0 35px 0;
    margin-top: 30px;
}
#footer a{ color:#fff }
#footer p:first-child{
    margin-bottom: 12px;
}
#footer .social_icons{
    margin: 0px 20px 25px 20px;
    border-bottom: 1px solid #3c3c3c;
    padding-bottom: 25px;
}
#footer p{
    margin: 0
}
.rightslink{
    font-size:13px;
    color:#999
}
.poweredby{ padding-top:10px;
font-size:10px;  
} 
#footer .poweredby a{
color:#666 
}
.footer_menu ul{
    list-style-type: none;
    padding: 0;
    text-align: center;
    margin: 0px 20px 30px 20px;
    line-height: 27px;
    font-size: 13px
}
.footer_menu ul li{
    display:inline;
    margin:0 10px;
}
.footer_menu ul li:first-child{
    margin-left:0
}
.footer_menu ul li:last-child{
    margin-right:0
}
/* Single */
.comment-button-wrapper{
    margin-bottom: 40px;
    margin-top: 25px;
    text-align:center
}
.comment-button-wrapper a{
    color: #fff;
    background: #312c7e;
    font-size: 13px;
    padding: 10px 20px 10px 20px;
    box-shadow: 0 0px 3px rgba(0,0,0,.04);
    border-radius: 80px;
}
h1.amp-wp-title {
    text-align: center;
    margin: 0.7em 0px 0.6em 0px;
    font-size: 1.5em;
}
.amp-wp-content.post-title-meta,
.amp-wp-content.post-pagination-meta {
    background: none;
    padding:  0;
    box-shadow:none
}
.post-pagination-meta{
    min-height:75px
}
.single-post .post-pagination-meta{
    min-height:auto
}
.single-post .ampforwp-social-icons{
    display:inline-block
}
.post-pagination-meta .amp-wp-tax-category,
.post-title-meta .amp-wp-tax-tag {
    display : none;
}
.amp-meta-wrapper{
	border-bottom: 1px solid #DADADA;
    padding-bottom:10px;
    display:inline-block;
    width:100%;
    margin-bottom:0
}
.amp-wp-meta  {
    padding-left: 0;
}
.amp-wp-tax-category {
    float:right
}
.amp-wp-tax-tag,
.amp-wp-meta li {
    list-style: none;
    display: inline-block;
}
li.amp-wp-tax-category {
    float: right
}
.amp-wp-byline, .amp-wp-posted-on {
    float: left
}

.amp-wp-content amp-img {
    max-width: 100%;
}
figure{
    margin: 0;
}
figcaption{
    font-size: 11px;
    margin-bottom: 11px;
    background: #eee;
    padding: 6px 8px;
}
.amp-wp-byline amp-img {
    display: none;
}
.amp-wp-author:before {
    content: "By ";
    color: #555;
}
.amp-wp-author{
    margin-right: 1px;
}
.amp-wp-meta {
    font-size: 12px;
    color: #555;
}
.amp-ad-wrapper {
    text-align: center
}
.single-post main{
    padding:12px 15% 10px 15%
}
.the_content p{
    margin-top: 5px;
    color: #333;
    font-size: 15px;
    line-height: 26px;
    margin-bottom: 15px;
}
.amp-wp-tax-tag{
    font-size: 13px;
    border: 0;
    display: inline-block;
    margin: 0.5em 0px 0.7em 0px;
    width: 100%;
}
main .amp-wp-content.featured-image-content {
	padding: 0px;
	border: 0;
	margin-bottom: 0;
	box-shadow: none
}
.amp-wp-content.post-pagination-meta{
    max-width: 1030px;
}
.single-post .ampforwp-social-icons.ampforwp-social-icons-wrapper {
    display: block;
    margin: 2em auto 0.9em auto ;
    max-width: 1030px;
}
.amp-wp-article-header.amp-wp-article-category.ampforwp-meta-taxonomy {
    margin: 10px auto;
    max-width: 1030px;
}
/* Related Posts */
main .amp-wp-content.relatedpost {
	background: none;
	box-shadow: none;
	max-width: 1030px;
    padding:0px 0 0 0;
    margin:1.8em auto 1.5em auto
}
.related_posts h3, .comments_list h3{
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 0.4px;
    margin: 15px 0 10px 0;
    color: #333;
}
.related_posts ol{
    list-style-type:none;
    margin:0;
    padding:0
}
.related_posts ol li{
    display:inline-block;
    width:100%;
    margin-bottom: 12px;
    background: #fefefe;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0 2px 3px rgba(0,0,0,.05);
    -webkit-box-shadow: 0 2px 3px rgba(0,0,0,.05);
    box-shadow: 0 2px 3px rgba(0,0,0,.05);
    padding: 0px;
}
.related_posts .related_link{
    margin-top:18px;
    margin-bottom:10px;
    margin-right:10px
}
.related_posts .related_link a{
    font-weight: 300;
    color: #000;
    font-size: 18px;
}
.related_posts ol li amp-img{
    width:100px;
    float:left;
    margin-right:15px
}
.related_posts ol li p{
    font-size: 12px;
    color: #999;
    line-height: 1.2;
    margin: 12px 0 0 0;
}
.no_related_thumbnail{
    padding: 15px 18px;
}
.no_related_thumbnail .related_link{
    margin: 16px 18px 20px 19px;
}
/* Comments */
.ampforwp-comment-wrapper{
    margin:1.8em 0px 1.5em 0px
}
main .amp-wp-content.comments_list {
	background: none;
	box-shadow: none;
	max-width: 1030px;
	padding:0
}
.comments_list div{
    display:inline-block;
}
.comments_list ul{
    margin:0;
    padding:0
}
.comments_list ul.children{
    padding-bottom:10px;    
    margin-left: 4%;
    width: 96%;
}
.comments_list ul li p{
    margin:0;
    font-size:15px;
    clear:both;
    padding-top:16px;
}
.comments_list ul li{
    font-size:13px;
    list-style-type:none;
    margin-bottom: 12px;
    background: #fefefe;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0 2px 3px rgba(0,0,0,.05);
    -webkit-box-shadow: 0 2px 3px rgba(0,0,0,.05);
    box-shadow: 0 2px 3px rgba(0,0,0,.05);
    padding: 0px;
    max-width: 1000px;
    width:96%;
}
.comments_list ul li .comment-body{
    padding: 25px;
    width: 91%;
}
.comments_list ul li .comment-body .comment-author{
    margin-right:5px
}
.comment-author{ float:left }
.single-post footer.comment-meta{
    /* float:right */
		padding-bottom: 0;
}
.comments_list li li{
    margin: 20px 20px 10px 20px;
    background: #f7f7f7;
    box-shadow: none;
    border: 1px solid #eee;
}
.comments_list li li li{
    margin:20px 20px 10px 20px
}
/* ADS */
.amp_home_body .amp_ad_1{
    margin-top: 10px;
    margin-bottom: -20px;
}
.single-post .amp_ad_1{
    margin-top: 10px;
    margin-bottom: -20px;
}
html .single-post .ampforwp-incontent-ad-1 {
    margin-bottom: 10px;
}
.amp-ad-4{
    margin-top:10px;
}
/* Notifications */
#amp-user-notification1 p {
    display: inline-block;
}
amp-user-notification {
    padding: 5px;
    text-align: center;
    background: #fff;
    border-top: 1px solid;
}
amp-user-notification button {
    padding: 8px 10px;
    background: #000;
    color: #fff;
    margin-left: 5px;
		border: 0;
}
amp-user-notification button:hover {
	cursor: pointer
}
.amp-wp-content blockquote {
    background-color: #fff;
    border-left: 3px solid;
    margin: 0;
    padding: 15px 20px 8px 24px;
    background: #f3f3f3;
}
pre {
	white-space: pre-wrap;
}
/* Responsive */
    @media screen and (max-width: 800px) {
        .single-post main{
            padding: 12px 10px 10px 10px
        }
    }
@media screen and (max-width: 630px) {
		.related_posts ol li p{
			display:none
		}
    .related_link {
        margin: 16px 18px 20px 19px;
    }
}
@media screen and (max-width: 510px) {
				.ampforwp-tax-category span{
					display:none
				}
	    .related_posts ol li p{
        line-height: 1.6;
        margin: 7px 0 0 0;
    }
    .related_posts .related_link {
        margin: 17px 18px 17px 19px;
    }
    .comments_list ul li .comment-body{
        width:auto
    }
}
@media screen and (max-width: 425px) {
    .related_posts .related_link p{
        display:none
    }
    .related_posts .related_link {
        margin: 13px 18px 14px 19px;
    }
    .related_posts .related_link a{
        font-size: 18px;
        line-height: 1.7;
    }
		.amp-meta-wrapper{
			display: inline-block;
	    margin-bottom: 0px;
	    margin-top: 8px;
			width:100%
		}
		.ampforwp-tax-category{
			padding-bottom:0
		}
		h1.amp-wp-title{
			margin: 16px 0px 13px 0px;
		}
		.amp-wp-byline{
			padding:0
		}
		.amp-meta-wrapper .amp-wp-meta-date{
			display:none
		}
		.related_posts .related_link a {
    	font-size: 17px;
    	line-height: 1.5;
		}
}
@media screen and (max-width: 375px) {
	#pagination .next a, #pagination .prev a{
		padding: 10px 6px;
		font-size: 11px;
		color: #666;
	}
	.related_posts h3, .comments_list h3{
		margin-top:15px;
	}
	#pagination .next{
		margin-bottom:15px;
	}
	.related_posts .related_link a {
		font-size: 15px;
    line-height: 1.6;
	}
}
@media screen and (max-width: 340px) {
	.related_posts .related_link a {
			font-size: 15px;
	}
		.single-post main{
				padding: 10px 5px 10px 5px
		}
		.the_content .amp-ad-wrapper{
				text-align: center;
				margin-left: -13px;
		}
}
@media screen and (max-width: 320px) {
	.related_posts .related_link a {
    font-size: 13px;
	}
	h1.amp-wp-title{
		font-size:17px;
		padding:0px 4px
	}
}
@media screen and (max-width: 400px) {
    .amp-wp-title{
        font-size: 19px;
        margin: 21px 10px -1px 10px;
    }
}
    @media screen and (max-width: 768px) {
 
        .toggle-navigation ul li{
            width: 50%
        }
        }

<?php if($redux_builder_amp['amp-rtl-select-option'] == true) { ?>
/* RTL Start */
.nav_container, .toggle-navigationv2, .amp-loop-list, #pagination, #footer, .amp-wp-meta, .amp-wp-title, .single-post .the_content, .amp-wp-tax-tag, .sticky_social{
    direction:rtl
}
main .amp-loop-list {
    padding-right:20px
}
.amp-loop-list .home-post_image{
    float:left;
    margin-left:0;
    margin-right:15px;
}
#pagination{
	display:inline-block
}
.amp-wp-tax-tag{
    float:right
}
.toggle-text:before{
    padding-left:5px;
}
/* RTL End */
<?php } ?>

/* Style Modifer */
<?php $color =  $redux_builder_amp['opt-color-rgba']['color']; ?>
a,
.amp-wp-author {
    color: <?php echo sanitize_hex_color( $header_background_color ); ?>;;
}
.amp-wp-content blockquote{
	border-color:<?php echo sanitize_hex_color( $header_background_color ); ?>;;
}
.nav_container, .comment-button-wrapper a {
    background:  <?php echo sanitize_hex_color( $header_background_color ); ?>;;
}
.nav_container a{
    color:<?php echo sanitize_hex_color( $header_color ); ?>
}
amp-user-notification  {
	border-color:  <?php echo sanitize_hex_color( $header_background_color ); ?>;;
}
amp-user-notification button {
	background-color:  <?php echo sanitize_hex_color( $header_background_color ); ?>;;
}
<?php if( $redux_builder_amp['enable-single-social-icons'] == true )  { ?>
    .single-post footer {
        padding-bottom: 60px;
    }
.amp-ad-2{ margin-bottom: 50px; }
<?php } ?>
/**/
.alignleft{
	margin-right: 12px;
	margin-bottom:5px;
	float: left;
}
.alignright{
	float:right;
	margin-left: 12px;
	margin-bottom:5px;
}
.aligncenter{
	text-align:center;
	margin: 0 auto
}
.amp-wp-author:before{
	content: " <?php global $redux_builder_amp; echo $redux_builder_amp['amp-translator-by-text']; ?>  ";
}
.ampforwp-tax-category span:first-child:after {
    content: ' ';
}
.ampforwp-tax-category span:after,
.ampforwp-tax-tag span:after {
	content: ', ';
}
.ampforwp-tax-category span:last-child:after,
.ampforwp-tax-tag span:last-child:after  {
	content: ' ';
}
    /* New V0.8.7(drag and drop) style */
	.amp-wp-article-content img {
	    max-width: 100%;
	}






#designthree{
    background-color: #FFF;
    overflow: visible;
/*    animation: closing .3s normal forwards ease-in-out,closingFix .6s normal forwards ease-in-out;
    -webkit-transform-origin: right center;
    transform-origin: right center;*/
}
/* Sidebar */
#sidebar[aria-hidden="false"]+#designthree {
    max-height: 100vh;
    overflow: hidden;
    animation: opening .3s normal forwards ease-in-out;
    -webkit-transform: translate3d(60%, 0, 0) scale(0.8);
    transform: translate3d(60%, 0, 0) scale(0.8);
}
@keyframes opening {
    0% {
        transform: translate3d(0, 0, 0) scale(1);
    }
    100% {
        transform: translate3d(60%, 0, 0) scale(0.8);
    }
}

@keyframes closing {
    0% {
        transform: translate3d(60%, 0, 0) scale(0.8);
    }
    100% {
        transform: translate3d(0, 0, 0) scale(1);
    }
}

@keyframes closingFix {
    0% {
        max-height: 100vh;
        overflow: hidden;
    }
    100% {
        max-height: none;
        overflow: visible;
    }
}

.hamburgermenu{
    float:left;
    position:relative;
    z-index: 9999;
}
.searchmenu{
    margin-right: 15px;
    margin-top: 11px;
    position: absolute;
    top: 0;
    right: 0;
}
.searchmenu button{
    background:transparent;
    border:none
}
.headerlogo{
    text-align:center
}
.headerlogo a{
    color:#fff;
    opacity:0.9
}
/*Navigation Menu*/
.toast {
    display: block;
    position: relative;
    height: 50px;
    padding-left: 20px;
    padding-right: 15px;
    width: 49px;
    background:none;
    border:0
}

.toast:after,
.toast:before,
.toast span {
    position: absolute;
    display: block;
    width: 19px;
    height: 2px;
    border-radius: 2px;
    background-color: #fff;
    -webkit-transform: translate3d(0, 0, 0) rotate(0deg);
    transform: translate3d(0, 0, 0) rotate(0deg);
}

.toast:after,
.toast:before {
    content: '';
    left: 20px;
    -webkit-transition: all ease-in .4s;
    transition: all ease-in .4s;
}

.toast span {
    opacity: 1;
    top: 24px;
    -webkit-transition: all ease-in-out .4s;
    transition: all ease-in-out .4s;
}

.toast:before {
    top: 17px;
}

.toast:after {
    top: 31px;
}

#sidebar[aria-hidden="false"]+#designthree .toast span {
    opacity: 0;
    -webkit-transform: translate3d(200%, 0, 0);
    transform: translate3d(200%, 0, 0);
}

#sidebar[aria-hidden="false"]+#designthree .toast:before {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate(43deg);
    transform: rotate(43deg);
}

#sidebar[aria-hidden="false"]+#designthree .toast:after {
    -webkit-transform-origin: left top;
    transform-origin: left top;
    -webkit-transform: rotate(-43deg);
    transform: rotate(-43deg);
}

/* search icon */
[class*=icono-] {
    display: inline-block;
    vertical-align: middle;
    position: relative;
    font-style: normal;
    color: rgba(255, 255, 255, 0.75);
    text-align: left;
    text-indent: -9999px;
    direction: ltr
}
[class*=icono-]:after, [class*=icono-]:before {
    content: '';
    pointer-events: none;
}
.icono-search
{   
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%)
} 
.icono-search {
    border: 1px solid;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    margin: 4px 4px 8px 8px;
}
.icono-search:before{
    position: absolute;
    left: 50%;
    -webkit-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
     transform: rotate(270deg); 
    width: 2px;
    height: 9px;
    box-shadow: inset 0 0 0 32px;
    top: 0px;
    border-radius: 0 0 1px 1px;
    left: 14px;
}
.closebutton{
    background: transparent;
    border: 0;
    color: rgba(255, 255, 255, 0.7);
    border: 1px solid rgba(255, 255, 255, 0.7);
    border-radius: 30px;
    width: 32px;
    height: 32px;
    font-size: 12px;
    text-align: center;
    position: absolute;
    top: 12px;
    right: 20px;
    outline:none
}
amp-lightbox{
    background: rgba(0, 0, 0,0.85);
}
.searchform label{
    color: #f7f7f7;
    display: block;
    font-size: 10px;
    letter-spacing: 0.3px;
    line-height: 0;
    opacity:0.6
}
.searchform{
    background: transparent;
    left: 20%;
    position: absolute;
    top: 35%;
    width: 60%;
    max-width: 100%;
    transition-delay: 0.5s;
}
.searchform input{
    background: transparent;
    border: 1px solid #666;
    color: #f7f7f7;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    letter-spacing: 0.3px;
    text-transform: capitalize;
    padding: 20px 0px 20px 30px;
    margin-top: 15px;
    width: 100%;
}
#searchsubmit{display:none}

/* AMP carousel */
.amp-carousel-button-prev, 
.amp-carousel-button-next{
    top:30px;border-radius:60px;
}
.amp-featured-wrapper{
    background:#333
}
.amp-featured-area{
    margin: 0 auto;
    max-width: 450px;
    max-height: 270px;
}
.amp-carousel-slide h1 {
    font-size: 30px;
    font-family: 'PT Serif', serif;
    margin: 0;
    font-weight: normal;
    line-height: 38px;
    color: #fff;
    padding: 10px 20px 20px 20px;
}
.amp-carousel-slide amp-img:before{
    z-index:100;
    bottom: 0;
    content: "";
    display: block;
    height: 100%;
    position: absolute;
    width: 100%;
    background: -webkit-gradient(linear, 50% 0%, 50% 75%, color-stop(0%, rgba(0,0,0,0)), color-stop(150%, #000000)) repeat scroll 0 0 rgba(0,0,0,0.2);
    background: -webkit-linear-gradient(rgba(0,0,0,0),#000000 75%) repeat scroll 0 0 rgba(0,0,0,0);
    background: -moz-linear-gradient(rgba(0,0,0,0),#000000 75%) repeat scroll 0 0 rgba(0,0,0,0);
    background: -o-linear-gradient(rgba(0,0,0,0),#000000 75%) repeat scroll 0 0 rgba(0,0,0,0);
    background: linear-gradient(rgba(0,0,0,0),#000000 75%) repeat scroll 0 0 rgba(0,0,0,0);
}
.featured_title{
    position:absolute;
    z-index:110;
    bottom:0
}
.featured_time{
    font-size: 12px;
    color: #fff;
    opacity: 0.8;
    padding-left: 20px;
}
.featured_meta{
    color:#acacac;
    font-size:12px;
    margin:0 15px;
}
.featured_meta_left{
    float:left
}
.featured_meta_right{
    float:right
}

/* Social icons */
@font-face {
  font-family: 'icomoon';
  src:  url('<?php echo plugin_dir_url(__FILE__) ?>fonts/icomoon.eot?b9qrme');
  src:  url('<?php echo plugin_dir_url(__FILE__) ?>fonts/icomoon.eot?b9qrme#iefix') format('embedded-opentype'),
    url('<?php echo plugin_dir_url(__FILE__) ?>fonts/icomoon.ttf?b9qrme') format('truetype'),
    url('<?php echo plugin_dir_url(__FILE__) ?>fonts/icomoon.woff?b9qrme') format('woff'),
    url('<?php echo plugin_dir_url(__FILE__) ?>fonts/icomoon.svg?b9qrme#icomoon') format('svg');
  font-weight: normal;
  font-style: normal; 
}

[class^="icon-"], [class*=" icon-"] {
  /* use !important to prevent issues with browser extensions that change fonts */
  font-family: 'icomoon' !important;
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;

  /* Better Font Rendering =========== */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.icon-twitter:before {
  content: "\f099";background:#1da1f2
}
.icon-facebook:before {
  content: "\f09a";background:#3b5998
}
.icon-facebook-f:before {
  content: "\f09a";background:#3b5998
}
.icon-pinterest:before {
  content: "\f0d2";background:#bd081c
}
.icon-google-plus:before {
  content: "\f0d5";background:#dd4b39
}
.icon-linkedin:before {
  content: "\f0e1";background:#0077b5
}
.icon-youtube-play:before {
  content: "\f16a";background:#cd201f
}
.icon-instagram:before {
  content: "\f16d";background:#c13584
}
.icon-tumblr:before {
  content: "\f173";background:#35465c
}
.icon-vk:before {
  content: "\f189";background:#45668e
}
.icon-whatsapp:before {
  content: "\f232";background:#075e54
}
.icon-reddit-alien:before {
  content: "\f281";background:#ff4500
}
.icon-snapchat-ghost:before {
  content: "\f2ac"; background:#fffc00
}
.social_icons{
    font-size: 15px;
    display: inline-block;
}
.social_icons ul{
    list-style-type:none;
    padding:0;margin:0;
    text-align:center
}
.social_icons li{
    display:inline-block;
    margin:5px;
}
.social_icons li:before{
    padding: 10px;
    display: inline-block;
    border-radius: 70px;
    width: 18px;
    height: 18px;
    line-height: 20px;
    text-align: center;
}
/* Custom Style Code */
	<?php echo $redux_builder_amp['css_editor'];
} ?>