<?php
session_start();
include('includes/dbcon.php');
?>
<div id="page-wrapper">
	<div class="main-page">
		<div class="tables" id="exampl">
			<h3 class="title1">Invoice Details</h3>
			<div class="table-responsive bs-example widget-shadow">
				<?php
				$invid=$_POST['edit_id'];
				$ret=mysqli_query($con,"select DISTINCT  tblinvoice.PostingDate,tblusers.name,tblusers.email,tblusers.mobile,tblusers.sex
					from  tblinvoice 
					join tblusers on tblusers.id=tblinvoice.Userid 
					where tblinvoice.BillingId='$invid'");
				$cnt=1;
				while ($row=mysqli_fetch_array($ret)) 
				{
					?>		
					<h4>Invoice #<?php echo $invid;?></h4>
					<table class="table table-bordered" width="100%" border="1"> 
						<tr>
							<th colspan="6">Customer Details</th>	
						</tr>
						<tr> 
							<th>Name</th> 
							<td><?php echo $row['name']?></td> 
							<th>Contact no.</th> 
							<td><?php echo $row['mobile']?></td>
							<th>Email </th> 
							<td><?php echo $row['email']?></td>
						</tr> 
						<tr> 
							<th>Gender</th> 
							<td><?php echo $row['sex']?></td> 
							<th>Invoice Date</th> 
							<td colspan="3"><?php echo $row['PostingDate']?></td> 
						</tr> 
					</table> 
					<?php 
				}?>
				<table class="table table-bordered" width="100%" border="1"> 
					<tr>
						<th colspan="3">Services Details</th>	
					</tr>
					<tr>
						<th>#</th>	
						<th>StaffName</th>
						<th>Cost</th>
					</tr>

					<?php
					$ret=mysqli_query($con,"select tblservices.StaffName,tblservices.Cost  
						from  tblinvoice 
						join tblservices on tblservices.ID=tblinvoice.ServiceId 
						where tblinvoice.BillingId='$invid'");
					$cnt=1;
					while ($row=mysqli_fetch_array($ret)) {
						?>
						<tr>
							<th><?php echo $cnt;?></th>
							<td><?php echo $row['StaffName']?></td>	
							<td><?php echo $subtotal=$row['Cost']?></td>
						</tr>
						<?php 
						$cnt=$cnt+1;
						$gtotal+=$subtotal;
					} ?>
					<tr>
						<th colspan="2" style="text-align:center">Grand Total</th>
						<th><?php echo $gtotal?></th>
					</tr>
				</table>
				<p style="margin-top:1%"  align="center">
					<i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
				</p>
			</div>
		</div>
	</div>
</div>

<script>
	function CallPrint(strid) {
		var prtContent = document.getElementById("exampl");
		var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
		WinPrint.document.write(prtContent.innerHTML);
		WinPrint.document.close();
		WinPrint.focus();
		WinPrint.print();
		WinPrint.close();
	}
</script>