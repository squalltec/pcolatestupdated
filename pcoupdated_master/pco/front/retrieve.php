<?php

session_start();
require_once('db_connection.php');

$ref=$_SESSION['referencenumber'];







?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Professional Congress Organizer - PCO Connect - Thank You!</title>
<meta name="description" content="Professional Congress Organizer, world conference on international telecommunication, world telecommunication standardization assembly, Internatioal Telecommunication union, Hotel Booking, Tours Booking, Visa Booking, Ground Handling Services in (Dubai, Abu dhabi, Sharjah, Ajman ) United Arab Emirates, Pearl of Arabia Travel and Tourism, Pearl Software Solution, Groups Booking, Incentives, ours Services: Deset Safari, Dhow Cruise, Camel Riding, Lama Services, Flight Booking, Free Transfer, Event Booking in Dubai, Seat in Coach Transfer, Hotel Booking, WTSA, WCIT, ITU, wtsa, wcit, itu, HOTEL, BOOKING, GROUPS, PCO, EVENT, EXHIBITION, DUBAI HOTEL BOOKING, TRANSFER, EXCURSION, DUBAI VISA, VISIT">
<meta name="viewport" content="width=device-width">
<?php include_once("includes/head.php"); ?>
</head>
<body>
<?php include_once("includes/header.php"); ?>
	<div class="secondary-pages-background">
    <div class="container_16">
        <div class="grid_16">
            <h1>Retrieve Booking</h1>
        </div>
   </div>
</div> <!-- /end secondary-pages-background  -->
	<div class="extra-pages-container">
    <div class="container_16">
        <div class="grid_16">
        <div class="result_box">
            <div class="result_inner_box">
            <style type="text/css">
            .result_inner_box td, .result_inner_box th{ padding:5px 10px; margin:5px;}
            </style>
              <table width="100%" cellspacing="25" cellpadding="0" border="0" align="center" class="list_hotels" style="background:#f2f2f2;">
                <tbody>
                  <tr>
                    <td valign="middle" align="left" class=""><span style="color:#FFF;"></span></td>
                  </tr>
                  <tr>
                    <td><table width="97%" cellspacing="0" cellpadding="4" border="0" align="center" class="alt_color" style="background:#fff; margin:15px;">
                        <tbody>
                          <tr>
                            <td><img width="180" style="margin:15px 0px 0px 20px; border-right:1px solid #999; padding-right:35px;" alt="PCO CONNECT" src="images/logo.png"></td>
                            <td style="padding-top:20px;">Suite 405, Hyatt Regency Galleria, P.O. Box 184325, Dubai, United Arab Emirates<br>
                              Tel: +971 4 239 8002, Fax: +971 4 239 8003<br />Email: booking@pcoconnect.com</td>
                          </tr>
                          <tr><td colspan="2" style="padding:0px 30px;"><hr /></td></tr>
                          
                          <tr>
                            <td align="center" colspan="2"><b class="color-1">PROFORMA-INVOICE</b>
                             







<?php

$sql ="SELECT * FROM bookings WHERE uniquenumber='$ref' ";
		$result = $conn->query($sql);

	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  
	  
	  $pr=(int)$row['price'];
	  $ds=(int)$row['days'];
	  $avgpernight=$pr/$ds;
	  
?>























							 <table width="95%" cellspacing="0" cellpadding="4" border="1" class="list_hotels cust_tb" style="background:#fff; margin:18px;">
                                <tbody>
                                  <tr>
                                    <th align="left" class="lcurve">ROOM</th>
                                    <th align="center" class="nocurve">QTY</th>
                                    <th align="center" class="nocurve">AVG/NIGHT</th>
                                    <th align="right" class="rcurve">TOTAL AED</th>
                                  </tr>
                                  <tr>
                                    <td width="85%" align="left"><b><?php echo $row['hotel'];?></b><br>
                                       <?php echo $row['roomtype'];?> - <?php echo $row['meal'];?><br>
                                      Check-in: <?php echo $row['checkin']; ?>&nbsp;&nbsp;Check-out: <?php echo $row['checkout']; ?><br/>Number of Days: <?php echo $row['days'];?></td>
                                    <td align="center">1</td>
                                    <td align="center"><?php echo $avgpernight;?></td>
                                    <td width="15%" align="right"><b><?php echo $row['price'];?></b></td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">&nbsp;</td>
                                  </tr>
                                 
                                </tbody>
                              </table>
							  
							  <?php
							    }
}
?>
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
<?php

