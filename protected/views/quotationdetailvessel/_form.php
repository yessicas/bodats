<script>function finebarge(data) {
             
                var json = JSON.parse(data);
               // alert(json["message"]);
               $("#resultfinebarge").html(json["message"]);
               $('#QuotationDetailVessel_BargingVesselBarge').val(json["id_vessel"]);
               $('#QuotationDetailVessel_BargeSize').val(json["BargeSize"]);
               $('#QuotationDetailVessel_Capacity').val(json["Capacity"]);
               $('#VesselName').val(json["VesselName"]);
				
        }
</script>

<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'quotation-detail-vessel-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	


	<?php //echo $form->textFieldRow($model,'id_quotation',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('BargingVesselTug'); ?> <span class="required">*</span> </label> <!-- label -->
	<div class="controls">

    <?php echo $form->dropDownList($model,'BargingVesselTug',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4',
    'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('settypetugbarge/FindBargeVesselByTugVesselondetail') /*, 'update'=>'#id_update'*/,'success'=>'finebarge')));?>

    <?php echo $form->error($model,'BargingVesselTug'); ?> <!-- error message -->
    <br>
    <div id ="resultfinebarge" style="color: #b94a48; margin-left:20px;padding-top:5px;"> </div>
	</div>
	</div>
   



	<?php 
	if(!$model->isNewRecord){
		if($model->BargingVesselTug!=0){
			$valueVesselName=isset($_POST['VesselName'])  ? $_POST['VesselName'] : $model->VesselBarge->VesselName;
		}else{
			$valueVesselName=isset($_POST['VesselName']) ?  $_POST['VesselName'] : '';
		}
		
		
	}
	else{
		$valueVesselName=isset($_POST['VesselName']) ?  $_POST['VesselName'] : '';
	}
	?>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('BargingVesselBarge'); ?> <span class="required">*</span> </label> <!-- label -->
	<div class="controls">

	<?php echo Chtml::textField('VesselName',$valueVesselName,array('class'=>'span4','readonly'=>'readonly')); ?>

	<?php echo $form->error($model,'BargingVesselBarge'); ?> <!-- error message -->
    <br>
    <div id ="resultfinetug" style="color: #4CAD2D; margin-left:20px;padding-top:5px;"> </div>
	</div>
	</div>

    <?php echo $form->hiddenField($model,'BargingVesselBarge',array('class'=>'span4')); ?>



	<?php echo $form->textFieldRow($model,'BargeSize',array('class'=>'span3','append' => 'Feet','readonly'=>'readonly')); ?>

	<?php echo $form->textFieldRow($model,'Capacity',array('class'=>'span3','append' => '-MT-')); ?>



	<?php //echo $form->textFieldRow($model,'IdJettyOrigin',array('class'=>'span5')); ?>




	<?php //echo $form->dropDownListRow($model,'IdJettyOrigin',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    //array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4'));?>

    <div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('IdJettyOrigin'); ?> <span class="required">*</span> </label> <!-- label -->
	<div class="controls">
    <?php echo CHtml::dropDownList('origin',$quotationdata->BargingJettyIdStart,CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3','disabled'=>'disabled'));?>
   	
    <?php echo $form->hiddenField($model,'IdJettyOrigin',array('class'=>'span5','value'=>$quotationdata->BargingJettyIdStart)); ?>
    </div>
	</div>



	<?php //echo $form->textFieldRow($model,'IdJettyDestination',array('class'=>'span5')); ?>




	<?php //echo $form->dropDownListRow($model,'IdJettyDestination',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    //array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4'));?>


    <div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('IdJettyDestination'); ?> <span class="required">*</span> </label> <!-- label -->
	<div class="controls">
    <?php echo CHtml::dropDownList('end',$quotationdata->BargingJettyIdEnd,CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3','disabled'=>'disabled'));?>
   	
    <?php echo $form->hiddenField($model,'IdJettyDestination',array('class'=>'span5','value'=>$quotationdata->BargingJettyIdEnd)); ?>
    </div>
	</div>




    <div class="control-group ">

	<label class="control-label required" for="Quotation_LoadingDate"><?php echo $model::model()->getAttributeLabel('StartDate'); ?> <span class="required">*</span> </label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'StartDate',
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
	<?php echo $form->error($model,'StartDate'); ?> <!-- error message -->
	</div>
	</div>



    <?php echo $form->textFieldRow($model,'Price',array('class'=>'span2')); ?>
	<?php //echo $form->textAreaRow($model,'Price',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>


	<?php //echo $form->textFieldRow($model,'change_rate',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>
