  <div class="row">
 
                            <div class="col-md-12">
                                 
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <span class="caption-subject bold uppercase">
                                          BALANCE TRANSFER REPORT BETWEEN FROM <?php echo $from ;?> TO <?php echo $to ; ?>
                                            </span>
                                        </div>
                                        {!! Form::open(['url' =>'printBalanceTransferReport','method' => 'post','role' => 'form','class'=>'form-horizontal']) !!}
                                         <input type="hidden" name="from_date" value="<?php echo $from;?>">
                                         <input type="hidden" name="to_date" value="<?php echo $to;?>">
                                         <button type="submit" style="float:right;margin-right:6px;" class="btn btn-success">Print</button> 
                                      {!! Form::close() !!}  
                                    </div>
                                    <div class="portlet-body">
                                         <div class="header">
                                
                            </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Date</th>
                                                    <th>Sender ID</th>
                                                    <th>Receiver ID</th>
                                                    <th>Transfer Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ;
                                                $total_amount_transfer = 0 ;
                                                foreach ($result as $value) { 
                                                        $total_amount_transfer = $total_amount_transfer + $value->amount ;
                                                    ?>
                                                <tr>
                                                    <td><?php echo $i++ ;?></td>
                                                    <td><?php echo $value->created_at ; ?></td>
                                                    <td><?php echo $value->sender_id ; ?></td>
                                                    <td><?php echo $value->receiver_id ; ?></td>
                                                    <td><?php echo $value->amount ; ?></td>
                                                </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td colspan="4"><strong>TOTAL</strong></td>
                                                    <td><strong><?php echo number_format($total_amount_transfer,2)?></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                       
                        <!-- END DASHBOARD STATS 1-->
                    </div><!-- END PAGE CONTENT BODY -->
             