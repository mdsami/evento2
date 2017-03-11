<?php 

    // Flag variable for changing inner page content for various pages.
    if ( isset($_GET['manager']) ) {
        $manager = $_GET['manager'];
    }
    else {
        $manager = 'dashboard';
    }

    // Defining the current logged in user type.
    global $current_user, $wpdb;
    $role               = $wpdb->prefix . 'capabilities';
    $current_user->role = array_keys( $current_user->$role );
    $role               = $current_user->role[0];

    // All database table query functions written in this file.
    include ( EVENTO_DIR . '/model/function.php' );

    // Plugins header file 
    include ( EVENTO_DIR . '/view/backend/header.php' );

    // Plugins navigation menu file. Depends on logged in user role.
    include ( EVENTO_DIR . '/view/backend/' . $role . '/navigation.php' );
 
    // Plugins main body file. Depends on logged in user role.
    include ( EVENTO_DIR . '/view/backend/' . $role . '/' . $manager . '.php' );

    // Plugins footer file.
    include ( EVENTO_DIR . '/view/backend/footer.php' );
    
    // Modal popup file.
   // include ( EVENTO_DIR . '/view/backend/modal.php' );


    // Toastr notification for form submission result.
    if ( isset($_GET['notify']) ) {

        $notify     =   $_GET['notify'];
        if ( $notify == 'success' ) {
            $message = 'Data submission successfull';
        }
        else if ( $notify == 'update') {
            $message = 'Data Updated';
        }
        else if ( $notify == 'delete') {
            $message = 'Data Deleted';
        }
        else if ( $notify == 'fail') {
            $message = 'Duplicate Username/Email';
        }
        ?>
        
        <script type="text/javascript">
            jQuery(document).ready(function ($)
            {
                if ( '<?php echo $notify;?>' == 'fail' || '<?php echo $notify;?>' == 'delete' )
                    toastr.error("<?php echo $message;?>");
                else
                    toastr.success("<?php echo $message;?>");
            });
            
        </script>

        <?php
    }
?>
    

