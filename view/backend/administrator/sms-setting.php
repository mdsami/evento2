  <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Your Manual SMS
                <small></small>
            </h3>
            <!-- END PAGE TITLE-->

            <hr>
            {{--try {
            Cats::create($cat);
            session()->flash('message', 'Added Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
            } catch (\PDOException $e){
            session()->flash('message', 'Some Problem Occure, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
            }
if(){
            }

            <!--  ==================================SESSION MESSAGES==================================  -->
            @if (session()->has('message'))
                <div class="alert alert-{{ session()->get('type') }} alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('message') }}
                </div>
            @endif
        <!--  ==================================SESSION MESSAGES==================================  -->


            <!--  ==================================VALIDATION ERRORS==================================  -->
            @if($errors->any())
                @foreach ($errors->all() as $error)

                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $error }}
                    </div>

                @endforeach
            @endif
        <!--  ==================================SESSION MESSAGES==================================  -->

--}}



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
                                                    <td> <pre>{{ '&#123;&#123;' . 'text'. '&#125;&#125;' }}</pre> </td>
                                                    <td> THE SMS TEXT. What you set from here and will deliver through SMS API</td>
                                                </tr>
                                                <tr>
                                                    <td> 2 </td>
                                                    <td> <pre>{{ '&#123;&#123;' . 'number'. '&#125;&#125;' }}</pre> </td>
                                                    <td> THE SMS DESTINATION Number. Will Pull From Database  and will deliver through SMS API</td>
                                                </tr>
                                                <tr>
                                                    <td> 3 </td>
                                                    <td> <pre>{{ '&#123;&#123;' . 'name'. '&#125;&#125;' }}</pre> </td>
                                                    <td> Users Name. Will Pull From Database and Use in text</td>
                                                </tr>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>







                <div class="col-md-12">








                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">


                            {{ Form::model($sms,array('route' => ['sms_update',$sms->id], 'class'=>'form-horizontal', 'role'=>'form', 'method'=>'PUT')) }}

                            <div class="form-body">

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><strong>Api : </strong></label>
                                    <div class="col-md-8">
                                        <input class="form-control input-lg" name="api" placeholder="api" value="{{ $sms->api }}" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><strong>Text : </strong></label>
                                    <div class="col-md-8">
                                        <input class="form-control input-lg" name="text" placeholder="SMS Text" value="{{ $sms->text }}" type="text">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-offset-4 col-md-4 text-center">
                                        <button type="submit" class="btn blue btn-block btn-lg text-area">Update SMS </button>
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