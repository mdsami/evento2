<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class=""></i>
                    Settings
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action" value="ekattor_form_submit">
                    <input type="hidden" name="task" value="edit_settings">
                
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">School Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="system_name" 
                                value="<?php echo get_settings_info('system_name'); ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Address</label>

                        <div class="col-sm-5">
                            <textarea class="form-control" 
                                name="address"><?php echo get_settings_info('address'); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="phone" 
                                value="<?php echo get_settings_info('phone'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-3 control-label">System Email</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" name="system_email" 
                                value="<?php echo get_settings_info('system_email'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
                            <button type="submit" class="btn btn-info" id="submit-button">Update</button>
                            <span id="preloader-form"></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>