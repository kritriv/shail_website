<div class="banner1">    

	<div class="log right-prt">

		<?php if($this->uri->segment(1) != 'profile'){  ?>

		<a href="<?=base_url($this->uri->segment(1).'/index')?>"> <button type="button" class="btn btn-success">View All</button></a>

		<?php } ?>

		<h4><?=$allArray['module']->modulelabel;?></h4>
		<?php $id=$allArray['module']->moduleid;?>

	</div>

</div>

<div class="clearfix"></div>

<div class="text-pt">

	<?php $this->load->view('partials/notification_messages'); ?>

</div>

<?php 	echo validation_errors(); ?>

<?php 	//var_dump(array_keys($allArray)); ?>

<?php 	//var_dump($allArray['alllanguage']); ?>



<?php 	$setBidDate = 0;$typeofbuyerid = 0;$typeid = 0;$producttypeid = 0;?>

<form method="post" enctype="multipart/form-data">

	<div class="text-pt">

		<div class="btn-sub">

			<?php if($this->uri->segment(1) != 'profile'){  ?>

				<button type="reset" class="btn btn-primary">Discard</button>

			<?php  } ?>

			<button type="submit" name="insert" class="btn btn-primary xp_submit">Save</button>

		</div>

	</div>

	<?php 	foreach ($allArray['blocks'] as $b => $blocks) { ?>

		<div class="text-pt">&nbsp;</div>

		<div class="form-prt" id="<?=$blocks->blocksid?>">

				<div class="container_fluid inn-form-prt">

					<div class="row">

							<h4 style="padding-bottom: 10px;"><?=$blocks->blocklabel?>

							<br/>

						</h4>

					</div>

					<div class=="clearfix"></div>

					<div class="row">

						<?php 	$tr = 0;foreach ($allArray['alllanguage'] as $p => $q) { ?>

								<?php $showlabellanguage = 0;?>

								<input type="hidden" value="<?php echo $q['languageid'];?>" name="languageid[]">

								<div class="input-group mb-3" style="display:block;width:100%" id="languagelabelDiv_<?=$q['languageid']?>_<?=$blocks->blocksid?>"><?php echo $q['language'];?></div>

								<?php 	foreach ($allArray['modulefield'] as $key => $value) { ?>

									<?php 	if ($value->block == $blocks->blocksid) { ?>

										<?php 	if ($value->displaytype) { ?>

													<input type="hidden" value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">

										<?php 	}else { ?>

											<?php 	if ($value->uitype =='1') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<input type="text" <?=$required?> value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname.trim($q["language"])?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>">

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='2') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txtarea-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<textarea type="text" <?=$required?> name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname.trim($q["language"])?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>"><?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?></textarea>

													</div>

								        			<?php $showlabellanguage++;?>

										        <?php  	} ?>

							                <?php  	} ?>

											<?php 	if ($value->uitype =='3') { ?>

												<?php 	if ($tr == 0) { ?>

													<?php 	foreach ($allArray['dropdown'] as $drop => $down) { ?>

														<?php 	if (in_array($down->fieldname, array_keys($allArray))) { $d = $down->fieldname ; ?>

														<?php 	if ($d.'id' == $value->columnname) { ?>

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

																	<?php 	//$setBidDate = $inputFieldValues[$value->columnname]; 

																			if (!empty($inputFieldValues[$value->columnname])){

																				if($inputFieldValues[$value->columnname] == $v[$down->fieldname.'id']){

																					$setBidDate = $inputFieldValues[$value->columnname];

																				}	

																			} else if(!empty(set_value($value->columnname))){

																				if(set_value($value->columnname)== $v[$down->fieldname.'id']){

																					$setBidDate = set_value($value->columnname);

																				}

																			}

																	?>

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

																		<?php 	foreach ($allArray[$down->fieldname] as $k => $v) { 

																			if (!empty($inputFieldValues[$value->columnname])){

																				if($inputFieldValues[$value->columnname] == $v[$down->fieldname.'id']){

																					$sel = 'selected';

																					$setBidDate = $inputFieldValues[$value->columnname];

																				}else{

																					$sel = '';

																				}	

																			} else if(!empty(set_value($value->columnname))){

																				if(set_value($value->columnname)== $v[$down->fieldname.'id']){

																					$sel = 'selected';

																					$setBidDate = set_value($value->columnname);

																				}else{

																					$sel = '';

																				}

																			}else{

																				$sel = '';

																			}?>

																			

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

											<?php  	} ?>

											<?php 	if ($value->uitype =='4') { ?>

												<?php 	if ($tr == 0 && $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<input type="date" <?=$required?> value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>">

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='5') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 setBidDate <?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

										                <?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

										                <div class="controls input-append date form_datetime" data-date="" data-date-format="yyyy-mm-dd HH:ii:ss" data-link-field="dtp_input1">

										                    <input type="text" <?=$required?>  style="pointer-events:none;cursor:not-allowed!important;" class="form-control-calender <?php echo $value->columnname?>" value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>" readonly>

										                    <span class="add-on"><i class="icon-remove"><span class="fa fa-remove"></span></i></span>

															<span class="add-on"><i class="icon-th"><span class="fa fa-calendar"></span></i></span>

										                </div>

														<input type="hidden" id="dtp_input1" value="" /><br/>

										            </div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='6') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<input type="time" <?=$required?> value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>">

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='9') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php if(!empty($inputFieldValues[$value->columnname]))$check = 'checked';else $check = ''; ?>

														<input type="checkbox" <?php echo $check; ?> style="width:1%" value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" onclick="check(this.value,'<?php echo $value->columnname?>')" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">

														<input type="hidden" style="width:1%" value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" name="<?php echo $value->columnname?>[]" id="hidden<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='10') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<?php  if($value->readonly) $readonly = 'readonly';else $readonly = ''; ?>

														<input type="text" <?=$required?> <?=$readonly?> value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>">

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='11') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<input type="number" <?=$required?> value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" class="form-control <?php echo $value->columnname?>" placeholder="0.00">

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='12') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<input type="text" onkeypress="return isNumberKey(event);" maxlength="6" <?=$required?> value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>">

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='15') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?> <span id="uEmailSpan"></span></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<?php  if(!empty(trim($inputFieldValues[$value->columnname])) && $inputFieldValues[$value->readonly] == 1 && $this->uri->segment(2) == 'edit'){ ?>

															<input type="email" readonly <?=$required?> value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" onkeyup="checkExist(this.value,'uEmailSpan','<?php echo $value->columnname?>')" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>">

														<?php  }else{ ?>

															<input type="email" <?=$required?> value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" onkeyup="checkExist(this.value,'uEmailSpan','<?php echo $value->columnname?>')" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>">

														<?php  } ?>

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='16') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<div class="input-group-prepend">

															<?php if($this->uri->segment(1) == 'buyer') { ?>

																<select class="input-group-text" name="<?php echo $value->columnname?>withcode_" id="<?php echo $value->columnname?>withcode">

																	<option value="0">Select</option>

																	<?php foreach ($allArray['countryphonecode'] as $ki => $vi) { if('+'.$vi['phonecode'] == $inputFieldValues[$value->columnname.'withcode']) $selected = 'selected';else $selected = '';?>

																		<option value="+<?=$vi['phonecode']?>" <?=$selected;?>>+<?=$vi['phonecode']?></option>

																	<?php 	}	 ?>

																</select>

															<?php 	}else{	 ?>

																<select class="input-group-text" name="<?php echo $value->columnname?>withcode" id="<?php echo $value->columnname?>withcode">

																	<option value="0">Select</option>

																	<?php foreach ($allArray['countryphonecode'] as $ki => $vi) { if('+'.$vi['phonecode'] == $inputFieldValues[$value->columnname.'withcode']) $selected = 'selected';else $selected = '';?>

																		<option value="+<?=$vi['phonecode']?>" <?=$selected;?>>+<?=$vi['phonecode']?></option>

																	<?php 	}	 ?>

																</select>

															<?php 	}	 ?>

														</div>

														<script type="text/javascript"> $( function() { $( "#<?php echo $value->columnname?>withcode" ).combobox(); } ); </script>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<input type="text" onkeypress="return isNumberKey(event);" maxlength="10" <?=$required?> value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>" id="<?php echo $value->columnname?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>">

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											

											

											<?php 	if ($value->uitype =='17') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div style="clear: both;"></div>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<input type="file" accept="*"  name="<?php echo $value->columnname?>" id="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">

													</div>
														<span id='response' style="color: red;
    font-size: larger;"></span> 

													<div style="clear: both;"></div>

													<div style="width:100%; margin-bottom: 10px;" class="box-imge">

													<?php if($inputFieldValues[$value->columnname]){ $i=0;?>

															<div id="div_<?=$i?>_<?php echo $value->columnname?>">

																<img src="<?php echo base_url(UPLOAD_FOLDER.$inputFieldValues[$value->columnname]); ?>" width="23%">

																<input type="button" class="form-control" style="width:23%" value="Remove This" onclick="singleRemove(<?=$this->uri->segment(3)?>,'<?=$inputFieldValues[$value->columnname]?>','<?php echo $value->columnname?>','<?=$i?>')">

															</div>

					                

													<?php } ?>

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php 	} ?>

											<?php 	if ($value->uitype =='18') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

										    		<div style="width:99%;margin-bottom: 10px;" id="pass-info"></div>     

											    	<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<input type="password" onKeypress="passStrengthCheck('pass','cpass','pass-info')" id="pass" value="<?php echo trim($inputFieldValues[$value->columnname]);?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">

														<div class="input-group-prepend">

															<span class="input-group-text"><input type="checkbox" id="showPasswordCheck" value="1" onclick="showPassword(this.value)"/>&nbsp;Show</span>

														</div>

													</div>

													<?php $showlabellanguage++;?>

												<?php  } ?>

											<?php  } ?>

											<?php 	if ($value->uitype =='22') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

										    			<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div">

															<div class="input-group-prepend">

																<span class="input-group-text"><?php echo $value->fieldlabel?></span>

															</div>

															<input type="password" id="cpass" value="<?php echo trim($inputFieldValues[$value->columnname]);?>" name="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">

														</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

										    <?php  	} ?>

										    <?php 	if ($value->uitype =='23') { ?>

										    	<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

										    		<div style="width:99%;margin-bottom: 10px;" id="pass-info"></div>     

											    	<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<input type="password" id="pass_" value="<?php echo trim($inputFieldValues[$value->columnname]);?>" name="<?php echo $value->columnname?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>">

														<div class="input-group-prepend">

															<span class="input-group-text"><input type="checkbox" id="showPasswordCheck_" value="1" onclick="showPassword_(this.value)"/>&nbsp;Show</span>

														</div>

													</div>

													<?php $showlabellanguage++;?>

												<?php  } ?>

											<?php  } ?>

											<?php 	if ($value->uitype =='19') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

										    		<div class="input-group txtarea-frm mb-3 <?php echo $value->columnname?>Div" id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<textarea type="text" <?=$required?> name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?><?php echo $q['languageid'];?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>"><?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?></textarea>

														<script>

							                                CKEDITOR.replace('<?php echo $value->columnname.$q["languageid"]?>');

							                            </script>

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

							                <?php  	} ?>

										    <?php 	if ($value->uitype =='20') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

											    	<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<input type="url" <?=$required?> value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" name="<?php echo $value->columnname?>[]"  id="<?php echo $value->columnname?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>">

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

										<?php 	if ($value->uitype =='210') { ?>
								<div style="clear: both;"></div>
								<div class="input-group txt-frm mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><?php echo $value->fieldlabel?></span>
									</div>
									<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>
									<input type="file" multiple accept="*" value="<?php echo $inputFieldValues[$value->columnname]; ?>" name="<?php echo $value->columnname?>[]" class="form-control" placeholder="<?php echo $value->fieldlabel?>">
								</div>
								<div style="clear: both;"></div>
								<div style="width:100%;" class="row">
									<?php $i=0;foreach ($allArray['multiimage'] as $ks => $vs) {?> 
				                        <div class="col-md-3 div_<?=$i?>_multiimageDiv" id="div_<?=$i?>__multiimageDiv">
							        			<img src="<?=base_url(UPLOAD_FOLDER.$vs['multiimage']);?>" alt="<?=$vs['multiimage']?>"  width="100%">
							        			<input type="button" class="form-control" style="width:100%" value="Remove This" onclick="multiRemoveimg(<?=$this->uri->segment(3)?>,'<?=$vs['multiimageid']?>','<?=$vs['multiimage']?>','multiimage',<?=$i?>)">
							        		</div>
			                    <?php	$i++;} ?>
							     </div>
								<?php // if($inputFieldValues[$value->columnname]){ ?>
									<?php // $imgArray = unserialize($inputFieldValues[$value->columnname]); ?>
					                <!--<div style="width:100%;" class="row">
								    <?php // $i=0;foreach ($imgArray as $ke => $valu) { ?>
						                <div class="col-md-3 div_<?=$i?>_<?php echo $value->columnname?>" id="div_<?=$i?>_<?php echo $value->columnname?>">
						        			<img src="<?=base_url(UPLOAD_FOLDER.$valu);?>" alt="<?=$valu?>"  width="100%">
						        			<input type="button" class="form-control" style="width:100%" value="Remove This" onclick="multiRemove(<?=$this->uri->segment(3)?>,'<?=$valu?>','<?php echo $value->columnname?>',<?=$i?>)">
						        		</div>
									<?php //$i++;} ?>
									</div>-->
								<?php// } ?>
								<div class="row"><div class="col-md-12">&nbsp;</div></div>
								<div style="clear: both;"></div>
							<?php  	} ?>
										<?php 	if ($value->uitype =='37') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div style="clear: both;"></div>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<input type="file" multiple accept="*" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" class="form-control" placeholder="<?php echo $value->fieldlabel?>">

													</div>

													<div style="clear: both;"></div>

													<?php if($inputFieldValues[$value->columnname]){ ?>

														<?php  $imgArray = unserialize($inputFieldValues[$value->columnname]); ?>

										                <div style="width:100%;" class="row">

													    <?php  $i=0;foreach ($imgArray as $ke => $valu) { ?>

											                <div class="col-md-3 div_<?=$i?>_<?php echo $value->columnname?>Div" id="div_<?=$i?>_<?php echo $value->columnname?>Div">

											                	<a href="<?=base_url(UPLOAD_FOLDER.$valu);?>"><?=$valu?></a>

											        			<input type="button" class="form-control" style="width:100%" value="Remove This" onclick="multiRemove(<?=$this->uri->segment(3)?>,'<?=$valu?>','<?php echo $value->columnname?>',<?=$i?>)">

											        		</div>

														<?php $i++;} ?>

														</div>

													<?php } ?>

													<div class="row"><div class="col-md-12">&nbsp;</div></div>

													<div style="clear: both;"></div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php 	} ?>

											<?php 	if ($value->uitype =='24') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<input readonly <?=$required?> value="<?php if (!empty($inputFieldValues[$value->columnname])) echo $inputFieldValues[$value->columnname];else echo set_value($value->columnname)[$tr];?>" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>">

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='25') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<?php  $typeofdata = explode('~', $value->typeofdata); if(strtoupper($typeofdata[1]) == 'M') $required = 'required';else $required = ''; ?>

														<input type="number" <?=$required?> value="0" name="<?php echo $value->columnname?>[]" id="<?php echo $value->columnname?>" class="form-control <?php echo $value->columnname?>" placeholder="<?php echo $value->fieldlabel?>">

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='26') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<select class="form-control <?php echo $value->columnname?>" name="<?php echo $value->columnname?>" id="<?php echo $value->columnname.trim($q["language"])?>">

															<option value="">Select An option</option>

															<?php 	foreach ($allArray['templates'] as $k => $v) { ?>

																	<?php  	if($v == $inputFieldValues[$value->columnname]){ $sel = 'selected';}else{$sel = '';}?>

																	<option value="<?=$v;?>" <?=$sel?>><?=$v;?></option>

															<?php 	}	?>

														</select>

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											

											<?php 	if ($value->uitype =='27') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<select class="form-control <?php echo $value->columnname?>" name="<?php echo $value->columnname?>" id="<?php echo $value->columnname.trim($q["language"])?>">

															<option value="">Select An option</option>

															<?php 	foreach ($allArray[$value->columnname] as $k => $v) { ?>

																	<?php  	if($v['postcategoryid'] == $inputFieldValues[$value->columnname]){ $sel = 'selected';}else{$sel = '';}?>

														

																	<option value="<?=$v['postcategoryid'];?>" <?=$sel?>><?=$v['category']?></option>

															<?php 	}	?>

														</select>

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											

											<?php 	if ($value->uitype =='38') {

											?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<select class="form-control <?php echo $value->columnname?>" name="<?php echo $value->columnname?>" id="<?php echo $value->columnname.trim($q["language"])?>">

															<option value="">Select An option</option>

															<?php foreach ($allArray[producttype] as $k => $v) { ?>

																	<?php  	if($v['producttypeid'] == $inputFieldValues[$value->columnname]){ $sel = 'selected';}else{$sel = '';}?>

														

																	<option value="<?=$v['producttypeid'];?>" <?=$sel?>><?=$v['producttype']?></option>

															<?php 	}	?>

														</select>

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='39') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txt-frm mb-3 <?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<select class="form-control <?php echo $value->columnname?>" name="<?php echo $value->columnname?>" id="<?php echo $value->columnname.trim($q["language"])?>">

															<option value="">Select An option</option>

															<?php foreach ($allArray[productname] as $k => $v) { ?>

																	<?php  	if($v['productid'] == $inputFieldValues[$value->columnname]){ $sel = 'selected';}else{$sel = '';}?>

														

																	<option value="<?=$v['productid'];?>" <?=$sel?>><?=$v['productname']?></option>

															<?php 	}	?>

														</select>

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='28') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txtarea-frm mb-3 <?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<div class="row" style="height:268px;overflow-y:scroll">

														<?php 	foreach ($allArray[$value->columnname] as $k => $v) { ?>

																<?php 	if(!empty($v['multiimages'])){?>

																	<div class="col-md-2" style="margin-bottom: 10px;">

																		<?php  	if(in_array($v['mediaid'], explode(",", $inputFieldValues[$value->columnname]))){ $sel = 'checked';}else{$sel = '';}?>

																		<p style="background:#ccc;margin: auto;">

								                                        	<input type="checkbox" <?=$sel?> name="<?php echo $value->columnname?>[]" value="<?=$v['mediaid']?>"><?=$v['mediatitle'];?>

								                                        </p>

								                                        <img src="<?=base_url(UPLOAD_FOLDER.$v['multiimages'])?>" class="img-responsive" style="height:100px; width: 100%;    margin: auto;">

								                                    </div>

							                                    <?php 	}	?>

														<?php 	}	?>

														</div>

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='29') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<div class="input-group txtarea-frm mb-3 <?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<div class="row" style="height:268px;overflow-y:scroll">

														<?php 	foreach ($allArray[$value->columnname] as $k => $v) { ?>

																<div class="col-md-3" style="margin-bottom: 10px;">

																	<?php  	if(in_array($v['pageid'], explode(",", $inputFieldValues[$value->columnname]))){ $sel = 'checked';}else{$sel = '';}?>

																	<p style="background:#ccc;margin: auto;">

							                                        	<input type="checkbox" <?=$sel?> name="<?php echo $value->columnname?>[]" value="<?=$v['pageid']?>"><?=$v['pagetitle'];?>

							                                        </p>

							                                    </div>

														<?php 	}	?>

														</div>

													</div>

													<?php $showlabellanguage++;?>

												<?php  	} ?>

											<?php  	} ?>

											<?php 	if ($value->uitype =='30') { ?>

												<?php 	if ($tr == 0 || $value->multilanguagefield != 1) { ?>

													<?php if($inputFieldValues['typeid'] == 2 || $inputFieldValues['typeid'] == '') $cc = ' style="display:none"';else $cc = 'class="input-group txtarea-frm mb-3"';?>

													<div <?=$cc?> id="<?php echo $value->columnname?>Div">

														<div class="input-group-prepend">

															<span class="input-group-text"><?php echo $value->fieldlabel?></span>

														</div>

														<select class="itemName form-control" style="width:100%" name="<?php echo $value->columnname?>[]" multiple="multiple">

															<?php 	foreach ($allArray['recordsAll'] as $k => $v) { ?>

																	<?php  	if(in_array($v[$this->uri->segment(1).'id'], explode(",", $inputFieldValues[$value->columnname]))){ $sel = 'selected';}else{$sel = '';}?>

																	<option value="<?=$v[$this->uri->segment(1).'id'];?>" <?=$sel?>><?=$v[$this->uri->segment(1).'name']?></option>

															<?php 	}	?>

														</select>

													</div>

												<?php  	} ?>

											<?php  	} ?>

										<?php 	} ?>

									<?php 	} ?>

								<?php 	} ?>

								<?php 	if(empty($showlabellanguage)) {	?>

									<script type="text/javascript">$("#languagelabelDiv_<?=$q['languageid']?>_<?=$blocks->blocksid?>").css('display','none');</script>

								<?php 	}	?>

								

						<?php 	$tr++;} ?>

					</div>

				</div>

		</div>

	<?php 	} ?>

	<div class="text-pt">

		<div class="btn-sub">

			<?php if($this->uri->segment(1) != 'profile'){  ?>

			<button type="reset" class="btn btn-primary">Discard</button>

			<?php }  ?>

			<button type="submit" name="insert" class="btn btn-primary xp_submit">Save</button>

		</div>

	</div>

