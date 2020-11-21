<?php
$admin_id       = Session::get('admin_id');
$type           = Session::get('type');
       
       if($admin_id == null && $type == null){
       return Redirect::to('/admin')->send();
       exit();
        }

       if($admin_id == null && $type != '1'){
       return Redirect::to('/admin')->send();
       exit();
        }
        
        if($type != '1'){
       return Redirect::to('/admin')->send();
       exit();
        }

        ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Balance Transfer Report</title>
	<style type="text/css">
		table.nila {
			border-collapse: collapse;
		}

		table.nila, td.nila, th.nila {
			border: 1px solid black;
			padding:7px;
		}
	</style>
</head>
<body>
   <!-- <table>
        <tr>
          
          <td style="padding-left:315px !important;">
            <div>
            <span>
              <//?php echo $setting->company_name ; ?>
            </span>
            <br>
             <//?php 
             //foreach ($result as $value1) { }
              ?>
            <span style="font-size:13px;">
              Branch : <//?php echo $value1->name ; ?>
            </span>
            <br/>
             <span style="font-size:13px;">
              Address : <//?php echo $value1->branch_address ; ?>
            </span>
            <br/>
            <span style="font-size:13px;">
              Cell <span style="padding-left: 21px;">:</span> <//?php echo $value1->branch_mobile ; ?>
            </span>
            </div>          
          </td>
        </tr>
      </table> -->
      <center><h3><span style="font-family:tahoma;border:1px solid #000;padding-top:4px;padding-bottom:4px;padding-left:27px;padding-right:27px;">BALANCE TRANSFER REPORT</span></h3></center>      
      <div class="row">
          <table style="font-size:12px;">
                                    <tr>
                                        <td><strong> 
                                           BALANCE TRANSFER REPORT BETWEEN FROM <?php echo $from ;?> TO <?php echo $to ; ?>
                                        </strong>
                                      </td>
                                     
                                    </tr>
                                    <tr>
                                        <td><?php echo "Print : ".date('d-m-Y , h:i:s a') ; ?></td>
                                    </tr>
                                </table>

                  <table width="100%" class="nila">
                                              <thead>
                                                <tr>
                                                    <th class="nila">Sl No</th>
                                                    <th class="nila">Date</th>
                                                    <th class="nila">Sender ID</th>
                                                    <th class="nila">Receiver ID</th>
                                                    <th class="nila">Transfer Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ;
                                                $total_amount_transfer = 0 ;
                                                foreach ($result as $value) { 
                                                        $total_amount_transfer = $total_amount_transfer + $value->amount ;
                                                    ?>
                                                <tr>
                                                    <td class="nila"><?php echo $i++ ;?></td>
                                                    <td class="nila"><?php echo $value->created_at ; ?></td>
                                                    <td class="nila"><?php echo $value->sender_id ; ?></td>
                                                    <td class="nila"><?php echo $value->receiver_id ; ?></td>
                                                    <td class="nila"><?php echo $value->amount ; ?></td>
                                                </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td colspan="4" class="nila"><strong>TOTAL</strong></td>
                                                    <td class="nila"><strong><?php echo number_format($total_amount_transfer,2)?></strong></td>
                                                </tr>
                                            </tbody>
</table>
	<script type="text/javascript">
	window.print();
	</script>
    </body>
</html>

   