   <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Your Manual Mail
                <small></small>
            </h3>
            <!-- END PAGE TITLE-->

            <hr>

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

            <div class="row">
                <div class="col-md-12">





<div class="col-md-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-bookmark"></i>Short Code</div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> CODE </th>
                                                    <th> DESCRIPTION </th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <tr>
                                                    <td> 1 </td>
                                                    <td> <pre>{{ '&#123;&#123;' . 'tktnum'. '&#125;&#125;' }}</pre> </td>
                                                    <td> Dynamic Ticket Number,  Use in EMAIL text</td>
                                                </tr>
                                              
                                                <tr>
                                                    <td> 2 </td>
                                                    <td> <pre>{{ '&#123;&#123;' . 'name'. '&#125;&#125;' }}</pre> </td>
                                                    <td> Users Name. Will Pull From Database and Use in EMAIL text</td>
                                                </tr>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>






                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">


                            {{ Form::model($mail,array('route' => ['mail_update',$mail->id], 'class'=>'form-horizontal', 'role'=>'form', 'method'=>'PUT')) }}

                            <div class="form-body">

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><strong>Email</strong></label>
                                    <div class="col-md-8">
                                        <input class="form-control input-lg" name="email" placeholder="Email" value="{{ $mail->email }}" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><strong>Subject</strong></label>
                                    <div class="col-md-8">
                                        <input class="form-control input-lg" name="subject" placeholder="Mail Subject" value="{{ $mail->subject }}" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><strong>Mail Message</strong></label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" cols="3" rows="20" name="message">{{ $mail->message }}</textarea>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-offset-4 col-md-4 text-center">
                                        <button type="submit" class="btn blue btn-block btn-lg text-area">Update Mail </button>
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