</form>

<?php 	if(empty($typeid) || $typeid == 2){ ?>

	<script type="text/javascript">//$('#groupedproductidsDiv').hide();$('#groupedproductnameDiv').hide();</script>

<?php 	} ?>

<?php 	if(empty($setBidDate) || $setBidDate == 2){ ?>

	<script type="text/javascript">//$('.setBidDate').hide();$('.setBidDate').css('display','none');

		$('.auctionbiddingstartdate').css('pointer-events','none');

		$('.auctionbiddingstartdate').css('cursor','not-allowed');

		$('.auctionbiddingenddate').css('pointer-events','none');

		$('.auctionbiddingenddate').css('cursor','not-allowed');

	</script>

<?php 	} ?>

<?php 	if(empty($typeofbuyerid) || $typeofbuyerid == 1){ ?>

	<script type="text/javascript">//$('#companynameDiv').hide();$('#registrationnoDiv').hide();</script>

<?php 	} ?>





<?php 	if(empty($typeid) || $typeid == 2){ ?>

	<script type="text/javascript">$('.groupedproductidsDiv').hide();$('.groupedproductnameDiv').hide();</script>

<?php 	}else{ ?>

	<script type="text/javascript">$('.productnameDiv').hide();</script>

<?php 	} ?>



<?php 	if(empty($setBidDate) || $setBidDate == 2){ ?>

	<script type="text/javascript">$('.setBidDate').hide();$('.setBidDate').css('display','none');</script>

<?php 	} ?>

