<div class="banner1">    

	<div class="log right-prt">

		<?php 	$segment = $this->uri->segment(1);  
		$roleid=$this->session->userdata["role_id"];
		$moduleid=$this->uri->segment(1);?>

		<?php 	if($this->uri->segment(1) == 'profile') $segment = 'employee';  ?>

		<?php if($this->uri->segment(1) == 'profile' || $this->uri->segment(1) == 'enquiry' || $this->uri->segment(1) == 'page' || $this->uri->segment(1) == 'buyer' || $this->uri->segment(1) == 'wishlist' || $this->uri->segment(1) == 'review' || $this->uri->segment(1) == 'productbid' || $this->uri->segment(1) == 'sliders' || $this->uri->segment(1) == 'uimenu' || $this->uri->segment(1) == 'website' || $this->uri->segment(1) == 'type' || $this->uri->segment(1) == 'saletype' || $this->uri->segment(1) == 'comments' || $this->uri->segment(1) == 'newsletter'){  ?>

		<?php }else{ ?>

			<?php 	foreach ($allArray['modulepermission'] as $keymp => $valuemp) { ?>

				<?php if($valuemp['modulemodeid'] == 1) { ?>
				<?php if($moduleid=='csdcustomer' || $moduleid=='insurence' || $moduleid=='testdrive'  || $moduleid=='sectorservice'){ ?>
                    <?php }else { ?>
                    <?php if($this->uri->segment(1) == 'post'){?>
                      <a href="<?=base_url($this->uri->segment(1).'/add')?>"> <button type="button" class="btn btn-success">Add Financial Service</button></a>  
                    <?php } else if($this->uri->segment(1) == 'pcategory'){?>
                      <a href="<?=base_url($this->uri->segment(1).'/add')?>"> <button type="button" class="btn btn-success">Add Bussiness Category </button></a>  
                    <?php } else if($this->uri->segment(1) == 'producttype'){?>
                      <a href="<?=base_url($this->uri->segment(1).'/add')?>"> <button type="button" class="btn btn-success">Add Product category</button></a>  
                    <?php } else if($this->uri->segment(1) == 'buyer'){?>
                      <a href="<?=base_url($this->uri->segment(1).'/add')?>"> <button type="button" class="btn btn-success">Add Buyer</button></a>  
                    <?php } else{ ?>
					<a href="<?=base_url($this->uri->segment(1).'/add')?>"> <button type="button" class="btn btn-success">Add <?=ucfirst($segment);?></button></a>
    				<?php } }}?>

			<?php } ?>

		<?php } ?>

		<h4><?=$allArray['module']->modulelabel;?></h4>

		<h4><?=$allArray['module']->modulelid;?></h4>

		

	</div>

</div>

<?php //var_dump(array_keys($allArray)); ?>

<?php //var_dump($allArray['alllanguage']); ?>

<style type="text/css">

.table td, .table th {

    padding: .75rem;

    vertical-align: top;

    border-top: 1px solid #dee2e6;

    width: auto;

}

.first-thhh {

    padding-left: 15px !important;

}





.first-thhh1 {

    width: 65px !important;

}



.first-thhh {

  

	    width: 40px !important;

}



.first-thhh:before {

    left: 5px !important;

}



.first-thhh:after {

    left: 0px !important;

}



</style>

