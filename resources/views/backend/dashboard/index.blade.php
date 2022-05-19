@extends("backend.layout.master")
@section('title','Bảng điều khiển')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="pjax-container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ __('dashboard.name') }}
                <small>AIB CMS V2.0</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ __('dashboard.name') }}</a>
                </li>
                {{-- <li class="active">Trang quản trị</li> --}}
            </ol>
        </section>
        <!-- Main content -->
        <section class="content container-fluid">
            @if (hasRole('dashboard_all'))
            @include('backend.dashboard.4-col-count')
            @include('backend.dashboard.chart-counter')
            @endif
            @include('backend.dashboard.analytics')


            <div class="box box-success" style="margin-bottom:0">
                <div class="box-body">
                    {{ $today = date('l, d/m/Y') }} <span class="clock"></span> {{ $today = date('A') }}
                </div>
            </div>
        </section>
    </div>
@endsection