$sqlr ="SELECT * FROM vehiclebooking WHERE uniquenumber='$ref' ";
		$resultr = $conn->query($sqlr);

	
if ($resultr->num_rows > 0) {
  // output data of each row
  while($rowr = $resultr->fetch_assoc()) {
	  

	  
?>



							 <table width="95%" cellspacing="0" cellpadding="4" border="1" class="list_hotels cust_tb" style="background:#fff; margin:18px;">
                                <tbody>
                                  <tr>
                                    <th align="left" class="lcurve">Transport</th>
                                    <th align="center" class="nocurve">QTY</th>
                                    <th align="center" class="nocurve">AVG/CAR</th>
                                    <th align="right" class="rcurve">TOTAL AED</th>
                                  </tr>
                                  <tr>
                                    <td width="85%" align="left"><b><?php echo $rowr['triptype'];?></b><br>
                                    
                                       <?php 
                                        if($rowr['arrivaldate']!='')      
                                      
                                      {
                                       
                                       
                                       echo $rowr['airportname'];?> - <?php echo $rowr['arrivalairline'];?><br>
                                      Arrival: <?php echo $rowr['arrivaldate']; ?>&nbsp;&nbsp;Car: <?php 
                                      
                                     $aidd=$rowr['arrivalcar']; 
                                     
$sqlra ="SELECT * FROM vehicles WHERE id='$aidd'";
		$resultra = $conn->query($sqlra);

	
if ($resultra->num_rows > 0) {
  // output data of each row
  while($rowra = $resultra->fetch_assoc()) {
      
      echo $rowra['name']; 
	  
}
}
  }                         
                                if($rowr['departuredate']!='')      
                                      
                                      {
                                      
                                      ?><br/>Departure Airline: <?php echo $rowr['departureairline'];?>
                                    <br>
                                      Date: <?php echo $rowr['departuredate'];?>&nbsp;&nbsp;Car: <?php 
                                      
                                     $aiddd=$rowr['departurecar']; 
                                     
$sqlraa ="SELECT * FROM vehicles WHERE id='$aiddd'";
		$resultraa = $conn->query($sqlraa);

	
if ($resultraa->num_rows > 0) {
  // output data of each row
  while($rowraa = $resultraa->fetch_assoc()) {
      
      echo $rowraa['name']; 
	  
}
}
                                    }?>
                                    </td>
                                    <?php
                                     if($rowr['arrivaldate']!=''){
                                    ?>
                                   <td>Arrival:<?php
                                   
                                   echo $rowr['arrivalcarsnumber'];
                                   
                                     }
                                    if($rowr['departuredate']!=''){
                                   ?>
                                   <br/>Departure:
                                   <?php
                                  
                                   echo $rowr['departurecarsnumber'];
                                   }
                                   ?>
                                   
                                   </td> 
                                    
                                    
                                  </tr>
                                  <tr>
                                    
                                    <td colspan="4">&nbsp;</td>
                                  </tr>
                                 
                                </tbody>
                              </table>
							  
							  <?php
							    }
}
?>
							  
			
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							 <table width="95%" cellspacing="0" cellpadding="4" border="1" class="list_hotels cust_tb" style="background:#fff; margin:18px;">
                                <tbody>
							   <tr>
                                    <td align="right" style=" font-size:12px;" colspan="3"> Taxes &amp; Service charges (20%): </td>
									
									
									<?php
									$sqla ="SELECT * FROM fullbooking WHERE uniquenumber='$ref' ";
		$resulta = $conn->query($sqla);

	
