<?php
    require_once __DIR__ . '/admin.php';
?>

        <title><?php echo esc_html( $admin_title ); ?></title>
        <script type="text/javascript">
        var ajaxurl = <?php echo wp_json_encode( admin_url( 'admin-ajax.php', 'relative' ) ); ?>,
        	pagenow = 'customize';
        </script>
    </head>
    <body class="<?php echo esc_attr( $body_class ); ?>">
        <div class="wp-full-overlay expanded">
        </div>
    </body>
</html>