@extends('front.layout')

@section('main')


    <!-- Page Content -->
    <div class="container" id="login_container" style="height:500px">

      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Admin Login</h3>
            
          <div class="error" style="color:red">
          {{ $errors->first('username') }}
          {{ $errors->first('password') }}        
          {{ $errors->first('msg') }}        
          </div>
          <form name="sentMessage" id="contactForm" novalidate method="post" action="login">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">      
            <div class="control-group form-group">
              <div class="controls">
                <label>UserName:</label>
                <input type="text" class="form-control" id="username" name="username" required data-validation-required-message="Please enter your username.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Password:</label>
                <input type="password" class="form-control" id="password" name="password" data-validation-required-message="Please enter your password.">
              </div>
            </div>
         
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">SignIn</button>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


@endsection