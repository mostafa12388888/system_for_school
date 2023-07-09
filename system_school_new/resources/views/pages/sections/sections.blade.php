@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('title')
{{trans('main_sidebar.Grates_list')}}
@stop

@section('page-header')
<!-- breadcrumb -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> ncvlxcnvxcnvxcv</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <div class="container-fluid">




                    <!-- main body -->

                    <div class="card card-statistics h-100">
                        <div>
                            <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                                {{ trans('Sections_trans.add_section') }}</a>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                                {{ trans('Sections_trans.add_section') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{route('showsection.store')}}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" name="Name_Section_Ar" class="form-control" placeholder="{{ trans('Sections_trans.Section_name_ar') }}">
                                                    </div>

                                                    <div class="col">
                                                        <input type="text" name="Name_Section_En" class="form-control" placeholder="{{ trans('Sections_trans.Section_name_en') }}">
                                                    </div>

                                                </div>
                                                <br>


                                                <div class="col">
                                                    <label for="inputName" class="control-label">{{ trans('Sections_trans.Name_Grade') }}</label>
                                                    <select name="Grade_id" class="custom-select" onchange="console.log($(this).val())">
                                                        <!--placeholder-->
                                                        <option value="" selected disabled>{{ trans('Sections_trans.Select_Grade') }}
                                                        </option>
                                                        @foreach ($Grade_data as $list_Grade)
                                                        <option value="{{ $list_Grade->id }}"> {{ $list_Grade->Name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <br>

                                                <div class="col">
                                                <label for="inputName" class="control-label">{{ trans('Sections_trans.Name_Class') }}</label>
                                                    <select name="Class_id" class="custom-select">

                                                    </select>
                                                </div>
                                                <div class="col">
                                                <label for="inputName" class="control-label">{{ trans('main_sidebar.List_Teachers') }}</label>
                                            <select multiple class="form-control" name="teacher_id[]" id="exampleFormControlSelect2">
                                            
                                                        @foreach($teachers as $teacher)                               
                                                        <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                        @endforeach
                                            </select>   
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                            <button type="submit" class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="accordion gray plus-icon round">
                                @foreach($list_Grades as $D)
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{$D->Name}}</a>
                                    <div class="acd-des">
                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                    <tr class="text-dark">
                                                                        <th>#</th>
                                                                        <th>{{ trans('Sections_trans.Name_Section') }}
                                                                        </th>
                                                                        <th>{{ trans('Sections_trans.Name_Class') }}</th>
                                                                        <th>{{ trans('Sections_trans.Status') }}</th>
                                                                        <th>{{ trans('Sections_trans.Processes') }}</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 0; ?>
                                                                    @foreach($D->sections as $list)
                                                                    <tr>
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{$list->section_name}}</td>
                                                                        <td>{{$list->class->Name_Class}}  </td>
                                                                        <td>@if($list->status==1)
                                                                            <label class="badge badge-success">{{trans('Sections_trans.active')}}</label>@else <label class="badge badge-danger">{{trans('Sections_trans.dontactive')}}</label>@endif  </td>
                                                                           <td>

<a href="#"
   class="btn btn-outline-info btn-sm"
   data-toggle="modal"
   data-target="#edit{{ $list->id }}">{{ trans('Sections_trans.Edit') }}</a>
<a href="#"
   class="btn btn-outline-danger btn-sm"
   data-toggle="modal"
   data-target="#delete{{ $list->id }}">{{ trans('Sections_trans.Delete') }}</a>
</td>
                                                                    </tr>
                                                                    <div class="modal fade"
                                                                         id="edit{{ $list->id }}"
                                                                         tabindex="-1" role="dialog"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('Sections_trans.edit_Section') }}
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                        action="{{route('showsection.update','y')}}"
                                                                                        method="POST">
                                                                                        {{ method_field('patch') }}
                                                                                        {{ csrf_field() }}
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                       name="Name_Section_Ar"
                                                                                                       class="form-control"
                                                                                                       value="{{ $list->getTranslation('section_name', 'ar') }}">
                                                                                            </div>

                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                       name="Name_Section_En"
                                                                                                       class="form-control"
                                                                                                       value="{{ $list->getTranslation('section_name', 'en') }}">
                                                                                                <input id="id"
                                                                                                       type="hidden"
                                                                                                       name="id"
                                                                                                       class="form-control"
                                                                                                       value="{{ $list->id }}">
                                                                                            </div>

                                                                                        </div>
                                                                                        <br>


                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                   class="control-label">{{ trans('Sections_trans.Name_Grade') }}</label>
                                                                                            <select name="Grade_id"
                                                                                                    class="custom-select"
                                                                                                    onclick="console.log($(this).val())">
                                                                                                <!--placeholder-->
                                                                                                <option
                                                                                                    value="{{ $D->id }}">
                                                                                                    {{ $D->Name }}
                                                                                                </option>
                                                                                                @foreach ($list_Grades as $list_Grade)
                                                                                                    <option
                                                                                                        value="{{ $list_Grade->id }}">
                                                                                                        {{ $list_Grade->Name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                   class="control-label">{{ trans('Sections_trans.Name_Class') }}</label>
                                                                                            <select name="Class_id"
                                                                                                    class="custom-select">
                                                                                                <option
                                                                                                    value="{{ $list->class->id }}">
                                                                                                    {{ $list->class->Name_Class }}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <div class="form-check">

                                                                                                @if ($list->status == 1)
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        checked
                                                                                                        class="form-check-input"
                                                                                                        name="Status"
                                                                                                        id="exampleCheck1">
                                                                                                @else
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        name="Status"
                                                                                                        id="exampleCheck1">
                                                                                                @endif
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1">{{ trans('Sections_trans.Status') }}</label>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col">
                                                                                        <select multiple class="form-control" name="teacher_id[]" id="exampleFormControlSelect2">
                                            
                                             @foreach($list->teacher as $teacher)                               
                                            <option selected value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                            @endforeach
                                            @foreach($teachers as $teacher)                               
                                            <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                            @endforeach
                                </select>   
                                                                                </div>
                                                                                </div>
                                                                               
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                                                                    <button type="submit"
                                                                                            class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
<!-- delete_modal_Grade -->
<div class="modal fade"
                                                                         id="delete{{ $list->id }}"
                                                                         tabindex="-1" role="dialog"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('Sections_trans.delete_Section') }}
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action="{{ route('showsection.destroy', 'test') }}"
                                                                                        method="post">
                                                                                        {{ method_field('Delete') }}
                                                                                        @csrf
                                                                                        {{ trans('Sections_trans.Warning_Section') }}
                                                                                        <input id="id" type="hidden"
                                                                                               name="id"
                                                                                               class="form-control"
                                                                                               value="{{ $list->id }}">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
<!-- row closed -->
@endsection
@section('js')
<script>
    $(function() {
        $('select[name="Grade_id"]').on('change', function() {
            var Grid_id = this.value;
            if (Grid_id) {

                $.ajax({
                    url: '{{ URL::to("classes-data") }}/' + Grid_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log('this=', Grid_id)
                        $('select[name="Class_id"]').empty();
                        $.each(data, function(k, value) {

                            $('select[name="Class_id"]').append('<option value=' + k + '>' + value + '</option>');
                        })
                    },

                })
            }
        })
    })
</script>
@endsection