<?php
	$cs=Yii::app()->clientScript;
	$cs->registerCSSFile('css/pmlstyle.css');
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'purchase-request-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<?php echo $form->errorSummary($model); ?>
	
<div class="alert alert-block alert-info">Step 1 | Fill general information of PR.</div>
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
	
	echo $form->hiddenField($model,'dedicated_to',array('class'=>'span4','maxlength'=>32,'value'=>$model->dedicated_to,'readonly'=>'readonly')); 
	echo $form->hiddenField($model,'id_voyage_order',array('class'=>'span4','maxlength'=>32,'value'=>$id,'readonly'=>'readonly')); 
	echo $form->hiddenField($model,'id_vessel',array('class'=>'span4','maxlength'=>32,'value'=>0,'readonly'=>'readonly')); 
	?>

	<?php 
		
		$pr_category = PoCategory::model()->findByAttributes(array('id_po_category'=>$model->id_po_category ));
		echo FormCommonDisplayer::displayRowInputReadonlyAndHidden($form, $model, "id_po_category", "PR Category", $pr_category->category_name, "span6") 	
	?>
	
	<?php
		echo VoyageOrderDisplayer::displayVoyageInfo3column($id);
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
	
	<?php
		if($model->is_mutliple_item != 1){
			$labelSave = "Save";
	?>
    <div class="control-group ">
		<label class="control-label required" for="Quotation_TotalQuantity">
		<?php echo $model::model()->getAttributeLabel('amount'); ?> <span class="required">*</span></label> <!-- label -->
		<div class="controls">
		<?php echo $form->textField($model,'amount',array('class'=>'span3','maxlength'=>12)); ?>
	
		<?php
			
			echo FormCommonDisplayer::displayInputReadonlyAndHidden($form, $model, "metric", "", $model->metric, "span2");
		?>
		
		<?php echo $form->error($model,'amount'); ?> <!-- error message -->
		</div>
	</div>
	<?php
		}else{
			$labelSave = "Save And Continue";
		}
	?>

	<?php echo $form->textAreaRow($model,'notes',array('rows'=>3, 'cols'=>50, 'class'=>'span6')); ?>

	<?php echo $form->textFieldRow($model,'requested_user',array('class'=>'span5','maxlength'=>45,'value'=>Yii::app()->user->id,'readonly'=>'readonly')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? $labelSave : $labelSave,
		)); ?>
</div>

<?php $this->endWidget(); ?>
