@extends('front.layout')

@section('main')


<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-10">

          <!-- Title -->
          <h1 class="mt-4">
              <?php if(isset($article->articlesTitle)) echo $article->articlesTitle;  ?>
              </h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#"><?php if(isset($article->author)) echo $article->author;  ?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php if(isset($article->created_at)) echo date("F j, Y, g:i A",strtotime($article->created_at)); ?></p>

          <hr>

         
          <hr>
            <?php if(isset($article->articlesBody)) echo $article->articlesBody ?>

          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
            <div class="error" style="color:red">{{ $errors->first('msg') }}</div>    
              <form method="post" action="/SaveComment">
                <input type="hidden" name="articlesId" value="<?php if(isset($article->articlesId)) echo $article->articlesId; ?>" />    
                <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                <div class="form-group">
                  <input type="text" name="visitor_name" id="visitor_name" required class="form-control" rows="3" placeholder="Name"></textarea>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="comment" id="comment" required rows="3" placeholder="Comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
          @foreach($comments as $row)
          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">  
            <div class="media-body">
              <h5 class="mt-0">{{$row->visitor_name}}</h5>
              {{$row->comment}}</div>
          </div>
@endforeach
            
            
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection