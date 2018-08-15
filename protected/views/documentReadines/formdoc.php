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
	if(isset($renew)){
		echo '<h3>Renew Vessel Document</h3>';
	}else{
		if($model->isNewRecord)
			echo '<h3>Add Vessel Document</h3>';
		else
			echo '<h3>Update Vessel Document</h3>';
	}
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
	<?php //echo $form->textFieldRow($model,'DateCreated',array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>
	
	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('DateCreated'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'DateCreated',
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
	<?php echo $form->error($model,'DateCreated'); ?>
	</div>
	</div>

	<?php echo $form->textFieldRow($model,'PlaceCreated',array('maxLength'=>20, 'class'=>'span4')); ?>
	
	<?php echo $form->dropDownListRow($model,'IsPermanen',array("0"=>"Limited", "1"=>"Permanent"),
			array('class'=>'span3'));?>

	<?php echo $form->dropDownListRow($model,'IsNotUsed',array("0"=>"Used", "1"=>"Not Used"),
			array('class'=>'span3'));?>

	<?php //echo $form->textFieldRow($model,'ValidUntil',array('class'=>'calendar1', 'maxLength'=>10, 'style'=>'width:100px;')); ?>
	
	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('ValidUntil'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'ValidUntil',
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
	<?php echo $form->error($model,'ValidUntil'); ?>
	</div>
	</div>

	<?php echo $form->fileFieldRow($model,'Attachment',array('style'=>'width:200px','maxlength'=>100)); ?>

	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Save',
		)); ?>
</div>


</div>

<?php $this->endWidget(); ?>

<script>
$(document).ready(function () {
 var datadefault= $('#VesselDocumentInfo_IsPermanen').val();
    if(datadefault==1){
	   $('#VesselDocumentInfo_ValidUntil').val('0000-00-00');
	   $("#VesselDocumentInfo_ValidUntil").prop("disabled",true);
	}else{
	   //$('#VesselDocumentInfo_ValidUntil').val('');
	   $("#VesselDocumentInfo_ValidUntil").prop("disabled",false);
	}




   $('#VesselDocumentInfo_IsPermanen').bind("change", function () {
    //alert($(this).val());

    var datas= $(this).val();
    if(datas==1){
	   $('#VesselDocumentInfo_ValidUntil').val('0000-00-00');
	   $("#VesselDocumentInfo_ValidUntil").prop("disabled",true);
	}else{
	   $('#VesselDocumentInfo_ValidUntil').val('');
	   $("#VesselDocumentInfo_ValidUntil").prop("disabled",false);
	}

   }); 
   
   $('#VesselDocumentInfo_IsNotUsed').bind("change", function () {
    //alert($(this).val());

    var datas= $(this).val();
    if(datas==1){
	   $('#VesselDocumentInfo_ValidUntil').val('0000-00-00');
	   $('#VesselDocumentInfo_DateCreated').val('0000-00-00');
	   $('#VesselDocumentInfo_PlaceCreated').val('-');
	   $("#VesselDocumentInfo_ValidUntil").prop("disabled",true);
	   $("#VesselDocumentInfo_PlaceCreated").prop("disabled",true);
	   $("#VesselDocumentInfo_DateCreated").prop("disabled",true);
	   $("#VesselDocumentInfo_IsPermanen").prop("disabled",true);
	}else{
	   $('#VesselDocumentInfo_ValidUntil').val('');
	   $("#VesselDocumentInfo_ValidUntil").prop("disabled",false);
	   $("#VesselDocumentInfo_PlaceCreated").prop("disabled",false);
	   $("#VesselDocumentInfo_DateCreated").prop("disabled",false);
	   $("#VesselDocumentInfo_IsPermanen").prop("disabled",false);
	}

   }); 
 });

</script>