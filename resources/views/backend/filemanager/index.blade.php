@extends('backend.layout.master')
@section('title','Quản lý tệp tin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
      Quản lý tệp tin
    </h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li class="active">Quản lí file</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="box box-primary">
                        <div class="box-body">

                    <iframe src="{{ route('unisharp.lfm.show') }}"
                        style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection
@push("script")


@endpush
