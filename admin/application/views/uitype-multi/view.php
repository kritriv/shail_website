<div class="banner1">    

	<div class="log right-prt">

		<?php if($this->uri->segment(1) != 'profile'){  ?>

		<a href="<?=base_url($this->uri->segment(1).'/index')?>"> <button type="button" class="btn btn-success">View All</button></a>

		<?php } ?>

		<h4><?=$allArray['module']->modulelabel;?></h4>

	</div>

</div>

<div class="clearfix"></div>

<div class="col-md-11">

<?php //var_dump(array_keys($allArray)); ?>

<?php //var_dump($allArray['records']); ?>



	<div class="clearfix"></div>

	<div class="inner-detail">

	    <div class="inn-inner-detal">

	      	<div class="row detail-row">

	      	<?php 	if($allArray['records']){ ?>

		      	<?php 	$q = 0;foreach ($allArray['blocks'] as $b => $blocks) { ?>

					<?php 	if($blocks->displaytype == 0) { ?>

					    <div class="<?=$blocks->blocksclassname?>" id="<?=$blocks->blocksid?>">

				      		<div id="accordion<?=$blocks->blocksid?>" class="accordion">

						        <div class="card mb-0">

						            <div class="card-header" data-toggle="collapse" href="#collapse<?=$blocks->blocksid?>">

						                <a class="card-title">

						                    <?php if($this->uri->segment(1) != 'profile'){  ?>

												<b><?=$blocks->blocklabel?></b>

											<?php }  ?>

						                </a>

						            </div>

						            <div id="collapse<?=$blocks->blocksid?>" class="card-body collapse show" data-parent="#accordion<?=$blocks->blocksid?>" >

						                <?php 	if($blocks->blocktype == 'single'){?>

							                <table class="table table-bordered odred odred7">

								              	<tbody>

							              		<?php 	foreach ($allArray['modulefield'] as $key => $value) { ?>

													<?php 	if ($value->block == $blocks->blocksid) { ?>

														<?php 	if ($value->displaytype) { ?>

														<?php 	}else { ?>

																<?php 	if ($value->uitype =='1') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname]; ?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='2') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname]; ?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='3') { ?>

																	<?php 	foreach ($allArray['dropdown'] as $drop => $down) { ?>

																		<?php 	if (in_array($down->fieldname, array_keys($allArray))) { $d = $down->fieldname ; ?>

																			<?php 	if ($d.'id' == $value->columnname && !empty($allArray[$down->fieldname])) { ?>

																				<tr id="<?php echo $value->fieldname?>Div">

																					<th><?php echo $value->fieldlabel?></th>

																					<td>

																					<?php 	foreach ($allArray[$down->fieldname] as $k => $v) { ?>

																						<?php if($inputFieldValues[$value->columnname] == $v[$down->fieldname.'id']) { ?>

																							<?php echo $v[$down->fieldname]; ?>

																						<?php 	}	?>

																					<?php 	}	?>

																					</td>

																				</tr>

																			<?php  	} ?>

																		<?php  	} ?>

																	<?php  	} ?>

																<?php  	} ?>

																<?php 	if ($value->uitype =='4') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php if(!empty(strtotime($inputFieldValues[$value->columnname])) && strtotime($inputFieldValues[$value->columnname]) > 0) echo date("d-m-Y",strtotime($inputFieldValues[$value->columnname]));else echo '00-00-0000';?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='5') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname]; ?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='6') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname]; ?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='7') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php if(!empty(strtotime($inputFieldValues[$value->columnname])) && strtotime($inputFieldValues[$value->columnname]) > 0) echo date("d-m-Y h:i:s",strtotime($inputFieldValues[$value->columnname]));else echo '00-00-0000 00:00:00';?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='8') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php if(!empty(strtotime($inputFieldValues[$value->columnname])) && strtotime($inputFieldValues[$value->columnname]) > 0) echo date("d-m-Y h:i:s",strtotime($inputFieldValues[$value->columnname]));else echo '00-00-0000 00:00:00';?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='9') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php if($inputFieldValues[$value->columnname])echo 'Yes';else echo 'No'; ?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='10') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname]; ?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='11') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname]; ?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='12') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname]; ?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='13') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td>

																		<?php 

																			if ($value->columnname == 'createdby') {

																				foreach ($allArray['allloginuser'] as $p => $q) {

																					if ($q['id'] == $inputFieldValues[$value->columnname]) echo $q['fullname'];

																				}

																			}

																		?>

																		</td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='14') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td>

																		<?php 

																			if($value->columnname == 'modifiedby') {

																				foreach ($allArray['allloginuser'] as $p => $q) {

																					if ($q['id'] == $inputFieldValues[$value->columnname]) echo $q['fullname'];

																				}

																			}

																		?>

																		</td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='15') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname]; ?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='16') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname.'withcode']. '-' .$inputFieldValues[$value->columnname]; ?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='17') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td>

																			<?php if($inputFieldValues[$value->columnname]){ ?>

																				<div><img src="<?php echo base_url(UPLOAD_FOLDER.$inputFieldValues[$value->columnname]); ?>" width="100px"></div>

																			<?php } ?>

																		</td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='18') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td>XXXXXXXXXXXXX</td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='19') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname];?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='20') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname];?></td>

																	</tr>

																<?php  	} ?>
