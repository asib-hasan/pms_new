@extends('layout.sidebar')
@section('content')
    <div id="page-wrapper" class="gray-bg">
        @include('partials.topbar')
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-12">
                    @include('partials.alerts')
                    <div class="panel panel-default">
                        <div class="panel-heading">Expense Information  <a href="javascript:void(0)" data-toggle="modal" data-target="#add_category" class="btn btn-primary btn-xs btn-rounded"><i class="fa fa-plus-circle"></i> Add New</a>&nbsp;<a href="javascript:void(0)" data-toggle="modal" data-target="#search" style="background: black;border: 1px solid black" class="btn btn-success btn-xs btn-rounded"><i class="fa fa-search"></i> Advance Search</a></div>
                        <div id="search" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content" style="border: 0px">
                                    <form method="GET" action="{{ url('expense') }}">
                                        @csrf
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Advance Search For Expense <button type="button" class="close" data-dismiss="modal" style="color: #C33712;opacity: 1;">&times;</button></div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Search Keyword<b class="required_mark">*</b></label>
                                                            <input type="text" class="form-control" name="sk" placeholder="Enter category name or type any word" required />
                                                        </div>
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Expense</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($expense_list as $expense)
                                            <tr>
                                                <td>{{ $expense->expense_criteria }}</td>
                                                <td>{{ $expense->expense_amount }}</td>
                                                <td>{{ $expense->expense_date }}</td>
                                                <td>
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#edit_{{ $expense->expense_id }}"><i class="fa fa-pencil"></i> Edit</a>
                                                    <div id="edit_{{ $expense->expense_id }}" class="modal fade" role="dialog">
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content" style="border: 0px;">
                                                                <form method="POST" action="{{ url('expense/update') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="expense_id" value="{{ $expense->expense_id }}" />
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading">Update Expense <button type="button" class="close" data-dismiss="modal" style="color: #C33712;opacity: 1;">&times;</button></div>
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="item_category_name">Expense Criteria<b class="required_mark">*</b></label>
                                                                                        <input type="text" class="form-control" name="expense_criteria" value="{{ $expense->expense_criteria }}" placeholder="Enter name" required />
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="item_category_name">Amount<b class="required_mark">*</b></label>
                                                                                        <input type="text" class="form-control" name="expense_amount" value="{{ $expense->expense_amount}}" placeholder="Enter name" required />
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="item_category_name">Expense Date<b class="required_mark">*</b></label>
                                                                                        <input type="text" class="form-control" name="expense_date" value="{{ $expense->expense_date }}" placeholder="Enter name" required />
                                                                                    </div>
                                                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4">No records found</td>
                                            </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    <div>
                                        {{ $expense_list->links() }}
                                    </div>

                                    <div id="add_category" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content" style="border: 0px">
                                                <form method="POST" action="{{ url('expense/store') }}">
                                                    @csrf
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">Add New Expense Information <button type="button" class="close" data-dismiss="modal" style="color: #C33712;opacity: 1;">&times;</button></div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="item_category_name">Expense Criteria<b class="required_mark">*</b></label>
                                                                        <input type="text" class="form-control" name="expense_criteria" value="{{ old('expense_criteria') }}" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="item_category_name">Amount<b class="required_mark">*</b></label>
                                                                        <input type="text" class="form-control" name="expense_amount" value="{{ old('expense_amount') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="item_category_name">Expense Date<b class="required_mark">*</b></label>
                                                                        <input type="date" class="form-control" name="expense_date" value="{{ old('expense_date') }}" required />
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary" name="btn_save_category"><i class="fa fa-check"></i> Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
        $('#expenses').addClass('active');
    </script>
@endsection
