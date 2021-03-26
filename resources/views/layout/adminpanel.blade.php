<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Panel | Laravel</title>
    
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    @yield('css')
</head>
<body class="theme-red">
    <!-- Page Loader -->
    @include('admin.common.pageloader')
    <!-- #END# Page Loader -->
    
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <!-- Search Bar -->
    @include('admin.common.searchbar')
    <!-- #END# Search Bar -->
    
    <!-- Top Bar -->
    @include('admin.common.top-navbar')
    <!-- #Top Bar -->
    
    <section>
        <!-- Left Sidebar -->
        @include('admin.common.leftsidebar')
        <!-- #END# Left Sidebar -->
        
        <!-- Right Sidebar -->
        @include('admin.common.rightsidebar')
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        @yield('main-section')
    </section>
    
    @yield('js')
</body>
</html>