<div class="col-md-12 right-ptr">

	<?php if (count($allArray['filter'])) { 	?>

	<div class="left-prt filter-slid">

		<div class="inn-left-prt ">

			<h5>Filter</h5>

			<form action="<?=base_url($this->uri->segment(1).'/index')?>">

				<?php

				 foreach ($allArray['filter'] as $key => $value) {  ?>

					<div class="form-group">

						<?php 	if($value['uitype'] == 3){ ?>

							<select name="<?=$value['columnname']?>" id="<?=$value['columnname']?>filters" class="form-control border-radius-20">

								<option value="">Select <?=$value['fieldlabel']?></option>

								<?php 	foreach ($allArray[$value['fieldname']] as $ey => $val) { if($_REQUEST[$value['columnname']] == $val[$value['columnname']]) $sel = 'selected';else $sel = '';?>

									<option value="<?=$val[$value['columnname']]?>" <?=$sel;?>><?=$val[$value['fieldname']]?></option>

								<?php 	}?>

							</select>

							<script type="text/javascript"> //$( function() { $( "#<?=$value['columnname']?>filters" ).combobox(); } ); </script>

						<?php 	}else if($value['uitype'] == 27 && $this->uri->segment(1) == 'post'){ ?>

							<select name="<?=$value['columnname']?>" id="<?=$value['columnname']?>filters" class="form-control border-radius-20">

								<option value="">Select</option>

								<?php 	foreach ($allArray[$value['fieldname']] as $ey => $val) { if($_REQUEST[$value['columnname']] == $val['post'.$value['columnname'].'id']) $sel = 'selected';else $sel = '';?>

									<option value="<?=$val['post'.$value['columnname'].'id']?>" <?=$sel;?>><?=$val[$value['fieldname']]?></option>

								<?php 	}?>

							</select>

							<script type="text/javascript"> //$( function() { $( "#<?=$value['columnname']?>filters" ).combobox(); } ); </script>

						<?php 	}else if($value['uitype'] == 27 && $this->uri->segment(1) == 'postcategory'){ ?>

							<select name="<?=$value['columnname']?>" id="<?=$value['columnname']?>filters" class="form-control border-radius-20">

								<option value="">Select</option>

								<?php 	foreach ($allArray[$value['fieldname']] as $ey => $val) { if($_REQUEST[$value['columnname']] == $val['postcategoryid']) $sel = 'selected';else $sel = '';?>

									<option value="<?=$val['postcategoryid']?>" <?=$sel;?>><?=$val['category']?></option>

								<?php 	}?>

							</select>

							<script type="text/javascript"> //$( function() { $( "#<?=$value['columnname']?>filters" ).combobox(); } ); </script>

						<?php 	}else{ ?>

							<input type="text" class="form-control" name="<?=$value['columnname']?>" placeholder="<?=$value['fieldlabel']?>" value="<?=$_REQUEST[$value['columnname']]?>">

						<?php 	} ?>

					</div>                   

				<?php 	}	?>

				<input type="submit"> 

			</form>            

		</div>

	</div> 

	<?php 	}	?>  

	<div class="inn-right-ptr">

		<?php $this->load->view('partials/notification_messages');?>

		<h6><!--<span>                           

				<div class="form-group left-prt exprt" >

 					<a href="<?=base_url($segment.'/phpexcel_export/')?>"><button type="button" class="btn btn-success">Export Excel</button></a>

 				</div>

 			</span>-->
			

			<!--<span>                           

				<div class="form-group left-prt exprt" >

 					<a onclick="downloadFile()"><button type="button" class="btn btn-success">Export CSV</button></a>

 				</div>

 			</span>-->
				

