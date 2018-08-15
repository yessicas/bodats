<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'customer-voice-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<?php /*
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
*/
?>

<?php echo $form->errorSummary($model); ?>


	<?php /*
	if(!$model->isNewRecord){
		$value=isset($_POST['CustomerVoice']['companyname']) ?$_POST['CustomerVoice']['companyname'] : $model->Customer->CompanyName;
	}
	else{
		$value=isset($_POST['CustomerVoice']['companyname']) ? $_POST['CustomerVoice']['companyname'] : '';
	}
	?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="CustomerVoice_companyname"><?php echo $model::model()->getAttributeLabel('companyname'); ?><span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'companyname', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('CustomerVoice/autocust')."';
						 
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
						$('#CustomerVoice_id_customer').val(listdata[item].id);  
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span4','value'=>$value,), 
            ));
			?> 
			<?php echo $form->error($model,'companyname'); ?>
		</div>
		</div>

		<?php echo $form->hiddenField($model,'id_customer',array('class'=>'span3','maxlength'=>20)); ?> 
*/ ?>

	<?php //echo $form->textFieldRow($model,'id_customer',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'userid',array('class'=>'span3','maxlength'=>45,'value'=>Yii::app()->user->id,'readonly'=>'readonly')); ?>

	<?php 
	if(!$model->isNewRecord){
		$value=isset($_POST['CustomerVoice']['VoyageNumber']) ?$_POST['CustomerVoice']['VoyageNumber'] : $model->VoyageOrder->VoyageNumber;
	}
	else{
		$value=isset($_POST['CustomerVoice']['VoyageNumber']) ? $_POST['CustomerVoice']['VoyageNumber'] : '';
	}
	?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="CustomerVoice_VoyageNumber"><?php echo $model::model()->getAttributeLabel('VoyageNumber'); ?></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'VoyageNumber', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('CustomerVoice/autovoyage')."';
						 
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
						$('#CustomerVoice_id_voyage_order').val(listdata[item].id); 
						$('#CustomerVoice_voyage_number').val(listdata[item].nama);  
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span4','value'=>$value,), 
            ));
			?> 
			<?php echo $form->error($model,'VoyageNumber'); ?>
		</div>
		</div>

		<?php echo $form->hiddenField($model,'id_voyage_order',array('class'=>'span3','maxlength'=>20)); ?> 
		<?php echo $form->hiddenField($model,'voyage_number',array('class'=>'span3','maxlength'=>20)); ?> 

	<?php //echo $form->textFieldRow($model,'userid',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textAreaRow($model,'voice',array('rows'=>6, 'cols'=>50, 'class'=>'span7')); ?>

	<?php // echo $form->textFieldRow($model,'is_view',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Post' : 'Post',
		)); ?>
</div>

<?php $this->endWidget(); ?>


