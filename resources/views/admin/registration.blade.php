<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{URL::to('public/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
</head>
<style>
    body {
    background-color: #e9ebee;
}

.card {
    margin-top: 1em;
}

/* IMG displaying */
.person-card {
    margin-top: 5em;
    padding-top: 5em;
}
.person-card .card-title{
    text-align: center;
}
.person-card .person-img{
    width: 10em;
    position: absolute;
    top: -5em;
    left: 50%;
    margin-left: -5em;
    border-radius: 100%;
    overflow: hidden;
    background-color: white;
}
</style>
<body>
<div class="container" style="margin-top: 1em;">
        <div class="card person-card">
            <div class="card-body">
                <!-- Sex image -->
                <img id="img_sex" class="person-img" src="{{URL::to('public/assets/Life Cycle-595b40b75ba036ed117d9ef0.svg')}}">
                <h2 id="who_message" class="card-title">Register Your Account</h2><br>
                <?php if(Session::get('success') != null) { ?>
              <div class="alert alert-info alert-dismissible" role="alert">
              <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
              <strong><?php echo Session::get('success') ;  ?></strong>
              <?php Session::put('success',null) ;  ?>
              </div>
              <?php } ?>

              <?php
              if(Session::get('failed') != null) { ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
              <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
              <strong><?php echo Session::get('failed') ; ?></strong>
              <?php echo Session::put('failed',null) ; ?>
              </div>
              <?php } ?>

              @if (count($errors) > 0)
              @foreach ($errors->all() as $error)      
              <div class="alert alert-danger alert-dismissible" role="alert">
              <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
              <strong>{{ $error }}</strong>
              </div>
              @endforeach
              @endif
                <!-- First row (on medium screen) -->
                {!! Form::open(['url' =>'saveRegistrationInfo','method' => 'post','role' => 'form','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                <div class="row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-4">
                        <label>First Name</label>
                        <input type="text" name="firstName" class="form-control" placeholder="First name" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Last Name</label>
                        <input name="lastName" type="text" class="form-control" placeholder="Last name" required="">
                    </div>
                    <div class="form-group col-md-2"></div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Mobile No</label>
                        <input name="phone" type="number" class="form-control" placeholder="Mobile no" required="">
                    </div>
                    <div class="form-group col-md-2"></div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-4">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Confirm Password</label>
                        <input name="confirmPassword" type="password" class="form-control" placeholder="Confirm Password" required="">
                    </div>
                    <div class="form-group col-md-2"></div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-4">
                        <label>Skype ID</label>
                        <input type="text" name="skype" class="form-control" placeholder="Skype ID">
                    </div>
                    <div class="form-group col-md-4">
                        <label>How You Know Us</label>
                        <input name="how_you_know_us" type="text" class="form-control" placeholder="How You Know Us">
                    </div>
                    <div class="form-group col-md-2"></div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-4">
                        <label>Traffic Type</label>
                        <select name="traffic_type" class="form-control" required="">
                            <option value="">Select one</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Traffic Volume</label>
                        <select name="traffic_volume" class="form-control" required="">
                            <option value="">Select one</option>
                            <option value="x">X</option>
                            <option value="y">Y</option>
                            <option value="z">Z</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2"></div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-4">
                        <label>Refference ID</label>
                        <input type="text" name="refference_id" class="form-control" placeholder="Refference ID">
                    </div>
                    <!-- <div class="form-group col-md-4">
                        <label>How You Know Us</label>
                        <input name="lastName" type="text" class="form-control" placeholder="How You Know Us">
                    </div> -->
                    <div class="form-group col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button style="margin-top: 1em;" type="submit" class="btn btn-info btn-lg btn-block">Registration</button>
                        <center><span style="color: blue">OR</span></center>
                        <center><a href="{{URL::to('login')}}">Already Have An Account ? </a></center>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
        </div>
        {!! Form::close() !!}
</div>
</body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- <script>
    // URLs images
var female_img = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo8PcCxh7tT6MDFhJi2UaAT9SeciHqvZuaWtGg0y0-yyP8rMDz";
var male_img = "https://visualpharm.com/assets/217/Life%20Cycle-595b40b75ba036ed117d9ef0.svg";

// On page loaded
$( document ).ready(function() {
    // Set the sex image
    set_sex_img();
    
    // Set the "who" message
    set_who_message();

    // On change sex input
    $("#input_sex").change(function() {
        // Set the sex image
        set_sex_img();
        set_who_message();
    });

    // On change fist name input
    $("#first_name").keyup(function() {
        // Set the "who" message
        set_who_message();
        
        if(validation_name($("#first_name").val()).code == 0) {
            $("#first_name").attr("class", "form-control is-invalid");
            $("#first_name_feedback").html(validation_name($("#first_name").val()).message);
        } else {
            $("#first_name").attr("class", "form-control");
        }
    });

    // On change last name input
    $("#last_name").keyup(function() {
        // Set the "who" message
        set_who_message();
        
        if(validation_name($("#last_name").val()).code == 0) {
            $("#last_name").attr("class", "form-control is-invalid");
            $("#last_name_feedback").html(validation_name($("#last_name").val()).message);
        } else {
            $("#last_name").attr("class", "form-control");
        }
    });
});

/**
*   Set image path (Mr. or Ms.)
*/
function set_sex_img() {
    var sex = $("#input_sex").val();
    if (sex == "Mr.") {
        // male
        $("#img_sex").attr("src", male_img);
    } else {
        // female
        $("#img_sex").attr("src", female_img);
    }
}

/**
*   Set "who" message
*/
function set_who_message() {
    var sex = $("#input_sex").val();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    
    if (validation_name(first_name).code == 0 || 
        validation_name(last_name).code == 0) {
        // Informations not completed
        $("#who_message").html("Who are you ?");
    } else {
        // Informations completed
        $("#who_message").html(sex+" "+first_name+" "+last_name);
    }
}

/**
*   Validation function for last name and first name
*/
function validation_name (val) {
    if (val.length < 2) {
        // is not valid : name length
        return {"code":0, "message":"The name is too short."};
    }
    if (!val.match("^[a-zA-Z\- ]+$")) {
        // is not valid : bad character
        return {"code":0, "message":"The name use non-alphabetics chars."};
    }
    
    // is valid
    return {"code": 1};
}
</script> -->
</html>

<!--
    Realised by Thibault Leveau
    https://www.linkedin.com/in/thibault-leveau-a76923ba/
-->
