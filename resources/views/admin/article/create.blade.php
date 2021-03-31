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
    
    <!-- Multi Select Css -->
    <link href="{{ asset('plugins/multi-select/css/multi-select.css') }}"     rel="stylesheet">
    
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}"     rel="stylesheet" />
    
    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all     themes -->
    <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
@endsection


@section('main-section')
<div class="block-header">
    <h2>Article</h2>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Create Article</h2>
            </div>

            <div class="body">
                <form method="post" action="{{ Route('article.post') }}/{{ $data->id !== 0 ? $data->id : '' }}" autocomplete="off">
                    @csrf
                    @if($data->id !== 0)
                        @method('PUT')
                    @endif

                    <label for="title">Title</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" value="{{ $data->title }}" />
                        </div>

                        <span class="text text-danger">@error('title') {{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">

                    </div>

                    <!-- TinyMCE -->
                    <div class="body">
                        <textarea id="tinymce" name="article_body">{{ $data->description }}</textarea>
                        <span class="text text-danger">@error('article_body') {{ $message }} @enderror</span>
                    </div>
                    <!-- #END# TinyMCE -->
                    
                    <div class="body">
                        <select id="optgroup" name="categories[]" class="ms" multiple="multiple">
                            <optgroup label="Categories">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ in_array($category->id, $selected) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
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

<!-- Multi Select Plugin Js -->
<script src="{{ asset('plugins/multi-select/js/jquery.multi-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

<!-- Autosize Plugin Js -->
<script src="{{ asset('plugins/autosize/autosize.js') }}"></script>

<!-- TinyMCE -->
<script src="{{ asset('plugins/tinymce/tinymce.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('js/admin.js') }}"></script>

<!-- Demo Js -->
<script src="{{ asset('js/demo.js') }}"></script>

<!-- Bootstrap Tags Input Plugin Js -->
<script src="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

<script>
    //Textarea auto growth
    autosize($('textarea.auto-growth'));

    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });

    tinymce.suffix = ".min";
    tinyMCE.baseURL = '../../plugins/tinymce';
    
    //Multi-select
    $('#optgroup').multiSelect({ selectableOptgroup: true });

</script>
@endsection