if ($resulta->num_rows > 0) {
  // output data of each row
  while($rowa = $resulta->fetch_assoc()) {
	?>
                                    <td align="right" style="font-size:12px;"> <?php echo $rowa['tax'];?> </td>
									
									
                                  </tr>
                                  <tr>
                                    <td align="right" colspan="3"><b class="float-left"></b> <b class="color-1">Grand Total:</b></td>
                                    <td align="right"><b class="color-1">AED <?php echo $rowa['total'];?></b></td>
                                  </tr>
								  
								  <?php
  }
}
									?>
							  
							  
							  </tbody>
							  </table>
							  
							  
							  </td>
                          </tr>
                        </tbody>
                      </table></td>
                  </tr>
                </tbody>
              </table>
              
<!--			  <table width="100%" cellspacing="0" cellpadding="4" border="0" align="center">
                <tbody>
                    <tr>
                    <td valign="top" align="left"><div align="center" id="pay_mode_div">
                        <h2 align="center" style="line-height:35px; letter-spacing:0;">Please select a payment method for this booking.</h2>
                        <h2 style="font-size:16px; font-weight:bold;">
                          <input type="radio" checked="checked" value="Credit" class="pay_method_cls" id="credit-card" name="pay_method" style="width:auto;">
                          <label for="credit-card"> Credit Card</label>&nbsp;&nbsp;
                          <input type="radio" value="Western" id="western-union" class="pay_method_cls" name="pay_method" style="width:auto;">
                          <label for="western-union"> Western Union</label></h2>
                        <div align="center" style="font-family: Verdana,Geneva,sans-serif; width: 100%; display: block;" id="credit_card"> <button type='submit' name='submit' class="btn">Click here to proceed to the  Payment Gateway</button><br>
                          <br>
                          <div align="center">
                            <div align="left">The secure way to make payments online. You can send with many payment options, including all major credit and debit cards</div>
                            <br>
                            <div align="left"> <span style="font-size:11px;color:red">Note: Your payment will be converted into AED </span> </div>
                          </div>
                          <br>
                        </div>
                        <div align="center" style="display:none;" id="paypal">
                          <div style="font-family:Verdana, Geneva, sans-serif;" class="paypal_tc"> <font style="color:red;">
                            <input type="checkbox" name="paypal_chk" id="paypal_chk" style="width:auto;">
                            I agree that I have read the <a href="#" style="color:red;" class="hover-normal">terms and conditions</a></font><br>
                            <br>
                          </div>
                          <!--<a href="http://www.pcoconnect.com/paypal/paypal2.php?oid=88745d04caaea0f82eeeff3ce199e99e" id="frm_paypal" class="viewmore" style="text-transform:uppercase;" >Click here to proceed to PayPal</a>--><br>
                         <!-- <br>
                          <div align="center">
                            <div align="left" style="font-family:Verdana, Geneva, sans-serif;"><b>PayPal </b> is the secure way to make payments online.
                              PayPal acts like a digital wallet where you can securely store all your payment options, 
                              such as your bank account and credit card. When you want to make a payment, 
                              you don't have to pull out your credit card or type your billing info every time.
                              <div align="left"> 
                                <!--
                                     <ol class="lists">
                                       <li>Select the preferred payment method in the <b>Skrill(Moneybookers) payment gateway</b> page.</li>
                                       <li>Provide the Card Number, Expiry Date and Security Code and click <b>Pay</b> </li>
                                       <li>Wait for the transaction to finish, you will be redirected back to pco-connect.com</li>
                                     </ol>
                                     --> 
                           <!--   </div>
                            </div>
                            <br>
                            <img width="80" src="images/PayPal.png"> <br>
                            <br>
                            <span id="siteseal"><script src="https://seal.godaddy.com/getSeal?sealID=nbxL2jVFyHGnQWIXcYGnDpKSQkiBk3kGWr9NGj59dpELS6RRbUEx8" type="text/javascript"></script><img width="132" height="31" onclick="verifySeal();" src="https://seal.godaddy.com/images/3/siteseal_gd_3_h_l_m.gif" style="cursor:pointer;cursor:hand"></span> </div>
                        </div>
                        <div align="left" style="display:none; font-family:Verdana, Geneva, sans-serif; width:100%" id="net_bank"> You can Transfer Funds to our RAK Bank Account using the following details:
                          <div class="curved"> Beneficiary Name: <b>Pearl of Arabia Tourism LLC</b> <br>
                            Beneficiary Account: <b> 0025-420524-002</b> &nbsp;&nbsp;&nbsp;&nbsp;<br>
                            IBAN : <b>AE020400000025420524002</b><br>
                            Beneficiary Bank: <b>NATIONAL  BANK OF RAS AL KHAIMAH (P.S.C)</b><br>
                            Bank Address : <b>P.O.Box  5300, RAK Operations Centre, Emirates Road, Ras Al Khaimah, U.A.E</b><br>
                            Telephone: <b>+971 7  2062222 Fax: +971 7 2435454 / 2435222</b><br>
                            Swift Code: <b>NRAKAEAK</b> &nbsp;&nbsp;&nbsp;&nbsp; Branch : <b>Gold  Souq</b><br>
                            <br>
                            Cover to be effected through:<br>
                            SWIFT: <b>IRVTUS3N</b> <br>
                            <b>Bank of New York, New  York, USA</b> <br>
                          </div>
                          <div style="font-family:Verdana, Geneva, sans-serif;" class="bank_tc">
                            <input type="checkbox" value="On" id="bank_chk" name="bank_chk">
                            If the payment is not made prior to the payment deadline, Pearl Of Arabia reserves the right to cancel the booking without any prior intimation.&nbsp;<a style="color:red;" href="#">Terms and Conditions</a></div>
                          <div align="center"><br>
                            <form action="confirmation.php" method="post" id="frm_bank" name="frm_bank">
                              <input type="hidden" value="Bank Transfer" name="payment_mode">
                              <input type="hidden" value="HUAE1376555600" name="curr_order_id">
                              <input type="submit" value="COMPLETE BOOKING" class="viewmore" name="sub_bank">
                            </form>
                          </div>
                        </div>
                        <div align="left" style="font-family: Verdana,Geneva,sans-serif; width: 100%; display: none;" id="western_union"> You can transfer funds via Western Union using the following details:
                          <div class="curved"> Beneficiary Name: <b class="color-1">Mr. ZANDA KHAN BAHADAR KHAN</b> <br /> <br />
                          </div>
                          <div style="font-family:Verdana, Geneva, sans-serif;" class="bank_tc">
                            <input type="checkbox" value="On" id="west_chk" name="west_chk" style="width:auto;">
                            If the payment is not made prior to the payment deadline, Pearl Of Arabia reserves the right to cancel the booking without any prior intimation.                                &nbsp;<a style="color:red;" href="#" class="hover-normal">Terms and Conditions</a></div>
                          <div align="center"><br>
                            <form action="confirmation.php" method="post" id="frm_west" name="frm_west">
                              <input type="hidden" value="Western Union" name="payment_mode">
                              <input type="hidden" value="HUAE1376555600" name="curr_order_id">
                              <input type="submit" value="COMPLETE BOOKING" class="btn" name="sub_bank" style="width:200px;">
                            </form>
                          </div>
                        </div>
                      </div></td>
                  </tr>
                  </tbody>
              </table>
			  
			  -->
                <!--<div align="center"><input type="button" name="checkout" class="button" value="PAY & COMPLETE BOOKING" /></div>-->
               


			   <div align="center" style="display:none;">
                <div align="left" style="font-family:Verdana, Geneva, sans-serif; width:100%; text-decoration:blink;" class="bank_tc"> </div>
              </div>
              </div>
          </div>
      </div>
    </div>
  </div><!-- /end extra-featured-container -->