<?php 	if(empty($typeofbuyerid) || $typeofbuyerid == 1){ ?>

	<script type="text/javascript">$('.companynameDiv').hide();$('.registrationnoDiv').hide();</script>

<?php 	} ?>

<script>

    var roleid= '<?php echo $this->session->userdata["role_id"]?>';
    var modname = '<?php echo $this->uri->segment(1)?>';
    var mode='<?php echo $this->uri->segment(2)?>';
    if(roleid=='5'){
        if(modname =='post'){
        $('#shortcontentDiv').css('display','none');
        $('#60').css('display','none');
        $('#61').css('display','none');
        $('.templateDiv').css('display','none');
        $('#pagesubtitleDiv').css('display','none');
        $('.parentcategoryDiv').css('display','none');
        $('#categoryEnglish').change(function() {
        var categoryEnglish=$('#categoryEnglish').val();
            if(categoryEnglish=='11'){
            $('#mainimageDiv').css('display','none');
            $('#fullcontentDiv').css('display','none');
            $('#posttitleDiv').css('display','none');
            $('#postsubtitleDiv').css('display','block');
            $('.statusidDiv').show();
            }else if(categoryEnglish=='10'){
            $('#postsubtitleDiv').css('display','none');
            $('#mainimageDiv').show();
            $('#fullcontentDiv').css('display','block');
            $('.statusidDiv').show();
            $('#posttitleDiv').show();
            }else if(categoryEnglish=='14'){
            $('#posttitleDiv').show();
            $('#postsubtitleDiv').css('display','none');
            $('#mainimageDiv').show();
            $('#fullcontentDiv').css('display','block');
            $('.statusidDiv').show();
            }else{
            $('#fullcontentDiv').css('display','none');
            $('#mainimageDiv').css('display','none');
            $('#posttitleDiv').css('display','none');
            $('#postsubtitleDiv').css('display','none');
            $('.statusidDiv').css('display','none');
            }
        });
            if(mode !='edit'){
                $("#categoryEnglish option[value='9']").remove();
                //$("#categoryEnglish option[value='14']").remove();
                $("#categoryEnglish option[value='67']").remove();
                var categoryEnglish=$('#categoryEnglish').val();
                if(categoryEnglish=='11'){
                $('#mainimageDiv').css('display','none');
                $('#fullcontentDiv').css('display','none');
                $('#posttitleDiv').css('display','none');
                $('#postsubtitleDiv').css('display','block');
                }else if(categoryEnglish=='10'){
                $('#postsubtitleDiv').css('display','none');
                $('#mainimageDiv').show();
                $('#fullcontentDiv').css('display','block');
                }else if(categoryEnglish=='14'){
                $('#posttitleDiv').show();
                $('#postsubtitleDiv').css('display','none');
                $('#mainimageDiv').show();
                $('#fullcontentDiv').css('display','block');
                $('.statusidDiv').css('display','none');
                }else if(categoryEnglish=='9'){
                $('#posttitleDiv').css('display','none');
                $('#postsubtitleDiv').css('display','none');
                $('#mainimageDiv').show();
                $('#fullcontentDiv').css('display','none');
                //$('#statusidDiv').css('display','none');
                }else if(categoryEnglish=='67'){
                $('#posttitleDiv').css('display','none');
                $('#postsubtitleDiv').css('display','none');
                $('#mainimageDiv').css('display','none');
                $('#fullcontentDiv').css('display','block');
                //$('#statusidDiv').css('display','none');
                }else{
                $('#fullcontentDiv').css('display','none');
                $('#mainimageDiv').css('display','none');
                $('#posttitleDiv').css('display','none');
                $('#postsubtitleDiv').css('display','none');
                $('.statusidDiv').css('display','none');
                }            
            }else{
                var categoryEnglish=$('#categoryEnglish').val();
                if(categoryEnglish=='11'){
                $('#mainimageDiv').css('display','none');
                $('#fullcontentDiv').css('display','none');
                $('#postsubtitleDiv').css('display','block');
                $('#posttitleDiv').css('display','none');
                }else if(categoryEnglish=='10'){
                $('#postsubtitleDiv').css('display','none');
                $('#mainimageDiv').show();
                $('#fullcontentDiv').css('display','block');
                }else if(categoryEnglish=='14'){
                $('#postsubtitleDiv').css('display','none');
                $('#posttitleDiv').show();
                $('#mainimageDiv').show();
                $('#fullcontentDiv').css('display','block');
                //$('.statusidDiv').css('display','none');
                }else if(categoryEnglish=='9'){
                $('#posttitleDiv').css('display','none');
                $('#postsubtitleDiv').css('display','none');
                $('#mainimageDiv').show();
                $('#fullcontentDiv').css('display','none');
                //$('.statusidDiv').css('display','none');
                }else if(categoryEnglish=='67'){
                $('#posttitleDiv').css('display','none');
                $('#postsubtitleDiv').css('display','none');
                $('#mainimageDiv').css('display','none');
                $('#fullcontentDiv').css('display','block');
                $('.statusidDiv').css('display','none');
                }else{
                $('#fullcontentDiv').css('display','none');
                $('#mainimageDiv').css('display','none');
                $('#posttitleDiv').css('display','none');
                $('#postsubtitleDiv').css('display','none');
                $('.statusidDiv').css('display','none');
                }            
                $('.categoryDiv').css('display','none');
            }
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
        }else if(modname =='social'){
        $('#socialtitle').css('display','none');
        $('#socialicon').css('display','none');
        }else{
        $('#mainimageDiv').css('display','none');
        $('#60').css('display','none');
        $('#61').css('display','none');
        $('.templateDiv').css('display','none');
        $('#pagesubtitleDiv').css('display','none');
        $('.parentcategoryDiv').css('display','none');
        $('#pagetitleDiv').css('display','none');
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
        $('#fullcontentDiv').css('display','none');
        $('#pagetitleDiv').css('display','none');
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
	function getTypeofBuyer(id,field,field1,field2){

		if(id == 1){

			$("#"+field1+"Div").css('display','none');

			$("#"+field2+"Div").css('display','none');

			$("#"+field1).val('');

			$("#"+field2).val('');



			$("."+field1+"Div").css('display','none');

			$("."+field2+"Div").css('display','none');

			$("."+field1).val('');

			$("."+field2).val('');

		}else{

			$("#"+field1+"Div").css('display','flex');

			$("#"+field2+"Div").css('display','flex');

			$("."+field1+"Div").css('display','flex');

			$("."+field2+"Div").css('display','flex');

		}

	}

	function getTypeId(id,field,field1,field2){

		if(id == 2){

			$("#"+field1+"Div").css('display','none');

			$('#'+field2).removeClass('txtarea-frm');

			$('#'+field2).css('display','none');

			$("#"+field1).val('');

			$("#"+field2).val('');



			$("."+field1+"Div").css('display','none');

			$('.'+field2).removeClass('txtarea-frm');

			$('.'+field2).css('display','none');

			$('.productnameDiv').css('display','flex');

			$("."+field1).val('');

			$("."+field2).val('');

		}else{

			$('#'+field2).addClass('txtarea-frm');

			$('#'+field2).css('display','flex');

			$("#"+field1+"Div").css('display','flex');

		

			$('.'+field2).addClass('txtarea-frm');

			$('.'+field2).css('display','flex');

			$("."+field1+"Div").css('display','flex');

			$('.productnameDiv').css('display','none');

			$(".productname").val('');

			$(".productname").val('');

		}

	}

	function getSaleTypeId(id,field,field1,field2){

		console.log(id);

		if(id == 2){

			$('.'+field).css('display','none');

			$("#"+field1).val('');

			$("#"+field2).val('');

			$("."+field1).val('');

			$("."+field2).val('');

		}else{

			$('.'+field).css('display','flex');

			$('.'+field1).css('pointer-events','none');

			$('.'+field1).css('cursor','not-allowed');

			$('.'+field2).css('pointer-events','none');

			$('.'+field2).css('cursor','not-allowed');

		}

	}

	function check(id,key) {

		if(id == 1){

	    	document.getElementById(key).value = 0;

	    	document.getElementById('hidden'+key).value = 0;

	    }else{

	    	document.getElementById(key).value = 1;

	    	document.getElementById('hidden'+key).value = 1;

	    }

	}

	function showPassword(id){

		if(id == 1){

			document.getElementById('showPasswordCheck').value = 0;

	    	$('#pass').attr('type','text');

		}else{

			document.getElementById('showPasswordCheck').value = 1;

	    	$('#pass').attr('type','password');

		}

	}

	function showPassword_(id){

		if(id == 1){

			document.getElementById('showPasswordCheck_').value = 0;

	    	$('#pass_').attr('type','text');

		}else{

			document.getElementById('showPasswordCheck_').value = 1;

	    	$('#pass_').attr('type','password');

		}

	}

	function getProductTypeId(id,field){

            $.ajax({

                type: "POST",

                url: "<?=str_replace('/admin', '', base_url())?>db/get-category.php",

                data: {'field':id},

                cache: false,

                success: function(data){

                	console.log(data);

                    $('#'+field).html('<option value=""> Select An option</option>'+data);

                }

            });

    }

    function multiRemoveimg(recordid,id,filename,columnname,i){
		$.ajax({
	        type: "POST",
	        url: "<?=str_replace('/admin', '', base_url())?>db/deletemultiimage.php",
	        data: {'recordid':recordid,'id':id,'columnname':columnname,'filename':filename,'t':1},
	        cache: false,
	        success: function(data){
	        	console.log(data);
	        	console.log('#div_'+i+'_'+columnname);
	                $('.div_'+i+'_'+columnname+'Div').hide();
	        }
	    });
	}
	function multiRemove(id,filename,columnname,i){
		$.ajax({
	        type: "POST",
	        url: "<?=base_url($this->uri->segment(1))?>/deleteimage",
	        data: {'id':id,'columnname':columnname,'filename':filename,'t':1},
	        cache: false,
	        success: function(data){
	        	console.log(data);
	            if (data != 0) {
	                $('.div_'+i+'_'+columnname+'Div').hide();
	            };
	        }
	    });
	}
	function singleRemove(id,filename,columnname,i){
		$.ajax({
	        type: "POST",
	        url: "<?=base_url($this->uri->segment(1))?>/deleteimage",
	        data: {'id':id,'columnname':columnname,'filename':filename,'t':''},
	        cache: false,
	        success: function(data){
	            console.log(data);
	            if (data != 0) {
	                $('#div_'+i+'_'+columnname).hide();
	            };
	        }
	    });
	}
	$('.itemName').select2({

        placeholder: 'Select an item',

        ajax: {

          	url: "<?=str_replace('/admin', '', base_url())?>db/ajaxproduct-like.php",

          	dataType: 'json',

          	delay: 250,

          	processResults: function (data) {

            	return {

              		results: data

            	};

          	},

          	cache: true

        }

    });

</script>

<script type="text/javascript">

	$(function () {

		//$('#auctionbiddingstartdate').datetimepicker({format: 'DD-MM-YYYY HH:mm:ss'});

		//$('#auctionbiddingenddate').datetimepicker({format: 'DD-MM-YYYY HH:mm:ss'});

		var maxDate = getAdjustedDate(+30);

	    var minDate = getAdjustedDate(-10);

	    var tempDt = new Date();

	    console.log("today: "+tempDt.getDate());

	    console.log("minDate: "+minDate);

	    console.log("maxDate: "+maxDate);

	    $('.form_datetime').datetimepicker({

	    	dateFormat: "dd-mm-yy", 

	    	timeFormat: "HH:mm:ss",

	        weekStart: 1,

	        todayBtn:  1,

			autoclose: 1,

			todayHighlight: 1,

			startView: 2,

			forceParse: 0,

	        showMeridian: 1,

	        minDate:minDate

	    });

		

	});

	var getAdjustedDate = function (adjustment) {

	    var today = new Date();

	    today.setDate(today.getDate() + adjustment);



	    var dd = today.getDate()-1;

	    var mm = today.getMonth()+1; //January is 0!



	    var yyyy = today.getFullYear();

	    if(dd<10){

	        dd='0'+dd

	    };



	    if(mm<10){

	        mm='0'+mm

	    };



	    return mm+'-'+dd+'-'+yyyy;

	};

</script>
<script>
$(document).ready(function(){

 var _URL = window.URL || window.webkitURL;
var mdid='<?php echo $id ?>';//alert(mdid);
var pcat='<?php echo $inputFieldValues['category']?>';
if(mdid==1000){
 $('#mainimage').change(function () {
  var file = $(this)[0].files[0];

  img = new Image();
  var imgwidth = 0;
  var imgheight = 0;
  if(pcat==9){
  var maxwidth = <?php echo IMAGE_WIDTH_PAID_BANNER ?>;
  var maxheight = <?php echo IMAGE_HEIGHT_PAID_BANNER ?>;
  }else if(pcat==14){
  var maxwidth = <?php echo IMAGE_WIDTH_Birders_Arena ?>;
  var maxheight = <?php echo IMAGE_HEIGHT_Birders_Arena ?>;
  }
  else if(pcat==10){
  var maxwidth = <?php echo IMAGE_WIDTH_Testimonials ?>;
  var maxheight = <?php echo IMAGE_HEIGHT_Testimonials ?>;
  }else{
	  
	  var maxwidth = 0;
  var maxheight = 0; 
  
  }
  
 
  img.src = _URL.createObjectURL(file);
  img.onload = function() {
   imgwidth = this.width;
   imgheight = this.height;
 
   $("#width").text(imgwidth);
   $("#height").text(imgheight);
   if(imgwidth <= maxwidth && imgheight <= maxheight){
 
    var formData = new FormData();
    formData.append('fileToUpload', $('#file')[0].files[0]);

   }else{
   $("#response").text("Image size must be "+maxwidth+"X"+maxheight);
   $("#mainimage").val('');
   $("#mainimage").focus();
  }
 };
 img.onerror = function() {
 
  $("#response").text("not a valid file: " + file.type);
 }

 });
}});
</script>