
<?php 
$defaultDate=$_GET['year'].'-'.$_GET['month'].'-01';
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'voyage-order-plan-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>



<?php echo $form->errorSummary($model); ?>

	

	<?php //echo $form->textFieldRow($model,'BargingVesselTug',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'BargingVesselBarge',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_customer',array('class'=>'span5')); ?>
	
	<?php echo $form->dropDownListRow($model,'id_customer',CHtml::listData(Customer::model()->findAll(array('order'=>'CompanyName ASC')), 'id_customer', 'CompanyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4'));?>

	<?php //echo $form->textFieldRow($model,'bussiness_type_order',array('class'=>'span5')); ?>
	
	<?php echo $form->dropDownListRow($model,'id_bussiness_type_order',CHtml::listData(BussinessTypeOrder::model()->findAll(array('order'=>'id_bussiness_type_order ASC')), 'id_bussiness_type_order', 'bussiness_type_order'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4'));?>
	
	<?php echo $form->textFieldRow($model,'VoyageNumber',array('class'=>'span4','maxlength'=>100)); ?>

	<?php echo FormCommonDisplayer::displayRowVessel($form, $model, $id_tug, "BargingVesselTug", "Vessel Tug", $size="span4"); ?>
	<?php echo FormCommonDisplayer::displayRowVessel($form, $model, $id_barge, "BargingVesselBarge", "Vessel Barge", $size="span4"); ?>


	<?php //echo $form->textFieldRow($model,'BargeSize',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'TugPower',array('class'=>'span5')); ?>


	<?php //echo $form->textFieldRow($model,'BargingJettyIdStart',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'BargingJettyIdEnd',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'BargingJettyIdStart',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));?>

	<?php echo $form->dropDownListRow($model,'BargingJettyIdEnd',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));?>

    <?php //echo $form->textFieldRow($model,'Capacity',array('class'=>'span5')); ?>

	<div class="control-group ">

	<label class="control-label required" for="Quotation_TotalQuantity"><?php echo $model::model()->getAttributeLabel('TotalQuantity'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo $form->textField($model,'TotalQuantity',array('class'=>'span2')); ?>

	<?php echo $form->dropDownList($model,'QuantityUnit',array('MT'=>'MT'),array('style'=>'width:60px','readonly'=>'readonly')); ?>
	<?php echo $form->error($model,'TotalQuantity'); ?> <!-- error message -->
	</div>
	</div>

	<?php //echo $form->textFieldRow($model,'StartDate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'EndDate',array('class'=>'span5')); ?>

	<div class="control-group ">
	<label class="control-label required" for="StartDate"><?php echo $model::model()->getAttributeLabel('StartDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'StartDate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',     
						'defaultDate' => $defaultDate,     
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'value'=>isset($_GET['StartDate']) ? $_GET['StartDate'] :'',
	'style'=>'width:100px;'),
	)); ?>	
	<?php echo $form->error($model,'StartDate'); ?>
</div>
</div>

	<?php //echo $form->textFieldRow($model,'StartDate',array('class'=>'span5')); ?>

	<div class="control-group ">
	<label class="control-label required" for="EndDate"><?php echo $model::model()->getAttributeLabel('EndDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'EndDate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',  
						'defaultDate' => $defaultDate,         
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'value'=>isset($_GET['EndDate']) ? $_GET['EndDate'] :'',
	'style'=>'width:100px;'),
	)); ?>	
	<?php echo $form->error($model,'EndDate'); ?>
</div>
</div>


	<?php //echo $form->textFieldRow($model,'Price',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'fuel_price',array('class'=>'span5')); ?>

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
