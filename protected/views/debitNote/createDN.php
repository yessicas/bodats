<?php 
if(isset($edit_mode)){
	$url='debitNote/updateDN';
	$title='Edit';
}else{
	$url='debitNote/createDN';
	$title='Add';
}

$this->menu=array(
array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage')),
array('label'=>'Debit Note ','url'=>array('voyageclose/listDN','id'=>$_GET['id'])),
array('label'=>$title.' Debit Note ','url'=>array($url,'id'=>$_GET['id'])),
//array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
);
?>

<div id="content">
<h2><?php echo $title ?>  Debit Note</h2>
<hr>
</div>

<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'debit-note-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	//'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>


<?php echo $this->renderPartial('../Cfile/voyage_info', array('modelvoyage'=>$modelvoyage)); ?>

<?php echo $form->errorSummary($model); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>


	<?php //echo $form->hiddenField($model,'id_voyage_order',array('class'=>'span4','maxlength'=>20,'value'=>$modelvoyage->id_voyage_order)); ?>

	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('transaction_date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'transaction_date',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:100px;'),
	)); ?>	
	<?php echo $form->error($model,'transaction_date'); ?>
	</div>
	</div>

	<?php //echo $form->textFieldRow($model,'transaction_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_debit_note_category',array('class'=>'span4')); ?>

	<?php echo  $form->dropDownListRow($model,'id_debit_note_category',CHtml::listData(MstDebitNoteCategory::model()->findAll(), 'id_debit_note_category', 'debit_note_category'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));?>

    <?php
		$firstcol = $form->labelEx($model,'amount');
		$secondcol = $form->textField($model,'amount',array('class'=>'span3'));
		$secondcol .= " ".$form->dropDownList($model, 'id_currency',CHtml::listData(Currency::model()->findAll(array('order'=>'id_currency ASC')), 'id_currency', 'currency'),
		array( 'style'=>'width: 60px;'));
		$secondcol .= $form->error($model,'amount');
		echo FormCommonDisplayer::displayRowInput($firstcol, $secondcol);
	?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>4, 'cols'=>50, 'class'=>'span4')); ?>

	<?php //echo $form->dropDownListRow($model,'omitted_status',array('NONE'=>'NONE', 'PROCCED'=>'PROCCED', 'OMIT'=>'OMIT'),array('prompt'=>'--Select--','class'=>'span4'));?>

	<?php //echo $form->textFieldRow($model,'omitted_status',array('class'=>'span5','maxlength'=>0)); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>
