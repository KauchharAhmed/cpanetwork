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
                              Domain
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
                <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Applied Domain Pending List</span>
                                        </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>Serial No</th>
                                                    <th>Domain Name</th>
                                                    <th>Domain Price</th>
                                                    <th>Accept</th>
                                                    <th>Decline</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=1; ?>
                                            <?php foreach ($result as $value) { ?>
                                                <tr>
                                                  <td><?php echo $i++ ; ?></td>
                                                  <td><?php echo $value->domain_name ; ?></td>
                                                  <td><?php echo $value->domain_price ; ?></td>
                                                  <td><a href="{{URL::to('/acceptBuyDomainRequest/'.$value->id)}}" class="btn btn-success">Accept</a></td>
                                                  <td><a href="{{URL::to('/rejectBuyDomainRequest/'.$value->id)}}" class="btn btn-danger">Reject</a></td>
                                                </tr>
                                           <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
        </div><!-- END PAGE CONTENT -->


    </div><!-- END CONTAINER -->
    <style type="text/css">
      .dt-buttons{
        display: none;
      }
    </style>
@endsection