
   <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Create New Sponsor
                <small></small>
            </h3>
            <!-- END PAGE TITLE-->

            <hr>

                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('success'))
                            <div class="alert alert-success text-center" role="alert"><h4 class="text-center"><strong>Success..!</strong> {{ Session::get('success') }}</h4></div>
                            @endif
                            @if(count($errors) > 0)
                                <div class="alert alert-warning text-center" role="alert"><h4><strong>Error..!</strong> You have Something Error.</h4>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="text-center" style="list-style:none;">{!! $error !!}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">

                            <div class="portlet-body form">


                              

                                <div class="form-body">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><strong>Sponsor Name : </strong></label>
                                        <div class="col-md-8">
                                            <input class="form-control input-lg" name="name" placeholder="Sponsor Name" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><strong>Sponsor Email : </strong></label>
                                        <div class="col-md-8">
                                            <input class="form-control input-lg" name="email" placeholder="Sponsor Email" type="email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><strong>Sponsor Image : </strong></label>
                                        <div class="col-md-8">
                                            <input type="file" name="image" class="form-control" id="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><strong>Sponsor Address : </strong></label>
                                        <div class="col-md-8">
                                            <input class="form-control input-lg" name="address" placeholder="Sponsor Address" type="text">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-offset-4 col-md-4 text-center">
                                            <button type="submit" class="btn blue btn-block text-area">Save Sponsor </button>
                                        </div>
                                    </div>

                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div><!---ROW-->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
