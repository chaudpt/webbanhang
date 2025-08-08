        <title><?php bloginfo( 'name' ); ?> &rsaquo; <?php _e( 'Uploads' ); ?> &#8212; <?php _e( 'WordPress' ); ?></title>
        <script type="text/javascript">
        	addLoadEvent = function(func){if(typeof jQuery!=='undefined')jQuery(function(){func();});else if(typeof wpOnload!=='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
        	var ajaxurl = '<?php echo esc_js( admin_url( 'admin-ajax.php', 'relative' ) ); ?>', pagenow = 'media-upload-popup', adminpage = 'media-upload-popup',
        	isRtl = <?php echo (int) is_rtl(); ?>;
        	</script>
	</head>
	<body<?php echo $body_id_attr; ?> class="wp-core-ui no-js">
    	<script type="text/javascript">
    	document.body.className = document.body.className.replace('no-js', 'js');
    	</script>
    	<script type="text/javascript">if(typeof wpOnload==='function')wpOnload();</script>
	</body>
</html>