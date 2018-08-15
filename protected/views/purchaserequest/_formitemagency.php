<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'purchase-request-detail-form',
	'enableAjaxValidation'=>true,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<div class="alert alert-block alert-info">Please fill item.</div>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'purchase_item_table',array('class'=>'span4','maxlength'=>200)); ?>
	
	<?php
		if($mode == "agency"){
			$agencyModel = "AgencyItem";
			echo $form->hiddenField($model,'purchase_item_table',array('class'=>'span4','maxlength'=>32,'value'=>$agencyModel,'readonly'=>'readonly')); 
			echo $form->dropDownListRow($model,'id_item',CHtml::listData($agencyModel::model()->findAll(array('order'=>'agency_item ASC')), 'id_agency_item', 'agency_item'),
				array('prompt'=>Yii::t('strings','-- Select Agency Item --'),'class'=>'span4'));
		}
	?>

	<?php //echo $form->textFieldRow($model,'id_item',array('class'=>'span4','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'quantity',array('class'=>'span4','maxlength'=>8)); ?>

	<?php //echo $form->textFieldRow($model,'id_metric_pr',array('class'=>'span4')); ?>
	
	<?php
		$firstcol = $form->labelEx($model,'quantity');
		$secondcol = $form->textField($model,'quantity',array('class'=>'span3','maxlength'=>8));
		$secondcol .= " ".$form->dropDownList($model, 'metric',CHtml::listData(MstMetricPr::model()->findAll(array('order'=>'metric_name ASC')), 'metric', 'metric_name'),
		array('class'=>'span1'));
		$secondcol .= $form->error($model,'quantity');
		$secondcol .= $form->error($model,'metric');
		echo FormCommonDisplayer::displayRowInput($firstcol, $secondcol);
	?>

	<?php echo $form->textAreaRow($model,'notes',array('rows'=>3, 'cols'=>50, 'class'=>'span4')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