<!--<span>                           

				<div class="form-group left-prt exprt" >

 					<a onclick="printDiv('listTable')"><button type="button" class="btn btn-success">Print</button></a>

 				</div>

 			</span>-->

			<?php if (count($allArray['filter'])) { 	?>

				<span>                           

					<div class="form-group left-prt exprt" >

	 					<button type="button" class="btn btn-success clk-filt">Filter</button>

					</div>

				</span>

					<?php if(!empty($_GET)){ ?>

						<div class="form-group left-prt exprt" >

		 					<a href="<?=base_url($this->uri->segment(1).'/index')?>"><button type="button" class="btn btn-success">Clear All</button></a>

						</div>

					<?php 	}	?>

			<?php 	}	?> 

		</h6> 

		<h4 class="total-recodss">

			<?php 	if(count($allArray['records'])) { ?>

			<?php 	$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;?>

				Total Records <?=$allArray['total_records']?>

			<?php } ?>

		</h4> 

		<form name="listForm" action="<?=base_url($segment.'/deleteAll/')?>" method="post">

			<div id="listTable" class="table-responsive">

				<div class="toggleColumn">

					Toggle column:  

					<a id="toggleTrough1" onclick="fire(2)" style="cursor:pointer">Sr.No.</a>

					<?php $t = 3;	foreach ($allArray['columnlist'] as $k => $y) { ?>

						-  <a id="toggleTrough<?=$t?>" onclick="fire(<?=$t?>)" style="cursor:pointer"><?=$y['fieldlabel']?></a>

					<?php 	$t++;}?>

				</div>

				<div class="tblHeader"><center><h4><?=$allArray['module']->modulelabel;?></h4></center></div>

					

				<table class="table tab-im mytablePagination">

					<thead>

						<tr class="head-th">

							<th class="first-thhh"><input type="checkbox" id="select_all" value=""/></th>

							<th class="first-thhh1">Sr.No.</th>

							<?php 	foreach ($allArray['columnlist'] as $k => $y) { ?>

								<th><i class="fa fa-user" aria-hidden="true"></i> <?=$y['fieldlabel']?></th>

							<?php 	}?>

							<th><i class="fa fa-briefcase" aria-hidden="true"></i> Action </th>

						</tr>

					</thead>

					<tbody>

						<?php if(count($allArray['records'])) {?>

							<?php $i=0;	foreach ($allArray['records'] as $key => $value) { $i++;?>

								<tr>

									<td><input type="checkbox" name="ckbdelete[]" class="checkbox" value="<?=$value[$segment.'id']?>"></td>

									<td><span style="font-size: 16px;">  <?=$start_index + $i?></span></td>

									<?php 	foreach ($allArray['columnlist'] as $k => $y) { ?>

										<?php 	if ($y['uitype'] =='4') { ?>

											<td><?php if(!empty(strtotime($value[$y['fieldname']])) && strtotime($value[$y['fieldname']]) >0) echo date("m-d-Y",strtotime($value[$y['fieldname']])); else echo '00-00-0000';?></td>

										<?php 	}else if ($y['uitype'] =='7') { ?>

											<td><?php if(!empty(strtotime($value[$y['fieldname']])) && strtotime($value[$y['fieldname']]) >0) echo date("m-d-Y h:i:s",strtotime($value[$y['fieldname']]));else echo '00-00-0000 00:00:00';?></td>

										<?php 	}else if ($y['uitype'] =='8') { ?>

											<td><?php if(!empty(strtotime($value[$y['fieldname']])) && strtotime($value[$y['fieldname']]) >0) echo date("m-d-Y h:i:s",strtotime($value[$y['fieldname']]));else echo '00-00-0000 00:00:00';?></td>

										<?php 	}else if ($y['uitype'] =='9') { ?>

											<td><?php if($value[$y['fieldname']] == 1) echo 'Yes';else echo 'No';?></td>

										<?php 	}else if ($y['uitype'] =='16') { ?>

											<td><?php echo $value[$y['fieldname'].'withcode'].'-'.$value[$y['fieldname']].'';?></td>

										<?php 	}else if ($y['uitype'] =='17') {?>

											<td><?php if($value[$y['columnname']]){ ?>

											<div><img src="<?php echo base_url(UPLOAD_FOLDER.$value[$y['columnname']]); ?>" width="200px" height="100px"></div>

											<?php } ?></td>

										<?php 	}else if ($y['uitype'] =='27' && $y['fieldname'] == 'parentcategory') { ?>

											<td>

												<?php 	

													foreach ($allArray['recordsAll'] as $k => $v) { 

														if($v[$this->uri->segment(1).'id'] == $value[$y['fieldname']]){ 

																	echo $v['category'];

														}	

													}	

												?>

											</td>

										<?php 	}else if ($y['uitype'] =='27' && $y['fieldname'] == 'category') { ?>

											<td>

												<?php 	

													foreach ($allArray['category'] as $k => $v) { 

														if($v['postcategoryid'] == $value[$y['fieldname']]){ 

																	echo $v['category'];

														}	

													}	

												?>

											</td>

										<?php 	}else{ ?>

											<?php 

												if ($y['fieldname'] == 'createdby') {

													foreach ($allArray['allloginuser'] as $p => $q) {

														if ($q['id'] == $value[$y['fieldname']]) echo '<td>'.$q['fullname'].'</td>';

													}

												}else if($y['fieldname'] == 'modifiedby') {

													foreach ($allArray['allloginuser'] as $p => $q) {

														if ($q['id'] == $value[$y['fieldname']]) echo '<td>'.$q['fullname'].'</td>';

													}

												}else{

													echo '<td>'.$value[$y['fieldname']].'</td>';

												}

											?>

										<?php 	} ?>

									<?php 	} ?>

									<?php 	$segment = $this->uri->segment(1);  ?>

									<?php 	if($this->uri->segment(1) == 'profile') $segment = 'employee';  ?>

									<td>

										<?php 	

										foreach ($allArray['modulepermission'] as $keymp => $valuemp) { ?>

												<?php 	if($valuemp['modulemodeid'] == 2) { ?>

													<?php 	if(!$valuemp['presence']) { ?>

														<a href="<?=base_url($segment.'/view/'.$value[$segment.'id'])?>" title="<?=$value['mode']?>"><img src="<?=base_url('asset/image/Eye_37136.png')?>" alt="" class="im-2"></a>

													<?php 	} ?>

												<?php 	}else if($valuemp['modulemodeid'] == 3){ ?>

													<?php 	if(!$valuemp['presence']) { ?>

														<a href="<?=base_url($segment.'/edit/'.$value[$segment.'id'])?>" title="<?=$value['mode']?>"><img src="<?=base_url('asset/image/Actions-document-edit-icon.png')?>" class="edit-img"></a>

													<?php 	} ?>

												<?php 	}else if($valuemp['modulemodeid'] == 4){ ?>

													<?php 	if(!$valuemp['presence']) { ?>

														<a onclick="delete_confirm_Row('<?=base_url($segment.'/delete/'.$value[$segment.'id'])?>')" title="<?=$value['mode']?>"><img src="<?=base_url('asset/image/delete.png')?>" alt="" class="im-2"></a>

													<?php 	} ?>

												<?php 	} ?>

										<?php 	} ?>

									</td>  

								</tr>

							<?php 	} ?>

							<!-- <tr><td colspan="<?=count($allArray['columnlist'])+2;?>"><a onclick="delete_confirm()" title="<?=$value['mode']?>"><img src="<?=base_url('asset/image/delete.png')?>" alt="" class="im-2"></a></td></tr> -->

						<?php }else{ ?>
                             <?php if($this->uri->segment(1) == 'post'){?>
                              <tr><td colspan="<?=count($allArray['columnlist'])+1?>"><h4 class="text-center">No Financial Service found. Create Financial Service!!</h4></td></tr>  
                            <?php } else if($this->uri->segment(1) == 'pcategory'){?>
                            <tr><td colspan="<?=count($allArray['columnlist'])+1?>"><h4 class="text-center">No Bussiness Category found. Create Product Bussiness Category!!</h4></td></tr>  
                            <?php } else if($this->uri->segment(1) == 'producttype'){?>
                            <tr><td colspan="<?=count($allArray['columnlist'])+1?>"><h4 class="text-center">No Product Category found. Create Product Category!!</h4></td></tr> 
                            <?php } else if($this->uri->segment(1) == 'buyer'){?>
                             <tr><td colspan="<?=count($allArray['columnlist'])+1?>"><h4 class="text-center">No Buyer found. Create Buyer!!</h4></td></tr> 
                            <?php } else{ ?>
							<tr><td colspan="<?=count($allArray['columnlist'])+1?>"><h4 class="text-center">No <?=ucwords($this->uri->segment(1))?> found. Create <?=ucwords($this->uri->segment(1))?>!!</h4></td></tr>
						<?php } } ?>

					</tbody>

				</table>

			</div>

		</form>

		<?php if (isset($allArray['links'])) { ?>

            <?php echo $allArray['links'] ?>

        <?php } ?>

	</div>

