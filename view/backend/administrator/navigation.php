<nav class="navbar navbar-inverse" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
        <ul class="nav navbar-nav">
            <li class="<?php if($manager == 'dashboard') echo 'active'; ?>">
                <a href="<?php echo EVENTO_BASE_URL; ?>&manager=dashboard">
                    <i class="entypo-gauge"></i>
                    Dashboard
                </a>
            </li>
            
            <li class="<?php if($manager == 'registration-list') echo 'active'; ?> dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-group"></i>
                    Registration List <b class="caret"></b>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo EVENTO_BASE_URL; ?>&manager=student-list">
                            <i class="entypo-menu"></i>Student List
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo EVENTO_BASE_URL; ?>&manager=jobholder-list">
                            <i class="entypo-target"></i>
                            Job Holder List
                        </a>
                    </li>
                </ul>
            </li>

            <li class="<?php if($manager == 'invited-list') echo 'active'; ?> dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-group"></i>
                     Invited List <b class="caret"></b>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo EVENTO_BASE_URL; ?>&manager=student-invited">
                            <i class="entypo-menu"></i>Student Invited
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo EVENTO_BASE_URL; ?>&manager=jobholder-invited">
                            <i class="entypo-target"></i>
                            Job Holder Invited
                        </a>
                    </li>
                </ul>
            </li>
            
           


            
            <li class="<?php if($manager == 'manual-invite') echo 'active'; ?> dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="entypo-user"></i>
                    Manual Invite <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo EVENTO_BASE_URL; ?>&manager=invite-now">
                            <i class="entypo-menu"></i>Invite Now
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo EVENTO_BASE_URL; ?>&manager=list">
                            <i class="entypo-target"></i>
                            List
                        </a>
                    </li>
                </ul>
            </li>
            

            
            
            
            
            
            <li class="<?php if($manager == 'mail-setting') echo 'active'; ?>">
                <a href="<?php echo EVENTO_BASE_URL; ?>&manager=mail-setting">
                    <i class="entypo-credit-card"></i>
                    Mail Setting
                </a>
            </li>



            <li class="<?php if($manager == 'sms-setting') echo 'active'; ?>">
                <a href="<?php echo EVENTO_BASE_URL; ?>&manager=sms-setting">
                    <i class="entypo-credit-card"></i>
                    SMS Setting
                </a>
            </li>
            
            

            


            <li class="<?php if($manager == 'manage-sponsor') echo 'active'; ?> dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="entypo-tools"></i>
                    Manage Sponsor <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo EVENTO_BASE_URL; ?>&manager=manage-sponsor">
                            <i class="entypo-menu"></i>Manage Sponsor
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo EVENTO_BASE_URL; ?>&manager=create-sponsor">
                            <i class="entypo-target"></i>
                            Create Sponsor
                        </a>
                    </li>
                </ul>
            </li>

            
            
        </ul>
    </div>
</nav>