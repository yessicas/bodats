<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>



		<?php //echo $form->textFieldRow($model,'id_vendor_classification',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'id_vendor',array('class'=>'span5')); ?>

<div class="sorting">

 
 <?php echo 'Type' ?> &nbsp
		<?php echo $form->dropDownlist($model,'type',
		array(
			//'prompt'=>Yii::t('strings','-- Select --'),
			"AGENCY"=>"AGENCY",
			"PRODUCT"=>"PRODUCT"),
		array('class'=>'span2','maxlength'=>50)); ?>

	
</div>
		<?php //echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>0)); ?>

<?php /*
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>
	*/ ?>

<?php $this->endWidget(); ?>