<?php 	if ($value->uitype =='21') { ?>
																	<tr id="<?php echo $value->fieldname?>Div">
																		<th><?php echo $value->fieldlabel?></th>
																		<td>
																		    <?php $i=0;foreach ($allArray['multiimage'] as $ks => $vs) {?> 
                    								                        <div>
                    											        		<img src="<?=base_url(UPLOAD_FOLDER.$vs['multiimage']);?>" alt="<?=$vs['multiimage']?>"  width="200px">
                    											        	</div>
                    							                            <?php	$i++; } ?>
																			<?php //if($inputFieldValues[$value->columnname]){ ?>
																				<?php // $imgArray = unserialize($inputFieldValues[$value->columnname]); ?>
																                <?php  //foreach ($imgArray as $key => $value) { ?>
																	                <?php// $im = explode("___", $value); $im1 = explode(".", $im[1]);?>
																	                <!--<div>
																						<img src="<?=base_url(UPLOAD_FOLDER.$value);?>" alt="<?=$value?>"  width="200px">
																					</div>-->
																			   	<?php //} ?>
																			<?php //} ?>
																		</td>
																	</tr>
																<?php  	} ?>

																<?php 	if ($value->uitype =='37') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td>

																			<?php if($inputFieldValues[$value->columnname]){ ?>

																				<?php  $imgArray = unserialize($inputFieldValues[$value->columnname]); ?>

																                <?php  foreach ($imgArray as $key => $value) { ?>

																	                <?php $im = explode("___", $value); $im1 = explode(".", $im[1]);?>

																	                <div>

																						<a href="<?=base_url(UPLOAD_FOLDER.$value);?>"><?=$value?></a>

																					</div>

																			   	<?php } ?>

																			<?php } ?>

																		</td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='23') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname];?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='24') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname];?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='25') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><?php echo $inputFieldValues[$value->columnname];?></td>

																	</tr>

																<?php  	} ?>

																<?php 	if ($value->uitype =='31') { ?>

																	<tr id="<?php echo $value->fieldname?>Div">

																		<th><?php echo $value->fieldlabel?></th>

																		<td><a style="cursor:pointer" target="_blank" onclick="removeWishList(<?php echo $this->uri->segment(3);?>,'<?php echo $inputFieldValues[$value->columnname];?>')"><?php echo $inputFieldValues[$value->columnname];?></a></td>

																	</tr>

																<?php  	} ?>

														<?php 	} ?>

													<?php 	} ?>

												<?php 	} ?>

								              	</tbody>

								            </table>

							            <?php }else if($blocks->blocktype == 'multiple'){ ?>

							            	<a onClick="openIt('myModalInvoive')" data-toggle="modal" class="btn btn-success pull-right" data-hover="View">Print Invoice</a>

									    		<table class="table table-bordered odred odred7">

							            			<thead>

							            				<tr id="<?php echo $value->fieldname?>Div">

							            				<?php 	foreach ($allArray['modulefield'] as $key => $value) { ?>

															<?php 	if ($value->block == $blocks->blocksid) { ?>

																<?php 	if ($value->displaytype) { ?>

																<?php 	}else { ?>

																				<th><?php echo $value->fieldlabel?></th>

																	<?php 	} ?>

															<?php 	} ?>

														<?php 	} ?>

										              	</tr>

							            			</thead>

									              	<tbody>

										            <?php 	for ($i = 0;$i < count($allArray['multiRecord']);$i++) { ?>

										            		<tr id="<?php echo $value->fieldname?>Div">

										              		<?php 	foreach ($allArray['modulefield'] as $key => $value) { ?>

																<?php 	if ($value->block == $blocks->blocksid) { ?>

																	<?php 	if ($value->displaytype) { ?>

																	<?php 	}else { ?>

																			<?php 	if ($value->uitype =='1') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='2') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='3') { ?>

																					<td>

																				<?php 	foreach ($allArray['dropdown'] as $drop => $down) { ?>

																					<?php 	if (in_array($down->fieldname, array_keys($allArray))) { $d = $down->fieldname ; ?>

																						<?php 	if ($d.'id' == $value->columnname && !empty($allArray[$down->fieldname])) { ?>

																								<?php 	foreach ($allArray[$down->fieldname] as $k => $v) { ?>

																									<?php if($allArray['multiRecord'][$i][$value->columnname] == $v[$down->fieldname.'id']) { ?>

																										<?php echo $v[$down->fieldname]; ?>

																									<?php 	}	?>

																								<?php 	}	?>

																						<?php  	} ?>

																					<?php  	} ?>

																				<?php  	} ?>

																					</td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='4') { ?>

																					<td><?php echo date('d-m-Y',strtotime($allArray['multiRecord'][$i][$value->columnname])); ?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='5') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='6') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='7') { ?>

																					<td><?php echo date('d-m-Y h:i:s',strtotime($allArray['multiRecord'][$i][$value->columnname])); ?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='8') { ?>

																					<td><?php echo date('d-m-Y h:i:s',strtotime($allArray['multiRecord'][$i][$value->columnname])); ?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='9') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='10') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='11') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='12') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='13') { ?>

																					<td>

																					<?php 

																						if ($value->columnname == 'createdby') {

																							foreach ($allArray['allloginuser'] as $p => $q) {

																								if ($q['id'] == $allArray['multiRecord'][$i][$value->columnname]) echo $q['fullname'];

																							}

																						}

																					?>

																					</td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='14') { ?>

																					<td>

																					<?php 

																						if($value->columnname == 'modifiedby') {

																							foreach ($allArray['allloginuser'] as $p => $q) {

																								if ($q['id'] == $allArray['multiRecord'][$i][$value->columnname]) echo $q['fullname'];

																							}

																						}

																					?>

																					</td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='15') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='16') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='17') { ?>

																					<td>

																						<?php if($allArray['multiRecord'][$i][$value->columnname]){ ?>

																							<img src="<?php echo base_url(UPLOAD_FOLDER.$allArray['multiRecord'][$i][$value->columnname]); ?>" width="100px">

																						<?php } ?>

																					</td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='18') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='19') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='20') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='21') { ?>

																					<td>

																						<?php if($allArray['multiRecord'][$i][$value->columnname]){ ?>

																							<?php  $imgArray = unserialize($allArray['multiRecord'][$i][$value->columnname]); ?>

																			                <?php  foreach ($imgArray as $key => $value) { ?>

																				                <?php $im = explode("___", $value); $im1 = explode(".", $im[1]);?>

																				                <div>

																									<img src="<?=base_url(UPLOAD_FOLDER.$value);?>" alt="<?=$value?>"  width="200px">

																								</div>

																						   	<?php } ?>

																						<?php } ?>

																					</td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='22') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='23') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='24') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='25') { ?>

																					<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																			<?php  	} ?>

																			<?php 	if ($value->uitype =='31') { ?>

																					<td><a style="cursor:pointer" target="_blank" onclick="removeWishList(<?php echo $this->uri->segment(3);?>,'<?php echo $allArray['multiRecord'][$i][$value->columnname];?>')"><?php echo $allArray['multiRecord'][$i][$value->columnname];?></a></td>

																			<?php  	} ?>

																	<?php 	} ?>

																<?php 	} ?>

															<?php 	} ?>

															</tr>

											    	<?php 	}	?>

							                      	</tbody>

									            </table>

							            <?php }else{ ?>

							            <?php } ?>

						            </div>

						        </div>

						    </div>

				      	</div>

			    	<?php }  ?>

			    <?php }  ?>

		    <?php }  ?>

	      	</div>

	      	<div class="modal" id="myModalInvoive" role="dialog">

		    	<div class="modal-dialog">

		      		<div class="modal-content">

			        	<div class="modal-header">

			          		<h4 class="modal-title">Invoice</h4>

			        		<button type="button" onClick="closeIt('myModalInvoive')" class="close" data-dismiss="modal">&times;</button>

			          	</div>

				        <div class="modal-body">

				        	<div class="">

				        		<a class="btn btn-success pull-right" onclick="printDivOrder('printDiv')"><i class="fa fa-Edit"></i>&nbsp;Print PDF</a>

								<div class="table-responsive" id="printDiv">

									<table class="table" style="width:100%">

										<thead><tr><th colspan="2">Order Detail</th></tr></thead>

										<tbody>

											<?php 	if($allArray['records']){ ?>

												<?php 	$q = 0;foreach ($allArray['blocks'] as $b => $blocks) { ?>

													<?php 	if($blocks->blocktype == 'single'){ ?>

														<?php 	if ($blocks->blocksid == 9) { ?>

															<tr id="<?php echo $value->fieldname?>Div">

																<td>

														        	<?php   $imgArray = $allArray['sitedetail'][0]['headerlogo']; $IMG = $imgArray; ?>

															        <?php   if(empty($IMG)) $IMG = 'logo.png'; ?>

														        	<img src="<?php echo base_url(UPLOAD_FOLDER.$allArray['sitedetail'][0]['headerlogo']); ?>" width="" height="" style="width:100px">

																	<p class="text-bold-800"><?=$allArray['sitedetail'][0]['title']	?></p>

						                                          	<?=$allArray['sitedetail'][0]['address']?>

						                                          	<p><b>E-Mail:</b> <?=$allArray['sitedetail'][0]['email']?></p>

						                                          	<p><b>Phone:</b> <?=$allArray['sitedetail'][0]['phone']?></p>

						                                          	<p><b>Web Site:</b> <?=$allArray['sitedetail'][0]['websiteurl']?></p>

																</td>

																<td style="text-align: right;">

																	<p class="">Order NO: # <?=$inputFieldValues['orderno']?></p>

							                                      	<p class="">Order Date: <?=$inputFieldValues['createddate']?></p>

							                                      	<p class="">TXN ID: #<?=$inputFieldValues['transactionid']?></p>

							                                      	<p>Order Status: <span>

							                                      		<?php 	foreach ($allArray['orderstatus'] as $k => $v) { ?>

																			<?php if($inputFieldValues['orderstatusid'] == $v['orderstatusid']) { ?>

																				<?php echo $v['orderstatus']; ?>

																			<?php 	}	?>

																		<?php 	}	?>

																		</span>

							                                      		</p>

							                                      	<p class="">Total Amount: $ <?=number_format($inputFieldValues['total'],2,'.','');?></h2>

																</td>

															</tr>

															<tr style="width:100%;"><th style="width:50%;">To</th><th style="width:50%;">Ship To</th></tr>

															<tr id="<?php echo $value->fieldname?>Div">

																<td>	

																	<span>Name  : <?=$inputFieldValues['shipname'];?></span><br/>

																	<span>Email  : <?=$inputFieldValues['shipemail'];?></span><br/>

																	<span>Phone  : <?=$inputFieldValues['shipphone'];?></span><br/>

																	<span>Address  : <?=$inputFieldValues['shipaddress'];?></span><br/>

																	<span>Pincode  : <?=$inputFieldValues['shipzipcode'];?></span><br/>

																</td>

																<td>

																	<span>Name  : <?=$inputFieldValues['billname'];?></span><br/>

																	<span>Email  : <?=$inputFieldValues['billemail'];?></span><br/>

																	<span>Phone  : <?=$inputFieldValues['billphone'];?></span><br/>

																	<span>Address  : <?=$inputFieldValues['billaddress'];?></span><br/>

																	<span>Pincode  : <?=$inputFieldValues['billzipcode'];?></span><br/>

																</td>

															</tr>

															<?php 	} ?>

													<?php 	}else if($blocks->blocktype == 'multiple'){ ?>

															<tr id="<?php echo $value->fieldname?>Div">

																<td colspan="2">

																	<table class="table table-bordered odred odred7">

										            					<thead>

													            			<tr id="<?php echo $value->fieldname?>Div">

													            				<?php 	foreach ($allArray['modulefield'] as $key => $value) { ?>

																					<?php 	if ($value->block == $blocks->blocksid) { ?>

																						<?php 	if ($value->displaytype) { ?>

																						<?php 	}else { ?>

																										<th><?php echo $value->fieldlabel?></th>

																							<?php 	} ?>

																					<?php 	} ?>

																				<?php 	} ?>

																            </tr>

																        </thead>

																        <tbody>

													            		    <?php 	for ($i = 0;$i < count($allArray['multiRecord']);$i++) { ?>

																            		<tr id="<?php echo $value->fieldname?>Div">

																              		<?php 	foreach ($allArray['modulefield'] as $key => $value) { ?>

																						<?php 	if ($value->block == $blocks->blocksid) { ?>

																							<?php 	if ($value->displaytype) { ?>

																							<?php 	}else { ?>

																									<?php 	if ($value->uitype =='1') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='2') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='3') { ?>

																											<td>

																										<?php 	foreach ($allArray['dropdown'] as $drop => $down) { ?>

																											<?php 	if (in_array($down->fieldname, array_keys($allArray))) { $d = $down->fieldname ; ?>

																												<?php 	if ($d.'id' == $value->columnname && !empty($allArray[$down->fieldname])) { ?>

																														<?php 	foreach ($allArray[$down->fieldname] as $k => $v) { ?>

																															<?php if($allArray['multiRecord'][$i][$value->columnname] == $v[$down->fieldname.'id']) { ?>

																																<?php echo $v[$down->fieldname]; ?>

																															<?php 	}	?>

																														<?php 	}	?>

																												<?php  	} ?>

																											<?php  	} ?>

																										<?php  	} ?>

																											</td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='4') { ?>

																											<td><?php echo date('d-m-Y',strtotime($allArray['multiRecord'][$i][$value->columnname])); ?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='5') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='6') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='7') { ?>

																											<td><?php echo date('d-m-Y h:i:s',strtotime($allArray['multiRecord'][$i][$value->columnname])); ?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='8') { ?>

																											<td><?php echo date('d-m-Y h:i:s',strtotime($allArray['multiRecord'][$i][$value->columnname])); ?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='9') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='10') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='11') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='12') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='13') { ?>

																											<td>

																											<?php 

																												if ($value->columnname == 'createdby') {

																													foreach ($allArray['allloginuser'] as $p => $q) {

																														if ($q['id'] == $allArray['multiRecord'][$i][$value->columnname]) echo $q['fullname'];

																													}

																												}

																											?>

																											</td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='14') { ?>

																											<td>

																											<?php 

																												if($value->columnname == 'modifiedby') {

																													foreach ($allArray['allloginuser'] as $p => $q) {

																														if ($q['id'] == $allArray['multiRecord'][$i][$value->columnname]) echo $q['fullname'];

																													}

																												}

																											?>

																											</td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='15') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='16') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='17') { ?>

																											<td>

																												<?php if($allArray['multiRecord'][$i][$value->columnname]){ ?>

																													<img src="<?php echo base_url(UPLOAD_FOLDER.$allArray['multiRecord'][$i][$value->columnname]); ?>" width="100px">

																												<?php } ?>

																											</td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='18') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='19') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='20') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='21') { ?>

																											<td>

																												<?php if($allArray['multiRecord'][$i][$value->columnname]){ ?>

																													<?php  $imgArray = unserialize($allArray['multiRecord'][$i][$value->columnname]); ?>

																									                <?php  foreach ($imgArray as $key => $value) { ?>

																										                <?php $im = explode("___", $value); $im1 = explode(".", $im[1]);?>

																										                <div>

																															<img src="<?=base_url(UPLOAD_FOLDER.$value);?>" alt="<?=$value?>"  width="200px">

																														</div>

																												   	<?php } ?>

																												<?php } ?>

																											</td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='22') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='23') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='24') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='25') { ?>

																											<td><?php echo $allArray['multiRecord'][$i][$value->columnname];?></td>

																									<?php  	} ?>

																									<?php 	if ($value->uitype =='31') { ?>

																											<td><a style="cursor:pointer" target="_blank" onclick="removeWishList(<?php echo $this->uri->segment(3);?>,'<?php echo $allArray['multiRecord'][$i][$value->columnname];?>')"><?php echo $allArray['multiRecord'][$i][$value->columnname];?></a></td>

																									<?php  	} ?>

																							<?php 	} ?>

																						<?php 	} ?>

																					<?php 	} ?>

																					</tr>

																	    	<?php 	}	?>

																	    </tbody>

																	</table>

																</td>

															</tr>

										            <?php 	} ?>

		      									<?php 	} ?>		

		      								<?php 	} ?>

										</tbody>

									</table>

								</div>

					        </div>

				      	</div>

			    	</div>

			  	</div>

			</div>

			<style type="text/css">

				.accordion .card-header:after {

				    font-family: 'FontAwesome';  

				    content: "\f068";

				    float: right; 

				}

				.accordion .card-header.collapsed:after {

				    /* symbol for "collapsed" panels */

				    content: "\f067"; 

				}

				.accordion{

					    margin-top: 20px;

				}

			</style>

			<style type="text/css">

			.modal-dialog{

				max-width: 960px;

			}

			.table .table {

			    background: none!important;

			}

			.modal {

			    display: none; 

			    position: fixed;

			    z-index:99999; 

			    padding-top: 50px; 

			    left: 0;

			    top: 0;

			    width: 100%; 

			    height: 100%; 

			    overflow: auto; 

			    background-color: rgba(0,0,0,0.5);

			}

			.modal-content {

			    margin: auto;

			    display: block;

			    width: 100%;



			}

			.close:hover,.close:focus{

			    color: #000;

			    text-decoration: none;

			    cursor: pointer;

			}

			@media only screen and (max-width: 700px){

			    .modal-content {

			        width: 100%;

			    }

			}

		</style>	      	

	    </div>

	</div>

