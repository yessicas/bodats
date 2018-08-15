<?php
$this->menu=array(
	array('label'=>'Manage SO ','url'=>array('so/admin')),
	array('label'=>'Create SO','url'=>array('so/searchquo')),
	array('label'=>'Update SO','url'=>array('so/update','id'=>$model->id_so)),
	);
	?>

<div id="content">
<h2>Update Attachment Shipping Order  <font color="#BD362F"><?php echo $model->ShippingOrderNumber; ?></font></h2>
<hr>
</div>

<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'so-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->fileFieldRow($model,'SI_Attachment',array('style'=>'width:200px','maxlength'=>100)); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

</div>
