@extends('layout.adminpanel')

@section('css')
<!-- Bootstrap Core Css -->
<link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />

<!-- JQuery DataTable Css -->
<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

<!-- Wait Me Css -->
<link href="{{ asset('plugins/waitme/waitMe.css') }}" rel="stylesheet" />

<!-- Custom Css -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
@endsection

@section('main-section')

    @if(session('message'))
        <div class="alert alert-{{ session('type') }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ session('message') }}
        </div>
    @endif

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Category List</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($data as $key => $record)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $record->name }}</td>
                                <td>{{ $record->updated_at }}</td>
                                <td>
                                    <a href="{{ Route('category.create', $record->id) }}"><i class="material-icons" role="button" data-toggle="tooltip" data-placement="top" title="Edit Record">edit</i></a> <i class="material-icons">more_vert</i> <a href="{{ Route('category.delete', $record->id) }}"><i class="material-icons" role="button" data-toggle="tooltip" data-placement="top" title="Delete Record">delete</i></a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Jquery Core Js -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

<!-- Autosize Plugin Js -->
<script src="{{ asset('plugins/autosize/autosize.js') }}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('js/pages/ui/tooltips-popovers.js') }}"></script>

<!-- Demo Js -->
<script src="{{ asset('js/demo.js') }}"></script>
@endsection