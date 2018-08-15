<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'vendor-classification-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>


<?php echo $form->errorSummary($model); ?>


	<?php $vend=$_GET['id']; ?>

	<?php echo $form->Hiddenfield($model,'id_vendor',array('class'=>'span4','value'=>$vend,'maxlength'=>20,'readonly'=>'readonly')); ?>

	<div>
		<?php echo CHtml::CheckBox('type1',''); ?>
		</div>
		<div style="margin:-14px 0 0 30px;">
		<?php echo 'AGENCY' ?>

		</div>


		<?php //echo $form->error($model,'type'); ?>

		<div>
		<?php echo CHtml::CheckBox('type2',''); ?>
		</div>

		<div style="margin:-14px 0 0 30px;">
		<?php echo 'PRODUCT' ?>

	</div>

<?php /* echo $form->checkBox($model,'type',array('value' => 'AGENCY', 'uncheckValue'=>' ')); ?>

<div style="margin:-14px 0 0 20px;">
<?php echo 'AGENCY' ?>
</div>
</div>

<div>
<?php echo $form->checkBox($model,'type',array('value' => 'PRODUCT', 'uncheckValue'=>' ')); ?>

<div style="margin:-14px 0 0 20px;">
<?php echo 'PRODUCT' ?>
</div>
</div>

*/ ?>

<?php //echo $form->checkBoxRow($model, 'type', array('checked' => 'AGENCY')); ?>


<?php $this->endWidget(); ?>
