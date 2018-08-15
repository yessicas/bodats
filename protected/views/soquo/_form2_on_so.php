<script>function finebarge(data) {
             
                var json = JSON.parse(data);
               // alert(json["message"]);
               $("#resultfinebarge").html(json["message"]);
               $('#Quotation_BargingVesselBarge').val(json["id_vessel"]);
               $('#VesselName').val(json["VesselName"]);
				
        }
</script>


<div id="content">
<h2>Update Vessel & Capacity</h2>
<hr>
</div>

<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'quotation-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
		

	<?php //echo $form->dropDownListRow($model,'BargingJettyIdStart',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    //array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));?>

	<?php //echo $form->dropDownListRow($model,'BargingJettyIdEnd',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    //array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));?>
	
	<?php /*echo $form->dropDownListRow($model,'BargingVesselTug',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2')); */?>

	<?php if($model->id_bussiness_type_order==200){ ?>
    <?php echo $form->dropDownListRow($model,'TranshipmentMotherVesselID',CHtml::listData(Mothervessel::model()->findAll(), 'id_mothervessel', 'MV_Name'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));?>
    <?php }?>

    <div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('BargingVesselTug'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

    <?php echo $form->dropDownList($model,'BargingVesselTug',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4',
    'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('settypetugbarge/FindBargeVesselByTugVessel') /*, 'update'=>'#id_update'*/,'success'=>'finebarge')));?>

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
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('BargingVesselBarge'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

	<?php echo Chtml::textField('VesselName',$valueVesselName,array('class'=>'span4','readonly'=>'readonly')); ?>

	<?php echo $form->error($model,'BargingVesselBarge'); ?> <!-- error message -->
    <br>
    <div id ="resultfinetug" style="color: #4CAD2D; margin-left:20px;padding-top:5px;"> </div>
	</div>
	</div>

    <?php //echo $form->hiddenField($model,'BargingVesselBarge',array('class'=>'span4')); ?>
    <?php 
    $valueDataBarge=($model->BargingVesselBarge!=0) ? $model->BargingVesselBarge : '';
    echo $form->hiddenField($model,'BargingVesselBarge',array('class'=>'span4','value'=>$valueDataBarge)); // value nya $valueDataBarge  agar jadi kosong
    ?> 





	<?php /*echo $form->dropDownListRow($model,'BargingVesselBarge',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "BARGE",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2')); */?>

 
	<div class="control-group ">

	<label class="control-label required" for="Quotation_LoadingDate"><?php echo $model::model()->getAttributeLabel('LoadingDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'LoadingDate',
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
	<?php echo $form->error($model,'LoadingDate'); ?> <!-- error message -->
	</div>
	</div>

	<div class="control-group ">

	<label class="control-label required" for="Quotation_TotalQuantity"><?php echo $model::model()->getAttributeLabel('TotalQuantity'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo $form->textField($model,'TotalQuantity',array('class'=>'span2')); ?>

	<?php echo $form->dropDownList($model,'QuantityUnit',array('MT'=>'MT'),array('style'=>'width:60px','readonly'=>'readonly')); ?>
	<?php echo $form->error($model,'TotalQuantity'); ?> <!-- error message -->
	</div>
	</div>

	<?php echo $form->textAreaRow($model,'StatusDescription',array('rows'=>3, 'cols'=>100,'class'=>'span3')); ?>

	
    
	
    

	
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>


