@extends('back.layout')
<style>
        textarea { resize: vertical; }
    </style>
    <link href="{{ asset('adminlte/plugins/colorbox/colorbox.css') }}" rel="stylesheet">

@section('main')




  <!-- Content Wrapper. Contains page content -->
 <div class="row">

<div class="col-md-12">
    
    <!-- Main content -->
    <section class="content">

<div class="error" style="color:red">{{ $errors->first('msg') }}</div>    
<form method="post" name="Save" action="/admin/SaveCategory">
<input type="hidden" name="categoryId" value="<?php if(isset($category->categoryId)) echo $category->categoryId; ?>" />    
<input type="hidden" name="_token" value="{{ csrf_token() }}">     
      <div class="row">
        <div class="col-md-12">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Input masks</h3>
            </div>
            <div class="box-body">
                
              <!-- phone mask -->
              <div class="form-group">
                <label>Title:</label>

                <div class="input-group" style="width:100%">
                 
                  <input type="text" class="form-control" name="categoryTitle" id="categoryTitle" required 
                  value="<?php if(isset($category->categoryTitle)) echo $category->categoryTitle; ?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

                
                
             <!-- checkbox -->
              <div class="form-group">
                <label>
                  <input type="checkbox" value="1" name="status" class="minimal" 
                         <?php if(isset($category->status) && $category->status == 1) echo 'checked'; ?>  >
                  Active
                </label>
              </div>    
                
              <button type="submit" name="Submit" id="search-btn" class="btn btn-large btn-primary">Save</button>   
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->
        </form>
    </section>
    <!-- /.content -->
  </div>
  </div>


@endsection


@section('js')

    <script src="{{ asset('adminlte/plugins/colorbox/jquery.colorbox-min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/voca/voca.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <script>

        CKEDITOR.replace('body', {customConfig: '/adminlte/js/ckeditor.js'})

        $('.popup_selector').click( function (event) {
            event.preventDefault()
            var updateID = $(this).attr('data-inputid')
            var elfinderUrl = '/elfinder/popup/'
            var triggerUrl = elfinderUrl + updateID
            $.colorbox({
                href: triggerUrl,
                fastIframe: true,
                iframe: true,
                width: '70%',
                height: '70%'
            })
        })

        function processSelectedFile(filePath, requestingField) {
            $('#' + requestingField).val('\\' + filePath)
            $('#img').attr('src', '\\' + filePath)
        }

        $('#slug').keyup(function () {
            $(this).val(v.slugify($(this).val()))
        })

        $('#title').keyup(function () {
            $('#slug').val(v.slugify($(this).val()))
        })

    </script>

@endsection