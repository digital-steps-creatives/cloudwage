@extends('layout')

@section('content')
    <div class="page-head">
        <div class="page-title">
            <h1>Payroll - <small> Generate payroll report</small></h1>
        </div>
    </div>
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('/') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('payroll.index') }}">Payroll</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Generate</a>
        </li>
    </ul>

    <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('tax.show', $type) }}" method="post" role="form" target="_blank">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption font-red-sunglo">
                                    <i class="fa fa-briefcase font-red-sunglo"></i>
                                    <span class="caption-subject bold uppercase"> Payroll Details</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <label for="year">Payroll For*</label>
                                                <select required name="year" id="year" class="form-control margin-bottom-5">
                                                @foreach($months as $month)
                                                    <option value="{{ $month['id'] }}">{{ $month['value'] }}</option>
                                                @endforeach
                                                </select>
                                                <span>This is month for which you want to generate the report</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            @if($type == 'p9')
                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                    <label for="employee_id">Payroll For*</label>
                                                    <select required name="employee_id" id="employee_id" class="form-control margin-bottom-5 select2">
                                                        @foreach(\Payroll\Models\Employee::all() as $employee)
                                                            <option value="{{ $employee->id }}">{{ '#' . $employee->payroll_number . ' - ' . $employee->first_name . ' ' . $employee->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span>This is the employee you want to generate the report for</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="submit" class="btn btn-primary" value="Generate">
                                        <a class="btn btn-danger" href="{{ URL::previous() }}">Back</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(".date-picker").datepicker( {
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months",
            endDate: "0d"
        });
    </script>
@endsection
