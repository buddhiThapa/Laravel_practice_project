@extends('layouts.yajra_layout')
@section('content')

{{-- for the yajra datatable --}}
<style>
    .form-control-sm{
        background-color: white;
    }
    #DataTables_Table_0_filter label{
        float:right;
    }
    #DataTables_Table_0_paginate ul{
        float:right
    }
</style>



<div class="container-fluid pt-4 px-4 ">
    
    {{-- IMPORT ERROR --}}
    @if (session()->has('failures'))
    <table class="table table-bordered alert alert-danger alert-block">
        <thead>
            
                <th>Row No.</th>
                <th>Error Heading</th>
                <th>
                    Error Description
                </th>
                {{-- <th>
                    
                </th> --}}
            
        </thead>
        @foreach (session()->get('failures') as $validation)
            <tr>
                <td>{{ $validation->row() }}</td>
                <td>{{ $validation->attribute() }}</td>
                <td>
                    <ul>
                        @foreach ($validation->errors() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </td>
                {{-- <td>
                    {{ isset($validation->values()[$validation->attribute()]) }}
                </td> --}}
            </tr>
        @endforeach
    </table>
    @endif
    
    <form action="{{ route('Dark-Pan-theme.user.export') }}" class="row g-4 bg-secondary rounded h-100 p-4" method="post">
        {{ csrf_field() }}
        <div class="col-sm-12">
            <div class="col-sm-4">
                <label for="">Alphabetically</label>
                <select name="alphabet" class="form-control">
                    <option value="">--Select--</option>
                    @foreach( range('A', 'Z') as $elements) 
                        <option value="{{ $elements }}">{{ $elements }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-sm-4" style="float: right">
                <button type="submit" class="btn btn-warning">Export</button>
            </div>
        </div>
    </form>

    <br>
    <br>
    <form action="{{ route('Dark-Pan-theme.user.import') }}" method="post" class="row bg-secondary rounded h-100 p-4" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="col-12">
            <div class="col-sm-4">
                <label for="">Import File</label>
                <input type="file" name="file" id="">
            </div>
            <div class="col-sm-4" style="float: right">
                <button type="submit" class="btn btn-warning">Import</button>
            </div>
        </div>
    </form>
<br>
<br>
    <a href="{{url('/')}}/DarkPan/import-template/import-template.xlsx" class="btn btn-success" download>Import Template </a>

    <table class="table table-bordered data-table bg-secondary rounded h-100 p-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
<script type="text/javascript">
  $(function () {

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    //DataTable
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('Dark-Pan-theme.user.index') }}",
        columns: [
            //for the the indexing
            {data: 'DT_RowIndex', name: 'id'},
            
            // {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            
        ]
    });
  });
</script>

@endsection