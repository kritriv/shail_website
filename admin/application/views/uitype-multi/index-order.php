<div class="banner1">    
	<div class="log right-prt">
		<?php if($this->uri->segment(1) != 'profile'){  ?>
			<a href="<?=base_url($this->uri->segment(1).'/index')?>"> <button type="button" class="btn btn-success">View All</button></a>
		<?php } ?>
		<h4><?=$allArray['module']->modulelabel;?></h4>
	</div>
</div>

<div class="clearfix"></div>
<div class="text-pt">
	<?php $this->load->view('partials/notification_messages'); ?>
</div>
<?php echo validation_errors(); ?>
<form method="post" enctype="multipart/form-data">
	<div class="text-pt">
		<div class="btn-sub">
			<?php if($this->uri->segment(1) != 'profile'){  ?>
				<button type="reset" class="btn btn-primary">Discard</button>
			<?php  } ?>
			<button type="submit" name="insert" class="btn btn-primary">Save</button>
		</div>
	</div>
	<?php 	foreach ($allArray['blocks'] as $b => $blocks) { ?>
		<div class="text-pt">&nbsp;</div>
		<div class="form-prt">
			<div class="container_fluid inn-form-prt">
				<div class="row"><h4 style="padding-bottom: 10px;"><?=$blocks->blocklabel?><br/></h4></div>
				<?php 	if($blocks->blocktype == 'single'){?>
					<div class="clearfix"></div>
					<div class="row">
						<?php 	foreach ($allArray['modulefield'] as $key => $value) { ?>
							<?php 	if ($value->block == $blocks->blocksid) { ?>
								<?php 	if ($value->readonly) { 
											$readonly  = 'disabled';
										}else if ($value->columnname == 'transactionid'){
											if (!empty($inputFieldValues[$value->columnname])) {
												$readonly  = 'disabled';
											}else{
												$readonly  = '';
											}
										}else{
											$readonly  = '';
										}
										 
								?>
								<?php 	if ($value->displaytype) { ?>
											<input type="hidden" value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
								<?php 	}else { ?>
									<?php 	if ($value->uitype =='1') { ?>
										<div class="input-group txt-frm mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><?php echo $value->fieldlabel?></span>
											</div>
											<input type="text" <?=$readonly;?> value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
										</div>
									<?php  	} ?>
									<?php 	if ($value->uitype =='2') { ?>
											<div class="input-group txtarea-frm mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><?php echo $value->fieldlabel?></span>
											</div>
											<textarea type="text" <?=$readonly;?> required name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>"><?php echo $inputFieldValues[$value->columnname]; ?></textarea>
										</div>
					                <?php  	} ?>
									<?php 	if ($value->uitype =='3') { ?>
										<?php 	foreach ($allArray['dropdown'] as $drop => $down) { ?>
											<?php 	if (in_array($down->fieldname, array_keys($allArray))) { $d = $down->fieldname ; ?>
											<?php 	if ($d.'id' == $value->columnname && !empty($allArray[$down->fieldname])) { ?>
												<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>
																<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>
																<?php 	if($value->columnname == 'billcountryid'){ ?>
																	<?php 	$onchange = ' onchange="getState(this.value,\'billstateid\')"';?>
																<?php 	} else if($value->columnname == 'shipcountryid'){ ?>
																	<?php 	$onchange = ' onchange="getState(this.value,\'shipstateid\')"';?>
																<?php 	} else if($value->columnname == 'billstateid'){ ?>
																	<?php 	$onchange = ' onchange="getCity(this.value,\'billcityid\')"';?>
																<?php 	} else if($value->columnname == 'shipstateid'){ ?>
																	<?php 	$onchange = ' onchange="getCity(this.value,\'shipcityid\')"';?>
																<?php 	} else if($value->columnname == 'typeid'){ ?>
																	<?php 	$onchange = ' onchange="getTypeId(this.value,\'setgroup\',\'groupedproductname\',\'groupedproductidsDiv\')"';?>
																	<?php 	$typeid = $inputFieldValues[$value->columnname]; ?>
																<?php 	} else if($value->columnname == 'typeofbuyerid'){ ?>
																	<?php 	$onchange = ' onchange="getTypeofBuyer(this.value,\'setcompany\',\'companyname\',\'registrationno\')"';?>
																	<?php 	$typeofbuyerid = $inputFieldValues[$value->columnname]; ?>
																<?php 	} else if($value->columnname == 'saletypeid'){ ?>
																	<?php 	$onchange = ' onchange="getSaleTypeId(this.value,\'setBidDate\',\'auctionbiddingstartdate\',\'auctionbiddingenddate\')"';?>
																	<?php 	$setBidDate =$inputFieldValues[$value->columnname]; ?>
																<?php 	} else if($value->columnname == 'producttypeid'){ ?>
																	<?php 	$onchange = ' onchange="getProductTypeId(this.value,\'pcategoryid\')"';?>
																	<?php 	$producttypeid = $inputFieldValues[$value->columnname]; ?>
																<?php 	}else{	?>
																	<?php 	$onchange = '';?>
																<?php 	}	?>

																<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div">
																	<div class="input-group-prepend">
																		<span class="input-group-text"><?php echo $value->fieldlabel?></span>
																	</div>
																	<select class="form-control <?php echo $value->columnname?>" <?=$required?><?=$onchange?> name="<?php echo $value->columnname?>" id="<?php echo $value->columnname?>">
																		<option value="">Select An option</option>
																		<?php 	foreach ($allArray[$down->fieldname] as $k => $v) { if($inputFieldValues[$value->columnname] == $v[$down->fieldname.'id']) $sel = 'selected';else $sel = '';?>
																			
																			<?php if($value->columnname == 'roleid'){ ?>
																				<?php if($value->moduleid == $v['moduleid']){ ?>
																						<option value="<?=$v[$down->fieldname.'id']?>" <?=$sel?>><?=$v[$down->fieldname]?></option>
																				<?php 	}	?>
																			<?php 	}else{	?>
																				<?php 	if($value->columnname == 'pcategoryid'){ ?>
																					<?php 	if($v['producttypeid'] == $producttypeid){ ?>
																					<option value="<?=$v[$down->fieldname.'id']?>" <?=$sel?>><?=$v[$down->fieldname]?></option>
																					<?php } ?>
																				<?php 	}else{	?>
																					<option value="<?=$v[$down->fieldname.'id']?>" <?=$sel?>><?=$v[$down->fieldname]?></option>
																				<?php 	}	?>
																			<?php 	}	?>
																		<?php 	}	?>
																	</select>
																</div>
											<?php  	} ?>
											<?php  	} ?>
										<?php  	} ?>
									<?php  	} ?>
									<?php 	if ($value->uitype =='4') { ?>
										<div class="input-group txt-frm mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><?php echo $value->fieldlabel?></span>
											</div>
											<?php 	if ($this->session->userdata('role_id') == 1) { ?>
												<?php 	if (!empty(strtotime($inputFieldValues[$value->columnname])) && strtotime($inputFieldValues[$value->columnname]) > 0) { ?>
													<input type="date" <?=$readonly;?> required value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
												<?php 	}else{ ?>
													<input type="date" required value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
												<?php 	} ?>
											<?php 	}else{ ?>
												<input type="date" <?=$readonly;?> required value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
											<?php 	} ?>
										</div>
									<?php  	} ?>
									<?php 	if ($value->uitype =='5') { ?>
										<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>
											<div class="input-group txt-frm mb-3 setBidDate <?php echo $value->columnname?>Div">
												<div class="input-group-prepend">
													<span class="input-group-text"><?php echo $value->fieldlabel?></span>
												</div>
								                <?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>
								                <div class="controls input-append date form_datetime" data-date="" data-date-format="yyyy-mm-dd HH:ii:ss" data-link-field="dtp_input1">
								                    <input type="text" <?=$required?>  style="pointer-events:none;cursor:not-allowed!important;" class="form-control-calender <?php echo $value->columnname?>" value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>" readonly>
								                    <span class="add-on"><i class="icon-remove"><span class="fa fa-remove"></span></i></span>
													<span class="add-on"><i class="icon-th"><span class="fa fa-calendar"></span></i></span>
								                </div>
												<input type="hidden" id="dtp_input1" value="" /><br/>
								            </div>
											<?php $showlabellanguage++;?>
										<?php  	} ?>
									<?php  	} ?>
									<?php 	if ($value->uitype =='6') { ?>
										<div class="input-group txt-frm mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><?php echo $value->fieldlabel?></span>
											</div>
											<input type="time" <?=$readonly;?> required value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
										</div>
									<?php  	} ?>
									<?php 	if ($value->uitype =='9') { ?>
										<div class="input-group txt-frm mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><?php echo $value->fieldlabel?></span>
											</div>
											<?php if(!empty($inputFieldValues[$value->columnname]))$check = 'checked';else $check = ''; ?>
											<input type="checkbox" <?=$readonly;?> <?php echo $check; ?> style="width:1%" value="<?php echo $inputFieldValues[$value->columnname]; ?>" onclick="check(this.value,'<?php echo $value->columnname?>')" name="<?php echo $value->columnname?>" id="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
											<input type="hidden" style="width:1%" value="<?php echo $inputFieldValues[$value->columnname]; ?>" onclick="check(this.value,'<?php echo $value->columnname?>')" name="<?php echo $value->columnname?>" id="hidden<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
										</div>
									<?php  	} ?>
									<?php 	if ($value->uitype =='11') { ?>
										<div class="input-group txt-frm mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><?php echo $value->fieldlabel?></span>
											</div>
											<input type="number" <?=$readonly;?> required value="<?php echo $inputFieldValues[$value->columnname]; ?>" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" name="<?php echo $value->columnname?>" class="form-control" placeholder="0.00">
										</div>
									<?php  	} ?>
									<?php 	if ($value->uitype =='12') { ?>
										<div class="input-group txt-frm mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><?php echo $value->fieldlabel?></span>
											</div>
											<input type="number"  <?=$readonly;?> required value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
										</div>
									<?php  	} ?>
									<?php 	if ($value->uitype =='15') { ?>
										<div class="input-group txt-frm mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><?php echo $value->fieldlabel?></span>
											</div>
											<?php if(!empty(trim($inputFieldValues[$value->columnname]))){ ?>
											<input type="email" readonly required value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
											<?php  }else{ ?>
											<input type="email" <?=$readonly;?> required value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
											<?php  } ?>
										</div>
									<?php  	} ?>
									<?php 	if ($value->uitype =='16') { ?>
										<div class="input-group txt-frm mb-3" id="<?php echo $value->columnname?>Div">
											<div class="input-group-prepend">
												<span class="input-group-text"><?php echo $value->fieldlabel?></span>
											</div>
											<div class="input-group-prepend">
												<select class="input-group-text" name="<?php echo $value->columnname?>withcode" id="<?php echo $value->columnname?>withcode">
													<option value="">Select</option>
		            								<?php foreach ($allArray['countryphonecode'] as $ki => $vi) { if('+'.$vi['phonecode'] == $inputFieldValues[$value->columnname.'withcode']) $selected = 'selected';else $selected = '';?>
														<option value="+<?=$vi['phonecode']?>" <?=$selected;?>>+<?=$vi['phonecode']?></option>
													<?php 	}	 ?>
												</select>
											</div>
											<script type="text/javascript"> //$( function() { $( "#<?php echo $value->columnname?>withcode" ).combobox(); } ); </script>
											<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>
											<input type="text" onkeypress="return isNumberKey(event);" maxlength="10" <?=$required?> value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
										</div>
									<?php  	} ?>
									<?php 	if ($value->uitype =='17') { ?>
										<div style="clear: both;"></div>
										<div class="input-group txt-frm mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><?php echo $value->fieldlabel?></span>
											</div>
											<input type="file" <?=$readonly;?>  value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
										</div>
										<div style="clear: both;"></div>
										<?php if($inputFieldValues[$value->columnname]){ ?>
											<div><img src="<?php echo base_url(UPLOAD_FOLDER.$inputFieldValues[$value->columnname]); ?>" width="200px"></div>
										<?php } ?>
										<div class="row"><div class="col-md-12">&nbsp;</div></div>
										<div style="clear: both;"></div>
									<?php  	} ?>
									<?php 	if ($value->uitype =='18') { ?>
								    		<div style="width:99%;margin-bottom: 10px;" id="pass-info"></div>     
									    	<div class="input-group txt-frm mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"><?php echo $value->fieldlabel?></span>
												</div>
												<input type="password" onKeypress="passStrengthCheck('pass','cpass','pass-info')" id="pass" value="<?php echo trim($inputFieldValues[$value->columnname]);?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
												<div class="input-group-prepend">
													<span class="input-group-text"><input type="checkbox" id="showPasswordCheck" value="1" onclick="showPassword(this.value)"/>&nbsp;Show</span>
												</div>
											</div>
								<?php  } ?>
								<?php 	if ($value->uitype =='22') { ?>
											<div class="input-group txt-frm mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"><?php echo $value->fieldlabel?></span>
												</div>
												<input type="password" id="cpass" value="<?php echo trim($inputFieldValues[$value->columnname]);?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
											</div>
								<?php  	} ?>
								    <?php 	if ($value->uitype =='19') { ?>
										<div class="input-group txtarea-frm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><?php echo $value->fieldlabel?></span>
										</div>
										<textarea type="text" required name="<?php echo $value->columnname?>" id="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>"><?php echo $inputFieldValues[$value->columnname]; ?></textarea>
										<script>
			                                CKEDITOR.replace('<?php echo $value->columnname?>');
			                            </script>
									</div>
				                <?php  	} ?>
							    <?php 	if ($value->uitype =='20') { ?>
									<div class="input-group txt-frm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><?php echo $value->fieldlabel?></span>
										</div>
										<input type="url" required value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
									</div>
								<?php  	} ?>
								<?php 	if ($value->uitype =='21') { ?>
									<div style="clear: both;"></div>
									<div class="input-group txt-frm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><?php echo $value->fieldlabel?></span>
										</div>
										<input type="file" multiple accept="*" value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>[]" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
									</div>
									<div style="clear: both;"></div>
									<?php if($inputFieldValues[$value->columnname]){ ?>
										<?php  $imgArray = unserialize($inputFieldValues[$value->columnname]); ?>
						                <?php  foreach ($imgArray as $key => $value) { ?>
							                <?php $im = explode("___", $value); $im1 = explode(".", $im[1]);?>
							                <div>
												<img src="<?=base_url(UPLOAD_FOLDER.$value);?>" alt="<?=$value?>"  width="200px">
											</div>
									   	<?php } ?>
									<?php } ?>
									<div class="row"><div class="col-md-12">&nbsp;</div></div>
									<div style="clear: both;"></div>
								<?php  	} ?>
								<?php 	} ?>
							<?php 	} ?>
						<?php 	} ?>
					</div>
				<?php 	}else if($blocks->blocktype == 'multiple'){ ?>
					<div  class="table-responsive">
						<table class="table table-bordered odred odred7">
	            			<thead>
	            				<tr>
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
				            		<tr>
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
											<?php 	} ?>
										<?php 	} ?>
									<?php 	} ?>
									</tr>
					    	<?php 	}	?>
	                      	</tbody>
			            </table>
					</div>
				<?php 	} ?>
			</div>
		</div>
	<?php 	} ?>
	<div class="text-pt">
		<div class="btn-sub">
			<?php if($this->uri->segment(1) != 'profile'){  ?>
			<button type="reset" class="btn btn-primary">Discard</button>
			<?php }  ?>
			<button type="submit" name="insert" class="btn btn-primary">Save</button>
		</div>
	</div>
</form>
<script>
function check(id,key) {
	if(id == 1){
    	document.getElementById(key).value = 0;
    	document.getElementById('hidden'+key).value = 0;
    }else{
    	document.getElementById(key).value = 1;
    	document.getElementById('hidden'+key).value = 1;
    }
    console.log(document.getElementById(key).value);
    
}
</script>