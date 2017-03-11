@extends('layouts.layout')
@section('title', 'Sponsor View')
@section('style')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <script type="text/javascript">
        function confirmDelete()
        {
            return confirm("Are you sure Delete this Data..?")
        }

    </script>

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> All Sponsor Here <small></small></h3>
            <hr>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

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


                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <!--i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase">AAA</span-->
                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>

                                <tr>
                                    <th> ID# </th>
                                    <th> Sponsor Name </th>
                                    <th> Sponsor Email </th>
                                    <th> Sponsor Address </th>
                                    <th> Action </th>
                                </tr>

                                </thead>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($sponsor as $list)
                                    @php
                                        $i++;
                                    @endphp

                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$list->name}}</td>
                                        <td>{{$list->email}}</td>
                                        <td>{{$list->address}}</td>
                                        <td>

                                            <a href="{{ route('sponsor.edit', $list->id ) }}" class="btn green btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>

                                            {!! Form::open(['route'=>['sponsor.destroy',$list->id], 'method'=>'DELETE']) !!}

                                            {!! Form::submit('Delete',['class'=>'btn btn-info btn-xs pull-right','style'=>'margin-top:-22px', 'onclick'=>'return confirmDelete();']) !!}

                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->

                </div>
            </div><!-- ROW-->


        </div>
        <!-- END CONTENT BODY -->


    @endsection
    @section('script')
        <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
            <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->

            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->

@endsection