<?php include_once("includes/secondary-footer.php"); ?>
<?php include_once("includes/footer.php"); ?>
<script type="text/javascript" language="javascript">
$(function() {
	$(".pay_method_cls").click(function(){
		var curr_val_rdo = ($(this).val());
		if(curr_val_rdo=="Credit"){
			$("#net_bank").hide();
            $("#paypal").hide();
			$("#western_union").hide();
			$("#credit_card").show();
			$("#handling_fee_txt_cc, #handling_fee_amt_cc, #grand_tot_cc").show();
			$("#handling_fee_txt, #handling_fee_amt, #grand_tot").hide();
		}
		if(curr_val_rdo=="Net Bank"){
			$("#credit_card").hide();
			$("#paypal").hide();
			$("#western_union").hide();
			$("#net_bank").show();            
			$("#handling_fee_txt_cc, #handling_fee_amt_cc, #grand_tot_cc").hide();
			$("#handling_fee_txt, #handling_fee_amt, #grand_tot").show();
		}
		if(curr_val_rdo=="Western"){
			$("#credit_card").hide();
			$("#paypal").hide();
			$("#net_bank").hide(); 
			$("#western_union").show();           
			$("#handling_fee_txt_cc, #handling_fee_amt_cc, #grand_tot_cc").hide();
			$("#handling_fee_txt, #handling_fee_amt, #grand_tot").show();
		}
		if(curr_val_rdo=="Paypal"){
			$("#credit_card").hide();
			$("#net_bank").hide();
			$("#western_union").hide();
			$("#paypal").show();
			$("#service_charge").show();
			$("#show_total").html(parseFloat($("#p_service_charge").val())+parseFloat($("#p_total_amount").val()));
		}
	});
	
	$("#frm_bank").submit(function(){
		if($('#bank_chk').is(':checked')==false){
			alert("Please read and agree to the terms & condition");
			return false;
		}
		return true;
	});
	
	$("#frm_west").submit(function(){
		if($('#west_chk').is(':checked')==false){
			alert("Please read and agree to the terms & condition");
			return false;
		}
		return true;
	});
	/*$("#frm_paypal").onclick(function(){
		alert($('#paypal_chk').is(':checked'));
		if($('#paypal_chk').is(':checked')==false){
			alert("Please read and agree to the terms &amp; condition");
			return false;
		}
		return true;
	});*/
	$("#frm_paypal").click(function(event){
		if($('#paypal_chk').is(':checked')==false){
			alert("Please read and agree to the terms &amp; conditions");
			event.preventDefault();
		}
	}); 

});
function open_win(month){
	myWindow = window.open('','','width=800,height=300,left=300');
	myWindow.document.write('&lt;h2&gt;Terms &amp; Conditions&lt;/h2&gt;')
	if(month = 10){
		myWindow.document.write('&lt;p&gt;&lt;table align="left" cellpadding="0" width="685"&gt;&lt;tr&gt;&lt;td width="180"&gt;45 days prior to arrival&lt;/td&gt;&lt;td width="505"&gt;No charge or cancellation fee&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;44-30 days prior to arrival&lt;/td&gt;&lt;td&gt;30% of the entire stay&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;After 29 days prior to arrival&lt;/td&gt;&lt;td&gt;100% of the entire stay&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt;&lt;/p&gt;');
	}else if(month == 11){
		myWindow.document.write('&lt;p&gt;&lt;table align="left" cellpadding="0" width="685"&gt;&lt;tr&gt;&lt;td width="180"&gt;30-26 days prior to arrival&lt;/td&gt;&lt;td width="505"&gt;25% of the entire stay&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt; &lt;td&gt;25-22days prior to arrival&lt;/td&gt;&lt;td&gt;50% of the entire stay&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;After 21 days prior to arrival&lt;/td&gt;&lt;td&gt;100% of the entire stay&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt;&lt;/p&gt;');
	}
	myWindow.focus();
}
</script>
</body>
</html>