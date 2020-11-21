<!DOCTYPE html>
<html>
<head>
  <title>LogIn Page</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="container" style="margin-top:165px">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Forgot Password</strong>
        </div>
        <div class="panel-body">
          {!! Form::open(['url' =>'sendForgotPasswordInfo','method' => 'post','role' => 'form','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
            <fieldset>
              <div class="row">
                <!-- Error list from validation() method -->
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                    <span style="font-weight:bold;"><img src="{{ URL::to('public/images/warning.png') }}" alt=""> {{ $error }}</span>
                    </div>
                     @endforeach
                @endif

                <?php if(Session::get('succes') != null) { ?>
                     <div class="alert alert-info alert-dismissible" role="alert">
                    <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
                    <strong><?php echo Session::get('succes') ;  ?></strong>
                    <?php Session::put('succes',null) ;  ?>
                  </div>
                  <?php } ?>

                   <?php if(Session::get('failed') != null) { ?>
                     <div class="alert alert-danger alert-dismissible" role="alert">
                    <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
                    <strong><?php echo Session::get('succes') ;  ?></strong>
                    <?php Session::put('succes',null) ;  ?>
                  </div>
                  <?php } ?>

                <!-- Error list from custom session variable -->
                @if (!empty(Session::get('login_faild')))
                <div class="alert alert-danger">
                <?php
                $message= Session::get('login_faild');
                if($message)
                {
                    echo $message;
                    Session::put('login_faild',null);
                }
                ?>
                </div>
                @endif
                <!-- <div class="center-block">
                  <center><img class="profile-img"
                    src="{{URL::to('public/assets/img_avatar1.png')}}" alt="" height="180" width="180" style="border-radius: 50%;margin-bottom: 20px;"></center>
                </div> -->
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                  <div class="form-group">
                    <br>
                    <div class="form-group">
                      <label>Affiliate ID</label> 
                      <input class="form-control" placeholder="Affiliate ID" name="affiliateId" type="text" autofocus required="">
                    </div>
                    <div class="form-group">
                      <label>Enter Your Email or Mobile</label> 
                      <input class="form-control" placeholder="Email or Mobile" name="emailOrMobile" type="email" autofocus required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Send">
                    
                  </div>
                </div>
              </div>
            </fieldset>
           {!! Form::close() !!}
        </div>
        <div class="panel-footer ">
          Don't have an account! &nbsp;<a href="{{URL::to('registration')}}">Registration Here </a>
        </div>
              </div>
    </div>
  </div>
</div>

<script src="{{URL::to('public/js/jquery.js')}}"></script> 
</body>
</html>