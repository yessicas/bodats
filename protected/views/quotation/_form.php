<style>
.typeahead_wrapper { display: block; height: 30px; }
.typeahead_photo { float: left; max-width: 230px; max-height: 30px; margin-right: 5px; border-radius: 6px;}
.typeahead_labels { float: left; height: 30px;}
.typeahead_primary { font-weight: bold; }
.typeahead_secondary { font-size: .8em; margin-top: -5px; }
.loading-indicator { 
background: white url('images/ajax-loader.gif') right center no-repeat; 
}

</style>

<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'quotation-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
		
	<?php 
	if($model->isNewRecord){
		//$dataformatnumber=NumberingDocumentDB::getFormatNumber($model,'id_quotation','NoOrder','NoMonth','NoYear');

		//echo $form->textFieldRow($model,'QuotationNumber',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'NoOrder',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'NoMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDB::getMonthNow(),'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'NoYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDB::getYearNow(),'readonly'=>'readonly')); 
	


	}else {
		echo $form->textFieldRow($model,'QuotationNumber',array('class'=>'span4','maxlength'=>32,'readonly'=>'readonly')); 
	}
	?>

	<?php //echo $form->textFieldRow($model,'QuotationDate',array('class'=>'span5')); ?>
	<div class="control-group ">
	<?php //echo $form->labelEx($model,'QuotationDate'); ?>
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('QuotationDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'QuotationDate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;'),
	)); ?>	
	<?php echo $form->error($model,'QuotationDate'); ?> <!-- error message -->
	</div>
	</div>

	<?php //echo $form->textFieldRow($model,'id_bussiness_type_order',array('class'=>'span3','maxlength'=>20)); ?> 
	<?php /*echo $form->dropDownListRow($model,'id_bussiness_type_order',CHtml::listData(BussinessTypeOrder::model()->findAllByAttributes(array(
           //'condition' => 'id_bussiness_type_order = :id_bussiness_type_order',
           //'params' => array(
           //    ':id_bussiness_type_order' => 100,
           //),
       )), 'id_bussiness_type_order', 'bussiness_type_order'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4')); */?>

    <?php echo $form->dropDownListRow($model,'id_bussiness_type_order',CHtml::listData(BussinessTypeOrder::model()->findAll(array(
           'condition' => 'visible = :vis',
           'params' => array(
               ':vis' => 1,
           ),
       )), 'id_bussiness_type_order', 'bussiness_type_order'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4'));?>


	<?php echo $form->hiddenField($model,'created_user',array('class'=>'span3','maxlength'=>45,'value'=>Yii::app()->user->id,'readonly'=>'readonly')); ?>


	<div class="view">
	<h4 style="color:#BD362F;"> Costumer Info </h4>
	<?php 
	if(!$model->isNewRecord){
		$value=isset($_POST['Quotation']['customername']) ?$_POST['Quotation']['customername'] : $model->Customer->CompanyName;
		$valueaddr=isset($_POST['addresscust']) ?$_POST['addresscust'] : $model->Customer->Address;
	}
	else{
		$value=isset($_POST['addresscust']) ? $_POST['addresscust'] : '';
		$valueaddr=isset($_POST['addresscust']) ? $_POST['addresscust'] : '';
	}
	?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="Quotation_customername"><?php echo $model::model()->getAttributeLabel('customername'); ?><span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'customername', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('quotation/autocostumer')."';


						 		$(document.activeElement).addClass('loading-indicator');
							  // ambil JSON ke server
							  $.getJSON(urlsource+'/search/'+query, function(result) {
										  source = result;
										  $.each(source, function (i, model) {
									listdata[model.nama] = model;
									data.push(model.nama);
								 });
								 process(data);
								 $(document.activeElement).removeClass('loading-indicator');
								 });

														
							}",
					//'minLength'=>3,
                    'items'=>5,
					'highlighter'=> "js:function(item) {
						
						var itm = ''
						
									 + '<div class=\'typeahead_wrapper\'>'
									 + '<div class=\'typeahead_labels\'>'
									 + '<div class=\'typeahead_primary\'>' + listdata[item].nama + '</div>'
									 + '<div class=\'typeahead_secondary\'>' + listdata[item].alamat + '</div>'
									 + '</div>'
									 + '</div>'
									
									;
								 	
						return itm;
				
					}",
					//'matcher'=>"js:function(item) {
                    //    return ~item.toLowerCase().indexOf(this.query.toLowerCase());
                    //}",
					'updater'=> "js:function(item) {
						$('#Quotation_id_customer').val(listdata[item].id); 
						$('#addresscust').val(listdata[item].alamat);  
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span5','value'=>$value,), 
            ));
			?> 
			<?php echo $form->error($model,'customername'); ?>
		</div>
		</div>

	<div class="control-group ">
	<label class="control-label required" for="Quotation_addresscust"><?php echo $model::model()->getAttributeLabel('Customer Address'); ?><span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php echo Chtml::textArea('addresscust',$valueaddr,array('rows'=>3, 'cols'=>100,'class'=>'span5','readonly'=>'readonly')); ?>
	</div>
	</div>


	<?php echo $form->hiddenField($model,'id_customer',array('class'=>'span3','maxlength'=>20)); ?> 

	<?php echo $form->textFieldRow($model,'attn',array('class'=>'span3','maxlength'=>250)); ?>

	</div>



	<div class="view">
	<h4 style="color:#BD362F;"> Quotation Footnote </h4>
	<?php echo $form->textFieldRow($model,'SignName',array('class'=>'span3','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'SignPosition',array('class'=>'span3','maxlength'=>250)); ?>
	</div>

	<?php //echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textFieldRow($model,'Category',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textAreaRow($model,'StatusDescription',array('rows'=>6, 'cols'=>100,'class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'attachment',array('class'=>'span5','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>


	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save Step 1 & Continue' : 'Save Step 1 & Continue',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>