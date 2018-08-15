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

<?php
	if($model->isNewRecord)
		echo '<h3>Add Vessel Document</h3>';
	else
		echo '<h3>Update Vessel Document</h3>';
?>

<div class="view">
		
	<?php echo FormCommonDisplayer::displayRowVessel($form, $model, $id_vessel, "id_vessel", "Vessel Name", $size="span4"); ?>
	<?php
		if($model->isNewRecord)
			$model->id_vessel_document = $id_vessel_document;
		$mvdoc = MstVesselDocument::model()->findByAttributes(array('id_vessel_document'=>$id_vessel_document));
			
		echo FormCommonDisplayer::displayRowInputReadonlyAndHidden($form, $model, "id_vessel_document", "Document Name", $mvdoc->VesselDocumentName, "span5"); 
	?>
	<?php 
		if($model->isNewRecord)
			$cat = "NEW";
		else
			$cat = "UPDATE";
			
		echo FormCommonDisplayer::displayRowInputReadonly("CATEGORY", $cat); 
	?>
	<?php echo $form->textFieldRow($model,'DateCreated',array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>
	
	<?php echo $form->textFieldRow($model,'PlaceCreated',array('class'=>'calendar', 'maxLength'=>10, 'class'=>'span4')); ?>
	
	<?php echo $form->dropDownListRow($model,'IsPermanen',array("0"=>"Limited", "1"=>"Permanent"),
			array('class'=>'span3'));?>
			
	<?php echo $form->textFieldRow($model,'ValidUntil',array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>
	
	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Save',
		)); ?>
</div>


</div>

<?php $this->endWidget(); ?>
