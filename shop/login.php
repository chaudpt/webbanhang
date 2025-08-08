<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	    <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	    <title><?php echo $login_title; ?></title>
	    <style type="text/css">html{background-color: transparent;}</style>
	</head>
	<body class="login no-js <?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	    <div id="login">
	        
		<h1 role="presentation" class="wp-login-logo"><a href="<?php echo esc_url( $login_header_url ); ?>"><?php echo $login_header_text; ?></a></h1>
		
		<script>
		try{document.getElementById('<?php echo $input_id; ?>').focus();}catch(e){}
		if(typeof wpOnload==='function')wpOnload();
		</script>
	</body>
</html>