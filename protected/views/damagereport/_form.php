<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'damage-report-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php 
	if($model->isNewRecord){
		// your code here hehe
		}else {
		echo $form->textFieldRow($model,'DamageReportNumber',array('class'=>'span4','maxlength'=>32,'readonly'=>'readonly')); 
	}
	?>

<?php 
		
		if($model->isNewRecord) {
			$vesselID =  $_GET['id'];
		}else{
			$vesselID =  $model->id_vessel;
		}

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


?>
	<?php //echo $form->dropDownListRow($model,'id_vessel',CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName'),
    //array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));?>

	<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

	<div class="control-group ">
	<label class="control-label required" for="Date"><?php echo $model::model()->getAttributeLabel('Date'); ?> <span class="required">*</span></label> <!-- label -->

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
	'class'=>'span3',
		),
	)); ?>	
	<?php echo $form->error($model,'Date'); ?>
	</div>
	</div>

	<?php //echo $form->textFieldRow($model,'Date',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'Description',array('rows'=>6, 'cols'=>50, 'class'=>'span6')); ?>

	<?php echo $form->textAreaRow($model,'CausedDamage',array('rows'=>6, 'cols'=>50, 'class'=>'span6')); ?>

	<div class="control-group ">
	<label class="control-label required" for="DamageTime"><?php echo $model::model()->getAttributeLabel('DamageTime'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'DamageTime',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'class'=>'span3',
	),
	)); ?>	
	<?php echo $form->error($model,'DamageTime'); ?>
	</div>
	</div>


	<?php //echo $form->textFieldRow($model,'DamageTime',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'PIC',array('style'=>'width:100px;','maxlength'=>256)); ?>

	

	<?php echo $form->fileFieldRow($model,'DamagePhoto',array('style'=>'width:190px','margin-left:-75px','maxlength'=>250)); ?>

	<?php echo $form->textAreaRow($model,'Suggestion',array('rows'=>6, 'cols'=>50, 'class'=>'span6')); ?>

	<?php echo $form->textFieldRow($model,'Master',array('class'=>'span4','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'ChiefEngineer',array('class'=>'span4','maxlength'=>256)); ?>

	<?php //echo $form->dropDownListRow($model,'Status',array('OPEN'=>'OPEN','REPAIRING'=>'REPAIRING','CLOSED'=>'CLOSED'),
	 //array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>