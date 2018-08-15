<?php
$this->breadcrumbs=array(
	'Purchase Requests'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Purchase Request Bunkering','url'=>array('purchaserequest/admin'), 'active'=>true),
array('label'=>'Manage Purchase Request Bunkering','url'=>array('purchaserequest/admin')),
);
?>

<div id="content">
<h2>Create Purchase Request</h2>
<hr>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'purchase-request-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	

	<?php 
	if($model->isNewRecord){
		$dataformatnumber=NumberingDocumentDBPurchase::getFormatNumber($model,'id_purchase_request','PRNo','PRMonth','PRYear');

		echo $form->textFieldRow($model,'PRNumber',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
		echo $form->hiddenField($model,'PRNo',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
		echo $form->hiddenField($model,'PRMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBPurchase::getMonthNow(),'readonly'=>'readonly')); 
		echo $form->hiddenField($model,'PRYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBPurchase::getYearNow(),'readonly'=>'readonly')); 
	}else {
		echo $form->textFieldRow($model,'PRNumber',array('class'=>'span4','maxlength'=>32,'readonly'=>'readonly')); 
	}
	?>
	
	<?php 
	$model->dedicated_to = "VESSEL";
	echo $form->hiddenField($model,'dedicated_to',array('class'=>'span4','maxlength'=>32,'value'=>$model->dedicated_to,'readonly'=>'readonly')); 
	?>

	<?php 
		$model->id_po_category = 10100;
		$pr_category = PoCategory::model()->findByAttributes(array('id_po_category'=>$model->id_po_category ));
		echo FormCommonDisplayer::displayRowInputReadonlyAndHidden($form, $model, "id_po_category", "PR Category", $pr_category->category_name, "span4") 	
	?>

	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('PRDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'PRDate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;',
	'value'=>date("Y-m-d")),
	)); ?>	
	<?php echo $form->error($model,'PRDate'); ?> <!-- error message -->
	</div>
	</div>


	<?php echo $form->dropDownListRow($model,'id_vessel',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span5')); ?>
	
    <div class="control-group ">
		<label class="control-label required" for="Quotation_TotalQuantity"><?php echo $model::model()->getAttributeLabel('amount'); ?> <span class="required">*</span></label> <!-- label -->
		<div class="controls">
		<?php echo $form->textField($model,'amount',array('class'=>'span3','maxlength'=>20)); ?>
	
		<?php
			$model->metric = "LTR";
			echo FormCommonDisplayer::displayInputReadonlyAndHidden($form, $model, "metric", "", "LTR", "span2");
		?>
		
		<?php echo $form->error($model,'amount'); ?> <!-- error message -->
		</div>
	</div>

	<?php echo $form->textAreaRow($model,'notes',array('rows'=>3, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'requested_user',array('class'=>'span5','maxlength'=>45,'value'=>Yii::app()->user->id,'readonly'=>'readonly')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