</div>

<script>

function delete_confirm(){

    if($('.checkbox:checked').length > 0){

        var result = confirm("Are you sure to delete selected users?");

        if(result){

        	listForm.submit();

            return true;

        }else{

            return false;

        }

    }else{

        alert('Select at least 1 record to delete.');

        return false;

    }

}

function delete_confirm_Row(url){

        var result = confirm("Are you sure to delete selected users?");

        if(result){

            window.location.href=url;

            return true;

        }else{

            return false;

        }

}

$(document).ready(function(){

    $('#select_all').on('click',function(){

        if(this.checked){

            $('.checkbox').each(function(){

                this.checked = true;

            });

        }else{

             $('.checkbox').each(function(){

                this.checked = false;

            });

        }

    });

	

    $('.checkbox').on('click',function(){

        if($('.checkbox:checked').length == $('.checkbox').length){

            $('#select_all').prop('checked',true);

        }else{

            $('#select_all').prop('checked',false);

        }

    });

});

function download_csv(csv, filename) {

	var csvFile;

	var downloadLink;

	csvFile = new Blob([csv], {type: "text/csv"});

	downloadLink = document.createElement("a");

	downloadLink.download = filename;

	downloadLink.href = window.URL.createObjectURL(csvFile);

	downloadLink.style.display = "none";

	document.body.appendChild(downloadLink);

	downloadLink.click();

}



function export_table_to_csv(html, filename) {

	var csv = [];

	var rows = document.querySelectorAll("table tr");

	for (var i = 0; i < rows.length; i++) {

		var row = [], cols = rows[i].querySelectorAll("td, th");

		for (var j = 0; j < cols.length-1; j++) {

			if (i > 0) {

				if ($(cols).find("input:checked").val()) {

					row.push(cols[j].innerText);

				};

			}else{

				row.push(cols[j].innerText);

			}

		}

		csv.push(row.join(","));    

	}

	download_csv(csv.join("\n"), filename);

}

function downloadFile(){

	var values = [];

	$('input:checked').each(function() {

		if ($(this).val() != "") {

			values.push($(this).val());

		};

	});

	if(values.length){

		var html = document.querySelector("table").outerHTML;

		export_table_to_csv(html, "<?=$this->uri->segment(1).'_'.time()?>.csv");

	}else{

		alert('Please Select Row');

	}

}

$('.tblHeader').css('display','none');

function printDiv(divName) {

	$("th:last-child").css('display','none');

	$("td:last-child").css('display','none');

    $('.dataTables_info,.pagination,.dataTables_length,.dataTables_filter,.fa,.toggleColumn').css('display','none');

	$('.tblHeader').css('display','');

	var printContents = document.getElementById(divName).innerHTML;

    $('.dataTables_info,.pagination,.dataTables_length,.dataTables_filter,.fa,.toggleColumn').css('display','');

	$('.tblHeader').css('display','none');

	var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;

    $("th:last-child").css('display','');

	$("td:last-child").css('display','');

}

</script>

