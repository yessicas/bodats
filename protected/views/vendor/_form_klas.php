<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'vendor-classification-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>false),
	'enableClientValidation'=>false,
)); ?>



<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_vendor',array('class'=>'span5')); ?>


	<div class="control-group ">
	<label class="control-label required" for="Vendor_id_vendor"><?php echo $model::model()->getAttributeLabel('id_vendor'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

<?php $vend=$_GET['id']; ?>
<?php
$vendorname=Vendor::model()->FindByPk($vend)->VendorName; ?>

	<?php echo Chtml::textField('namavendor',$vendorname,
    array('class'=>'span4','disabled'=>'disabled'));?>

    <?php echo $form->hiddenField($model,'id_vendor',array('class'=>'span3','value'=>$vend)); ?>

    <?php echo $form->error($model,'id_vendor'); ?>

   </div>
</div>


	<?php //echo $form->textFieldRow($model,'id_vendor',array('class'=>'span4','value'=>$vend,'maxlength'=>20,'readonly'=>'readonly')); ?>

<?php //echo $form->checkBox($model,'type',array('value' => 'PRODUCT', 'uncheckValue'=>' ')); ?>

 <div class="control-group ">
	<label class="control-label required" for="Vendor_agency" style="margin-top:-3px;"><?php echo 'AGENCY' ?> </label> <!-- label -->
	<div class="controls">

<?php echo CHtml::CheckBox('type1',''); ?>

</div>
<div>

<?php //echo $form->error($model,'type'); ?>

<div class="control-group ">
	<label class="control-label required" for="Vendor_product" style="margin-top:-3px;"><?php echo 'PRODUCT' ?> </label> <!-- label -->
	<div class="controls">



<?php echo CHtml::CheckBox('type2',''); ?>


<?php //echo $form->error($model,'type'); ?>

</div>
</div>




<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>





<script>
$(document).ready(function(){

$('#vendor-classification-form').submit(function(){

var mustcheckmessage='Pilih Salah Satu Checkbox !!!';


var checkagen=$('#type1')[0].checked ;
var checkproduct=$('#type2')[0].checked ;

if(checkagen==false && checkproduct==false){

	alert(mustcheckmessage);
	return false;

}

else{
return true;	
}


});


});

</script>

