@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_sidebar.add_Graduate')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_sidebar.add_Graduate')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (Session::has('error_Graduated'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_Graduated')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                        <form action="{{route('promotion_one_student')}}" method="post">
                        @csrf
                        @csrf
                        <input type="hidden" name="id"value='{{$id}}' class="id">
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('Students_trans.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}" >{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">تاكيد</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')

    @toastr_js
    @toastr_render
    <script>
         $(document).ready(function () {
        
            $('select[name="Grade_id"]').on('change', function () {
              var G=this.value;
             console.log(G)
              if(G){
              $.ajax({
                
                url: "{{ URL::to('getDataclass') }}/" + G,
                type: "GET",
                dataType: "json",
                    success: function (data) {
$('select[name="Classroom_id"]').empty();
$('select[name="Classroom_id"]').append('<option selected disabled >{{trans('Parent_trans.Choose')}}...</option>');
$.each(data,function(key,v){
    console.log(G);
    $('select[name="Classroom_id"]').append("<option value="+key+">"+v+"</option>")
})
                }
              })}
            })
        })
        </script>
        <script>
            $(document).ready(function () {
                $('select[name="Classroom_id"]').on('change', function () {
                    var section=this.value;
                    console.log(this.value)
                    if(section){
                    $.ajax({
                        url:'{{URL::to("getdatasection")}}/'+section,
                        type:"GET",
                        dataType:'json',
                        success:function(data){
                            $('select[ name="section_id"]').empty();
                            $.each(data,function(k,v){
                                $('select[ name="section_id"]').append('<option value='+k+'>'+v+'</option>');
                            })
                        }
                    })}
                })
            })
        </script>

@endsection