@extends('layout.adminpanel')

@section('css')
<!-- Bootstrap Core Css -->
<link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="plugins/node-waves/waves.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="plugins/animate-css/animate.css" rel="stylesheet" />

<!-- Bootstrap Material Datetime Picker Css -->
<link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

<!-- Bootstrap DatePicker Css -->
<link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

<!-- Wait Me Css -->
<link href="plugins/waitme/waitMe.css" rel="stylesheet" />

<!-- Bootstrap Select Css -->
<link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<!-- Custom Css -->
<link href="css/style.css" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="css/themes/all-themes.css" rel="stylesheet" />
@endsection

@section('main-section')
<div class="container-fluid">
    <div class="block-header">
        <h2>Profile Updation</h2>
    </div>

    <!-- Input -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Basic Details
                        <small>Update Your Basic Details Here</small>
                    </h2>
                </div>

                <div class="body">
                    <div class="row clearfix">
                        <form action="Route('profile.update')" method="post" autocomplete="off">
                            @csrf

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="username">Name</label>
                                        <input type="text" class="form-control" name="username" placeholder="Enter Your Name" value="{{ $data->name }}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="email">Email Address</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter Your Email Address" value="{{ $data->email }}" disabled="true" readonly="true" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="type" value="basic" />
                                <button type="button" class="btn btn-warning pull-right">Update Detail</button>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Profile Picture
                        <small>Update Your Profile Picture Here</small>
                    </h2>
                </div>

                <div class="body">
                    <div class="row clearfix">
                        <form action="Route('profile.update')" method="post" entype="multipart/form-data">
                            @csrf

                            <div class="col-sm-12">
                                <div class="form-group">
                                    @if(strlen($data->profile_img) < 1)
                                        $image_file_path = $data->profile_img;
                                    @else
                                        $image_file_path = "/images/user.png";
                                    @endif
                                    
                                    
                                    <img src="{{ $image_file_path }}" class="img img-thumbnail" />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for='username'>Profile Image</label>
                                    <input type="file" name="image" />

                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="type" value="profile-pic" />
                                <button type="button" class="btn btn-warning pull-right">Update Image</button>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Change Password
                        <small>Change Your Profile Password Here</small>
                    </h2>
                </div>

                <div class="body">
                    <div class="row clearfix">
                        <form action="{{ Route('profile.update') }}" method="post">
                            @csrf
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control" placeholder="Enter Your Old Password" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control" placeholder="Enter New Password" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control" placeholder="Enter Confirm Password" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="type" value="password" />
                                <button type="button" class="btn btn-info pull-right">Change Password</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Bootstrap Date Picker -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DELETE ACCOUNT
                        <small>Permanently Delete Your Account</small>
                    </h2>    
                </div>

                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-12">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <div class="col-xs-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="delete" placeholder="Delete Permanently" />
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <button type="button" class="btn btn-danger pull-right">Delete Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Autosize Plugin Js -->
<script src="plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/forms/basic-form-elements.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>
@endsection