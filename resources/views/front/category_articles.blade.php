@extends('front.layout')

@section('main')

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-10">

          <h1 class="my-4"> <?php if(isset($category->categoryTitle)) echo $category->categoryTitle; ?> Articles </h1>
        <?php //print_r($Articles);die; ?>    
         @foreach($Articles as $row)
          <!-- Blog Post -->
          <div class="card mb-4">
            <div class="card-body">
              <h2 class="card-title">{{$row['articlesTitle']}}</h2>
              <p class="card-text"><?php echo substr(strip_tags($row['articlesBody']), 0, 300); ?>.....</p>
              <a href="/ShowArticle/{{$row['articlesId']}}/{{$row['articlesTitle']}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo date("F j, Y",strtotime($row['created_at'])) ?> 
                by {{$row['author']}} 
            </div>
          </div>
            @endforeach

<!--
           Pagination 
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>
-->

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection