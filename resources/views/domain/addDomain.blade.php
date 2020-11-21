          @extends('admin.masterAdmin')
          @section('content')
          <!-- BEGIN CONTENT -->
          <div class="page-content-wrapper">
              <!-- BEGIN CONTENT BODY -->
              <div class="page-content">
                  <!-- BEGIN PAGE HEADER-->
                  <!-- BEGIN PAGE BAR -->
                  <div class="page-bar">
                      <ul class="page-breadcrumb">
                          <li>
                               Category
                              <i class="fa fa-circle"></i>
                          </li>
                      </ul>
                  </div>
                  <!-- END PAGE BAR -->
                  <!-- BEGIN PAGE TITLE-->
                  <h1 class="page-title"></h1>
                  <!-- END PAGE TITLE-->
                  <!-- END PAGE HEADER-->
                  <!-- BEGIN DASHBOARD STATS 1-->

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

            <div class="row">
                <div class="col-md-8">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box blue">

                  <div class="portlet-title">
                    <div class="caption">Add Domain</div>
                  </div>

                  <div class="portlet-body form">
                    	 {!! Form::open(['url' =>'addDomainInfo','method' => 'post','role' => 'form','class'=>'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Domain Name <span style="color:red; font-weight: bold">*</span></label>
                                <div class="col-md-8">
                                  <input type="text" class="form-control spinner" name="domainName" placeholder="Domain Name" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Domain Price <span style="color:red; font-weight: bold">*</span></label>
                                <div class="col-md-8">
                                  <input type="number" class="form-control spinner" name="domainPrice" placeholder="Domain Price" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn blue">Submit</button>
                                </div>
                            </div>
                          {!! Form::close() !!}
                        </div>
                    <!-- END SAMPLE FORM PORTLET-->
                  </div>

                </div>
              <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->
          </div><!-- END PAGE CONTENT BODY -->
        </div><!-- END PAGE CONTENT -->


    </div><!-- END CONTAINER -->
@endsection