</div>

<script type="text/javascript">
 var roleid= '<?php echo $this->session->userdata["role_id"]?>';
    var modname = '<?php echo $this->uri->segment(1)?>';
    if(roleid=='5'){
        if(modname =='post'){
        $('#shortcontentDiv').css('display','none');
        $('#60').css('display','none');
        $('#61').css('display','none');
        $('.templateDiv').css('display','none');
        $('#pagesubtitleDiv').css('display','none');
        $('.parentcategoryDiv').css('display','none');
        }else if(modname=='postcategory'){
        $('#shortcontentDiv').css('display','none');
        $('#fullcontentDiv').css('display','none');
        $('#mainimageDiv').css('display','none');    
        $('#60').css('display','none');
        $('#61').css('display','none');
        $('.templateDiv').css('display','none');
        $('#pagesubtitleDiv').css('display','none');
        $('.parentcategoryDiv').css('display','none');
        }else if(modname =='product'){
        $('#60').css('display','none');
        $('#61').css('display','none');
        $('.templateDiv').css('display','none');
        $('#pagesubtitleDiv').css('display','none');
        $('.parentcategoryDiv').css('display','none');
        }else{
        $('#mainimageDiv').css('display','none');
        $('#60').css('display','none');
        $('#61').css('display','none');
        $('.templateDiv').css('display','none');
        $('#pagesubtitleDiv').css('display','none');
        $('.parentcategoryDiv').css('display','none');
        }
    }else if(roleid=='3'){
        if(modname =='post'){
        $('#shortcontentDiv').css('display','none');
        $('#postsubtitleDiv').css('display','none');
        $('#60').css('display','none');
        $('#61').css('display','none');
        $('.templateDiv').css('display','none');
        $('#pagesubtitleDiv').css('display','none');
        $('.parentcategoryDiv').css('display','none');
        }else if(modname=='postcategory'){
        $('#shortcontentDiv').css('display','none');
        $('#fullcontentDiv').css('display','none');
        $('#mainimageDiv').css('display','none');    
        $('#60').css('display','none');
        $('#61').css('display','none');
        $('.templateDiv').css('display','none');
        $('#pagesubtitleDiv').css('display','none');
        $('.parentcategoryDiv').css('display','none');
        }else if(modname =='product'){
        $('#60').css('display','none');
        $('#61').css('display','none');
        $('.templateDiv').css('display','none');
        $('#pagesubtitleDiv').css('display','none');
        $('.parentcategoryDiv').css('display','none');
        }else{
        $('#mainimageDiv').css('display','none');
        $('#60').css('display','none');
        $('#61').css('display','none');
        $('.templateDiv').css('display','none');
        $('#pagesubtitleDiv').css('display','none');
        $('.parentcategoryDiv').css('display','none');
        }
    }else{
        if(modname =='postcategory'){
        $('#shortcontentDiv').css('display','none');
        $('.parentcategoryDiv').css('display','none');
        $('#fullcontentDiv').css('display','none');
        $('#mainimageDiv').css('display','none');
        }else{
        $('.templateDiv').css('display','none');
        $('#pagesubtitleDiv').css('display','none');
        $('#postsubtitleDiv').css('display','none');
        }
    }
function printDivOrder(divName) {

				var printContents = document.getElementById(divName).innerHTML;

			            var top = '<title>DIV Contents</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head><body>';

			            var bottom = '';

			    var originalContents = document.body.innerHTML;

			    document.body.innerHTML = top + printContents + bottom;

			    window.print();

			    document.body.innerHTML = originalContents;

			}

	function openIt(id){

	    document.getElementById(id).style.display = "block";

	}

	function closeIt(id){

	    document.getElementById(id).style.display = "none";

	}

</script>