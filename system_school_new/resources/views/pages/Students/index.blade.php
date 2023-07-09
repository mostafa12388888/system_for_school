@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_sidebar.List_student')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_sidebar.List_student')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('students.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('main_sidebar.add_student')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Students_trans.name')}}</th>
                                            <th>{{trans('Students_trans.email')}}</th>
                                            <th>{{trans('Students_trans.gender')}}</th>
                                            <th>{{trans('Students_trans.Grade')}}</th>
                                            <th>{{trans('Students_trans.classrooms')}}</th>
                                            <th>{{trans('Students_trans.section')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->gender->Name}}</td>
                                            <td>{{$student->grade->Name}}</td>
                                            <td>{{$student->classroom->Name_Class}}</td>
                                            <td>{{$student->section->section_name}}</td>
                                            <td>
                                            <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  {{trans('Students_trans.Processes')}}
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <a href="{{route('students.edit',$student->id)}}" class="btn btn-info w-100 " role="button" aria-pressed="true"><i class="fa fa-edit"> &nbsp&nbsp&nbsp{{ trans('Grades_trans.Edit') }}  &nbsp</i></a>
  <br>
  <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="{{ trans('Grades_trans.Delete') }}">{{ trans('Grades_trans.Delete') }}<i class="fa fa-trash"></i></button> 
  <br>
  <a class="dropdown-item" href="{{route('Fees_Invoices.show',$student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;اضافة فاتورة رسوم&nbsp;</a>
  <a class="dropdown-item" href="{{route('ProcessingFee.show',$student->id)}}" style="background-color:#9dc8e2"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;{{trans('Grades_trans.Fee_excluded')}}</a>
  <a class="dropdown-item" href="{{route('payment_studenontroller.show',$student->id)}}"><i style="color:goldenrod" class="fas fa-donate"></i>&nbsp; &nbsp;{{ trans('main_sidebar.receipt') }}</a>

  <a  style="background-color: #9dc8e2" class="dropdown-item" href="{{route('ResceptStudent.show',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;{{ trans('Grades_trans.Catch_Receipt') }}</a>
  <a href="{{route('students.show',$student->id)}}" class="btn btn-warning w-100" role="button" aria-pressed="true">{{ trans('Grades_trans.details') }}<i class="far fa-eye"></i></a>
  <a href="Graduated_one_student/{{$student->id}}" class="btn btn-primary w-100" role="button" aria-pressed="true">{{ trans('Grades_trans.graduate') }}></a>
  <a href="{{route('Graduated.edit',$student->id)}}" class="btn btn-info w-100" role="button" aria-pressed="true">{{ trans('Grades_trans.promotion') }}></a>
 
</div>
</div>
                                            </td>    
                                          
                                            </tr>
                                        @include('pages.Students.Delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection