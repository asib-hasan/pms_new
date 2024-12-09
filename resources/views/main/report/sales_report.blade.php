@extends('layout.sidebar')
@section('content')
    <div id="page-wrapper" class="gray-bg">
        @include('partials.topbar')
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-12">
                    @include('partials.alerts')
                    <div class="panel panel-default">
                        <div class="panel-heading">Generate Sales Reports</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="GET" action="{{ url('report/sales') }}">
                                        <div class="form-group" id="data_5">
                                            <label class="font-noraml">Choose Start & End Date</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="date" class="input-sm form-control" name="start_date" value="{{ $start_date }}" placeholder="Choose start date" required/>
                                                <span class="input-group-addon">to</span>
                                                <input type="date" class="input-sm form-control" name="end_date" value="{{ $end_date }}" placeholder="Choose end date" required/>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="btn_report"><i class="fa fa-check" aria-hidden="true"></i> Get Report</button>
                                    </form>
                                </div>
                                @if ($flag == 1)
                                <div class="col-md-3">
                                    <div class="widget style1 lazur-bg">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-bar-chart fa-4x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <span> Gross Sales </span>
                                                <h2 class="font-bold" style="font-size: 22px;">{{ $currency }}&nbsp;{{ $gross_amount }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="widget style1 navy-bg">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-credit-card fa-4x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <span> Total Sales Profit </span>
                                                <h2 class="font-bold" style="font-size: 22px;">{{ $currency }}&nbsp;{{ $gross_profit }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    @if($flag == 1)
                                    <div style="margin-top: 20px;border-bottom: 2px solid #eee;padding: 10px;margin-bottom: 20px">
                                        <h3 style="text-align: center;">Showing Sales Report from
                                            <b style="color: #18A689;">
                                                {{ $start_date }}
                                            </b>
                                            to
                                            <b style="color: #18A689;">
                                                   {{ $end_date }}
                                            </b>
                                        </h3>
                                        <center>
                                            <a href="{{ url('report/sales/print?start=' . $start_date . '&end=' .$end_date) }}" target="_blank" class="btn btn-primary" style=""><i class="fa fa-print"></i> Print Report</a>
                                        </center>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Serial No</th>
                                                <th>Item Name</th>
                                                <th data-hide="phone">Sell Quantity</th>
                                                <th data-hide="phone">Sell Price</th>
                                                <th data-hide="phone">Total Amount</th>
                                                <th data-hide="phone">Sell Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($order_list AS $order)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $order->order_details_item_name }}</td>
                                                <td>{{ $order->order_details_item_qty }}</td>
                                                <td>{{ $order->order_details_item_sell_price }} &nbsp;{{ $currency }}</td>
                                                <td>{{ ($order->order_details_item_sell_price * $order->order_details_item_qty) }}&nbsp;{{ $currency }}</td>
                                                <td>
                                                        <?php
                                                        $date = date_create($order->order_info_date);
                                                        echo date_format($date, "d-M-Y");
                                                        ?>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td style="text-align: left;" colspan="6">No records found</td>
                                            </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
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
