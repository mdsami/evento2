<?php 

    
    // Create file upload directories.
    $upload_dir = wp_upload_dir();
    $path[0]    = $upload_dir['basedir'] . '/evento/';
    $path[1]    = $upload_dir['basedir'] . '/evento/document/';
    $path[2]    = $upload_dir['basedir'] . '/evento/image/';
    $path[3]    = $upload_dir['basedir'] . '/evento/image2/';
    
    // giving the directory write permission.
    foreach ($path as $dir) {
        if ( !is_dir($dir) ) {
            wp_mkdir_p($dir, 0777);
        }
    }
	
    // defining the database table name
    global $wpdb;
    $manual_invitations      = $wpdb->prefix . 'manual_invitations';
    $registration_datas      = $wpdb->prefix . 'registration_datas';
    $mails                   = $wpdb->prefix . 'mails';
    $sms                     = $wpdb->prefix . 'sms';
    $sponsors                = $wpdb->prefix . 'sponsors';
   

    
    // sql queries for database table creation during plugin activation.

    $sql1   =   "CREATE TABLE IF NOT EXISTS $manual_invitations (
                      `id` int(10) unsigned NOT NULL,
                      `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
                      `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                      `message` blob NOT NULL,
                      `created_at` timestamp NULL DEFAULT NULL,
                      `updated_at` timestamp NULL DEFAULT NULL,
                        PRIMARY KEY (`id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    
   
    $sql2   =  "CREATE TABLE IF NOT EXISTS $registration_datas (
                  `id` int(10) unsigned NOT NULL,
                  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `email2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                  `mobile` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
                  `mobile2` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
                  `age` int(11) NOT NULL,
                  `sex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `org` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `dept` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `address` text COLLATE utf8_unicode_ci NOT NULL,
                  `type` tinyint(4) NOT NULL,
                  `invite` tinyint(4) NOT NULL,
                  `seat_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `created_at` timestamp NULL DEFAULT NULL,
                  `updated_at` timestamp NULL DEFAULT NULL,
                   PRIMARY KEY (`id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

    
    $sql3   =   "CREATE TABLE IF NOT EXISTS $mails (
                  `id` int(10) unsigned NOT NULL,
                  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `message` blob NOT NULL,
                  `created_at` timestamp NULL DEFAULT NULL,
                  `updated_at` timestamp NULL DEFAULT NULL,
                   PRIMARY KEY (`id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    
    $sql4   =   "CREATE TABLE IF NOT EXISTS $sms (
                      `id` int(10) unsigned NOT NULL,
                      `api` text COLLATE utf8_unicode_ci NOT NULL,
                      `text` text COLLATE utf8_unicode_ci NOT NULL,
                      `created_at` timestamp NULL DEFAULT NULL,
                      `updated_at` timestamp NULL DEFAULT NULL,
                       PRIMARY KEY (`id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
                        
    $sql5   =   "CREATE TABLE IF NOT EXISTS $sponsors (
                  `id` int(10) unsigned NOT NULL,
                  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                  `created_at` timestamp NULL DEFAULT NULL,
                  `updated_at` timestamp NULL DEFAULT NULL,
                   PRIMARY KEY (`id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";





    
  

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    // running the database table creation queries.
    dbDelta($sql1);
    dbDelta($sql2);
    dbDelta($sql3);
    dbDelta($sql4);
    dbDelta($sql5);


    // adding initial data for settings table.
    $wpdb->get_results( "SELECT * FROM $mails" );
    if ( $wpdb->num_rows == 0 ) {
        $wpdb->insert( $mails, array( 'type' => 'id'      ,'description' => '1') );
        $wpdb->insert( $mails, array( 'type' => 'name'     ,'description' => 'Ekattor School Manager') );
        $wpdb->insert( $mails, array( 'type' => 'email'      ,'description' => 'admin@rexbd.net') );
        $wpdb->insert( $mails, array( 'type' => 'message'      ,'description' => 'We are happy to know that you are interested about the "Seminar On Career In IT" event. ') );
        $wpdb->insert( $mails, array( 'type' => 'created_at'      ,'description' => '2016-12-27 11:40:53') );
        $wpdb->insert( $mails, array( 'type' => 'updated_at'      ,'description' => ' 2017-01-03 01:48:53') );
    }    
?>