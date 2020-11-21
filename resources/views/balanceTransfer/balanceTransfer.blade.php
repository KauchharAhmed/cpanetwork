          @extends('admin.masterAffiliate')
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
                              Balance Transfer
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
                    <div class="caption">Balance Transfer To User</div>
                  </div>

                  <div class="portlet-body form">
                    	 {!! Form::open(['url' =>'balanceTransferToUser','method' => 'post','role' => 'form','class'=>'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Reciver ID<span style="color:red; font-weight: bold">*</span></label>
                                <div class="col-md-8">
                                <input type="text" class="form-control spinner" name="reciverId" placeholder="Reciver ID" required=""></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Transfer Amount<span style="color:red; font-weight: bold">*</span></label>
                                <div class="col-md-8">
                                <input type="number" class="form-control spinner" name="transferAmount" placeholder="Transfer Amount" required=""></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirm Transfer Amount<span style="color:red; font-weight: bold">*</span></label>
                                <div class="col-md-8">
                                <input type="number" class="form-control spinner" name="confirmTransferAmount" placeholder="Confirm Transfer Amount" required=""></div>
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