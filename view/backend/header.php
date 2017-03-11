<div class="page-container"> 
    <div class="main-content">
        <div class="row">
            <!-- Profile Info and Notifications -->
            <div class="col-md-6 col-sm-8 clearfix">
                <ul class="user-info pull-left pull-none-xsm">
                    <!-- Profile Info -->
                    <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
                        <img src="<?php echo get_logo_url(); ?>" style="max-height:60px; border: 0px; float:left;" />
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--                            <h2 style="float:left; font-weight:100;">--><?php //echo get_settings_info('system_name'); ?><!--</h2>-->
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Raw Links -->
            <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                <ul class="list-inline links-list pull-right">
                    <li>
                        <span class="label label-info">
                            <i class="entypo-user"></i> 
                            <?php echo $role;?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>

<br /> </div>
</div>