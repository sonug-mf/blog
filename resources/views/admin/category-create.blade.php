@extends('layout.adminpanel')

@section('css')
<!-- Bootstrap Core Css -->
<link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />

<!-- Wait Me Css -->
<link href="{{ asset('plugins/waitme/waitMe.css') }}" rel="stylesheet" />

<!-- Bootstrap Select Css -->
<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

<!-- Custom Css -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
@endsection


@section('main-section')
<div class="block-header">
    <h2>CATEGORY</h2>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Create Category</h2>
            </div>

            <div class="body">
                <form method="post" action="{{ Route('category.post') }}">
                    @csrf
                    @if($data->id !== 0)
                        @method('PUT')
                    @endif

                    <label for="category_name">Category Name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Enter Category Name" value="{{ $data->name }}" />
                        </div>

                        <span class="text text-danger">@error('category_name') {{ $message }} @enderror</span>
                    </div>
                    
                    <input type="hidden" name="record" value="{{ $data->id }}" />
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
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

<!-- Custom Js -->
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('js/pages/forms/basic-form-elements.js') }}"></script>

<!-- Demo Js -->
<script src="{{ asset('js/demo.js') }}"></script>
@endsection