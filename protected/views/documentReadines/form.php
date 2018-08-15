<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'SignOff-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
));  ?>



<script>   
    $(function() {
         $( ".calendar" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
         $( ".calendar1" ).datepicker({ dateFormat: 'yy-mm-dd' });   
    }); 
</script>



<div class="view">
		
		
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="DocumentReadines_Tug"><?php echo "Tug &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Tug',"GONAYA",array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="DocumentReadines_DocumentName"><?php echo "Document Name &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">

	<?php echo CHtml::dropDownList('Tug','',CHtml::listData(MstVesselDocument::model()->findAll(), 'id_vessel_document', 'VesselDocumentName'),
     array('prompt'=>'-- Select --','class'=>'span3'));?>

	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="DocumentReadines_Category"><?php echo "Category &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::dropDownList('Categori','',array("Renew"=>"Renew"),
			array('class'=>'span3','disabled'=>'disabled'));?>
	</div>
	</div>


	<div class="form-horiz">
	<label class="control-label required" for="DocumentReadines_CreatedDate"><?php echo "CreatedDate &nbsp" ?> <span class="required">*</span></label> <!-- label -->

	<div class="controls">

		<?php echo CHtml::textField('CreatedDate','',array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>
	
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="DocumentReadines_CreatedPlace"><?php echo "Created Place &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('CreatedPlace',"Banjarmasin",array('class'=>'span3', 'maxLength'=>10)); ?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="DocumentReadines_ExpiredType"><?php echo "Expired Type &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::dropDownList('ExpiredType','',array("Permanent"=>"Permanent"),
			array('class'=>'span3','disabled'=>'disabled'));?>
	</div>
	</div>


	<div class="form-horiz">
	<label class="control-label required" for="DocumentReadines_ValidUntil"><?php echo "Valid Until &nbsp" ?> <span class="required">*</span></label> <!-- label -->

	<div class="controls">
	
	<?php echo CHtml::textField('ValidUntil','',array('class'=>'calendar1', 'maxLength'=>10, 'style'=>'width:100px;')); ?>

	</div>
	</div>

	
	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Save',
		)); ?>
</div>


</div>

<?php $this->endWidget(); ?>
