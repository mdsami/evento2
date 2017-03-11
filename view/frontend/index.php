<?php
// Flag variable for changing inner page content for various pages.
if (isset($_GET['manager'])) {
    $manager = $_GET['manager'];
} else {
    $manager = 'home';
}

// Define the front user panel base url
$permalink = get_permalink();
if (strpos(get_permalink(), '?') !== false) {
    define('EKATTOR_FRONT_URL', get_permalink() . '&');
} else {
    define('EKATTOR_FRONT_URL', get_permalink() . '?');
}
// All database table query functions written in this file.
include ( EKATTOR_DIR . '/model/function.php' );
include 'header.php';
?>


            <div class="main-content" style="margin-top:40px; min-height: 800px;">
                <div class="container">
                    <div class="row">
                        <?php
                        global $current_user, $wpdb;
                        $role = $wpdb->prefix . 'capabilities';
                        if (isset($current_user->$role)) {
                            $current_user->role = array_keys($current_user->$role);
                            $role = $current_user->role[0];

                            // includes the plugin page files from teacher/student/parent directory depending upon logged in user role
                            if ($role == 'teacher' || $role == 'student' || $role == 'parent') {
                                include $role . '/navigation.php';
                                include $role . '/' . $manager . '.php';
                            } else {
                                echo '<h4><center>Login as teacher, student or parent to use frontend user panel</h4>';
                            }
                        } else {
                            include 'login.php';
                        }
                        ?>


                        <?php //echo the_permalink();?>
                        <br />
                        <?php //echo site_url(); ?>
                    </div>
                </div>
            </div>
            <?php include 'modal.php'; ?>
            <!-- Bottom Scripts -->
           <?php include 'js.php'; ?>
        </div>
        <?php
        if (isset($_GET['notify'])) {

            $notify = $_GET['notify'];
            if ($notify == 'success') {
                $message = 'Data submission successfull';
            } else if ($notify == 'update') {
                $message = 'Data Updated';
            } else if ($notify == 'delete') {
                $message = 'Data Deleted';
            } else if ($notify == 'fail') {
                $message = 'Duplicate Username/Email';
            }
            ?>
            <script type="text/javascript">
                jQuery(document).ready(function ($)
                {
                    if ('<?php echo $notify; ?>' == 'fail' || '<?php echo $notify; ?>' == 'delete')
                        toastr.error("<?php echo $message; ?>");
                    else
                        toastr.success("<?php echo $message; ?>");
                    
                    
                });

            </script>

        <?php } ?>
        <script>
            
                
            $( document ).ready(function() {
                // convert datepicker
                $( ".datepicker" ).datepicker();
            });
            
        </script>
        <?php include 'footer.php';  ?>
        


