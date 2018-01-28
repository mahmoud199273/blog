@extends('back.layout')

    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
    <style>
        input, th span {
            cursor: pointer;
        }
    </style>

@section('main')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
               
                <div class="box-body table-responsive">
                    <table id="users" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Active</th>
                            <th>Creation</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Active</th>
                            <th>Creation</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody id="pannel">
                           @foreach($categories as $row)
    <tr>
        <td>{{ $row->categoryId }}</td>
        <td>{{ $row->categoryTitle }}</td>
        <td>
            <?php 
            if($row->status == 1) echo "Active";
            else echo "Inactive";
            ?>
        </td>
        <td>{{ $row->at_time }}</td>
       
        <td><a class="btn btn-warning btn-xs btn-block" href="/admin/EditCategory/{{$row->categoryId }}" role="button" title="Edit"><span class="fa fa-edit"></span></a></td>
        <td><a class="btn btn-danger btn-xs btn-block" href="/admin/DeleteCategory/{{$row->categoryId}}" role="button" title="Delete"><span class="fa fa-remove"></span></a></td>
    </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection
