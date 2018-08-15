<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'customer-form',
	//'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>



	<?php echo $form->errorSummary($model); ?>

<div class ="view">

	<div class="imgleft">
		<br>
		<br>
		<?php 
			//echo"<figure class='cap-left'>"; // untuk hover  ubah foto

			$repo = "repository/customer/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultuser.jpg");
			if($model->foto_customer != ""){
				$file = $repo.$model->foto_customer;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayformFile($repo , $model->foto_customer);
				}else{
					echo $DEF_FILE;
				}
			}else{
				echo $DEF_FILE;
			}	

			//$url = Yii::app()->createUrl("crew/uploadfoto");
			//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Foto Profil</a>';
			//echo"<figcaption><a href='$url'class='various fancybox.ajax' style='color:#ffffff;'>".Yii::t('strings','Upload Photo')." </a></figcaption>"; 
			//echo"</figure>";  // untuk hover  ubah foto
			
		?>
	
	<?php echo $form->fileFieldRow($model,'foto_customer',array('style'=>'width:200px','margin-left:-75px','maxlength'=>250)); ?>
	</div>

	<h4 style="color:#BD362F;"> Personal Customer Info </h4>

	<?php //echo $form->textFieldRow($model,'CustomerNumber',array('class'=>'span5','maxlength'=>32)); ?>

	

	

	<?php echo $form->textFieldRow($model,'CompanyName',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'CustomerCode',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'Acronym',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textAreaRow($model,'Address',array('rows'=>3, 'cols'=>50, 'class'=>'span6')); ?>

	<?php /* <div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="Customer_Street"><?php echo $model::model()->getAttributeLabel('Street'); ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo $form->textField($model,'Street',array('size'=>5,'maxlength'=>5,'class'=>'span5')); ?>
		<?php echo $form->error($model,'Street'); ?>
	</div>
</div>
*/ ?>

	<?php //echo $form->textFieldRow($model,'address_line1',array('class'=>'span5','maxlength'=>255)); ?>

	<br><br>

	<?php //echo $form->textFieldRow($model,'address_line2',array('class'=>'span5','maxlength'=>255)); ?>

	<?php //echo $form->textFieldRow($model,'Street',array('class'=>'span5','maxlength'=>32)); ?>

	

	<?php echo $form->textFieldRow($model,'City',array('class'=>'span5','maxlength'=>32)); ?>


	<?php echo $form->textFieldRow($model,'PostalCode',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NPWP',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Telephone',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'FaxNumber',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'Email',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ContactName',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textFieldRow($model,'VATreg',array('class'=>'span5','maxlength'=>32)); ?>

</div>

<h4 style="color:#BD362F; margin-top:20px;"> Status Info </h4>

	<div class="view">
	

	<?php echo $form->dropDownListRow($model,'GroupCategory',array('GROUP'=>'GROUP', 'NON-GROUP'=>'NON-GROUP'),array('prompt'=>'--Select--','class'=>'span3'));?>

	<?php echo $form->dropDownListRow($model,'TypeCategory',array('COAL'=>'COAL', 'NON-COAL'=>'NON-COAL'),array('prompt'=>'--Select--','class'=>'span3'));?>

	</div>

<?php /* ini dimatikan

<div class="view">
<h4 style="color:#BD362F;"> Payment Info </h4>
	


	


	<?php echo $form->textFieldRow($model,'BankName',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'BranchAddress',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'BankCity',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'AccountName',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'AccountNumber',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->dropDownListRow($model,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency_type'),
    array('class'=>'span2'));?>

	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<?php //echo $form->dropDownListRow($model,'id_payment_top',CHtml::listData(PaymentTop::model()->findAll(), 'id_payment_top', 'payment_top'),
    //array('prompt'=>'-- Choose --','class'=>'span4'));?>

    <?php /*
	if(!$model->isNewRecord){
		$value=isset($_POST['Customer']['paymentname']) ?$_POST['Customer']['paymentname'] : $model->PaymentTop->payment_top;
	}
	else{
		$value=isset($_POST['Customer']['paymentname']) ? $_POST['Customer']['paymentname'] : '';
	}
	?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="Customer_paymentname"><?php echo $model::model()->getAttributeLabel('paymentname'); ?><span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'paymentname', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('customer/autopay')."';
						 
							  // ambil JSON ke server
							  $.getJSON(urlsource+'/search/'+query, function(result) {
										  source = result;
										  $.each(source, function (i, model) {
									listdata[model.nama] = model;
									data.push(model.nama);
								 });
								 process(data);
								 });
														
							}",
					//'minLength'=>3,
                    'items'=>5,
					'highlighter'=> "js:function(item) {
						
						var itm = ''
						
									 + '<div class=\'typeahead_wrapper\'>'
									 + '<div class=\'typeahead_labels\'>'
									 + '<div class=\'typeahead_primary\'>' + listdata[item].nama + '</div>'
									
									 + '</div>'
									 + '</div>'
									
									;
								 	
						return itm;
				
					}",
					//'matcher'=>"js:function(item) {
                    //    return ~item.toLowerCase().indexOf(this.query.toLowerCase());
                    //}",
					'updater'=> "js:function(item) {
						$('#Customer_id_payment_top').val(listdata[item].id);  
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span2','value'=>$value,'maxlength'=>3), 
            ));
			?> 
			<?php echo $form->error($model,'paymentname'); ?>
		</div>
		</div>

		<?php echo $form->hiddenField($model,'id_payment_top',array('class'=>'span2','maxlength'=>3)); ?> 

	<?php //echo $form->textFieldRow($model,'id_payment_top',array('class'=>'span2','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'TermOfPayment',array('class'=>'span3','append' => 'Days','maxlength'=>3)); ?>

</div>

		*/ ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save & Continue' : 'Save & Continue',
		)); ?>
</div>

<?php $this->endWidget(); ?>
