<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'finding-report-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	
	<?php 
	if($model->isNewRecord){
		// your code here hehe
		}else {
		echo $form->textFieldRow($model,'FindingReportNumber',array('class'=>'span4','maxlength'=>32,'readonly'=>'readonly')); 
	}
	?>


	<div class="control-group ">
	<?php //echo $form->labelEx($model,'QuotationDate'); ?>
	<label class="control-label required" for="FindingReport_Date"><?php echo $model::model()->getAttributeLabel('Date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'Date',
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
	<?php echo $form->error($model,'Date'); ?> <!-- error message -->
	</div>
	</div>

	<?php //echo $form->textFieldRow($model,'Date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'created_user',array('class'=>'span3','maxlength'=>45,'value'=>Yii::app()->user->id)); ?>

	<?php 
		
		if($model->isNewRecord) {
			$vesselID =  $_GET['id'];
		}else{
			$vesselID =  $model->id_vessel;
		}

		$vesselNameData=Vessel::model()->findByPk($vesselID)->VesselName;
		/*
		echo'
		<div class="control-group ">
		<label class="control-label" for="Durasi">Vessel <span class="required">*</span></label>
		<div class="controls">
		';
			echo Chtml::dropDownList('vesselNameId',$vesselID,CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName','VesselType'),
    		array('prompt'=>'--Pilih --','class'=>'span3','disabled'=>true));
		echo'
		</div>
		</div>
		';
		echo $form->hiddenField($model,'id_vessel',array('class'=>'span5','value'=>$vesselID)); 
		*/

	?>


	<?php 
	if(!$model->isNewRecord){
		$value=isset($_POST['FindingReport']['vesselname']) ?$_POST['FindingReport']['vesselname'] : $model->Vessel->VesselName;
	}
	else{
		$value=isset($_POST['FindingReport']['vesselname']) ? $_POST['FindingReport']['vesselname'] : '';
	}
	?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="FindingReport_vesselname"><?php echo $model::model()->getAttributeLabel('vesselname'); ?><span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'vesselname', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('findingreport/autovessel')."';
						 
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
						$('#FindingReport_id_vessel').val(listdata[item].id);  
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span5','value'=>$vesselNameData,'readonly'=>'readonly'), 
            ));
			?> 
			<?php echo $form->error($model,'vesselname'); ?>
		</div>
		</div>

		<?php echo $form->hiddenField($model,'id_vessel',array('class'=>'span3','maxlength'=>20,'value'=>$vesselID)); ?> 



	<?php //echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>0)); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save & Continue' : 'Save & Continue',
		)); ?>
</div>

<?php $this->endWidget(); ?>
