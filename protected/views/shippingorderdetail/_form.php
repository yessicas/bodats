<style>
thead th {
background: #fff;
}
</style>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'shipping-order-detail-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php //echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_shipping_order',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'id_vessel_tug',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_vessel_tug',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

	<?php //echo $form->textFieldRow($model,'id_vessel_barge',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_vessel_barge',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "BARGE",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

    <?php /*
    <?php 
    if($model->isNewRecord){
    $valuesaterange=isset($_POST['ShippingOrderDetail']['daterange']) ?$_POST['ShippingOrderDetail']['daterange']: '';
    }else{
    $valuesaterange=$model->start_date.' - '.$model->end_date;
    }
	
	
	?>

    <?php 
	echo $form->dateRangeRow(
            $model,
            'daterange',
            array(
                 'options' => array('format' => 'YYYY-MM-DD'),
                 'value'=>$valuesaterange,
                // 'id'=>'daterangesss',
                  )); 
    ?>
    */
 	?>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('start_date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'start_date',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'class'=>'span2'),
	)); ?>	
	<?php echo $form->error($model,'start_date'); ?> <!-- error message -->
	</div>
	</div>



	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('end_date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'end_date',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'class'=>'span2'),
	)); ?>	
	<?php echo $form->error($model,'end_date'); ?> <!-- error message -->
	</div>
	</div>
	


	
	<?php //echo $form->textFieldRow($model,'IdJettyOrigin',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'IdJettyOrigin',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>


	<?php //echo $form->textFieldRow($model,'IdJettyDestination',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'IdJettyDestination',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>


	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'BargeSize',array('class'=>'span2','append' => 'Feet')); ?>

	<?php echo $form->textFieldRow($model,'Capacity',array('class'=>'span2','append' => '-MT-')); ?>

	<?php echo $form->textFieldRow($model,'Price',array('class'=>'span2')); ?>
	<?php //echo $form->textAreaRow($model,'Price',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>


	<?php echo $form->dropDownListRow($model,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

	<?php /*	
	$this->widget('bootstrap.widgets.TbDateRangePicker',array(
			'name'=>'so_daterange',
                 'options' => array('format' => 'YYYY-MM-DD'),
                  ));
          */
    ?>

	<?php //echo $form->textFieldRow($model,'change_rate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>


<?php /*
$this->widget('application.extensions.moneymask.MMask',array(
    'element'=>'#ShippingOrderDetail_Price',
    //'currency'=>'PHP',
    'config'=>array(
        'showSymbol'=>false,
        'symbolStay'=>false,
        'decimal'=>',',
        'precision'=>4,
        'thousands'=>'.',
    )
));
*/
?>