<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ settings('project_name') }} {{ trans('honeycombcoreui::core.administration') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @include('honeycombcoreui::admin.includes.rollbar')

    @include('honeycombcoreui::css.global')
    @include('honeycombcoreui::css.core');
</head>
<body class="skin-blue">
<div class="wrapper">

    <!-- if dev environment activate this div -->
    @if(app()->environment() == "local")
        <div class="devEnv">
            {!! trans('honeycombcoreui::core.dev_env') !!}
        </div>
    @endif


<!-- Header -->
    @include('honeycombcoreui::admin.partials.header')

<!-- Sidebar -->
    @include('honeycombcoreui::admin.partials.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('content-header')
                <small>@yield('content-description')</small>
            </h1>
            {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
            {{--<li class="active">Here</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->
            @yield('content')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('honeycombcoreui::admin.partials.footer')

<!-- The Right Sidebar -->
    @include('honeycombcoreui::admin.partials.right-sidebar')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- Octopus js files -->
@include('honeycombcoreui::js.global')
@include('honeycombcoreui::js.shared')
@include('honeycombcoreui::js.form')
@include('honeycombcoreui::js.list')

<script>
    HCService.FRONTENDLanguage = HCService.CONTENTLanguage = '{{ app()->getLocale() }}';
</script>

<script>
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<!-- Your Page Scripts Here -->
@yield('scripts')

@include('honeycombcoreui::admin.partials.sidebar-filter-js')
</body>
</html>