@extends('layout.sidebar')
@section('content')
    <div id="page-wrapper" class="gray-bg">
        @include('partials.topbar')
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-12">
                    @include('partials.alerts')
                    <div class="panel panel-default">
                        <div class="panel-heading">Generate Reports</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3" style="height: 50px;">
                                        <a href="{{ url('report/sales') }}" class="btn btn-success btn-block"><i class="fa fa-bar-chart"></i> Sales Report</a>
                                    </div>
                                    <div class="col-md-3" style="height: 50px;">
                                        <a href="{{ url('report/expense') }}" class="btn btn-primary btn-block"><i class="fa fa-money"></i> Expense Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#reports').addClass('active');
    </script>
@endsection
