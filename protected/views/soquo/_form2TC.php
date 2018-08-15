<script>function finebarge(data) {
             
                var json = JSON.parse(data);
               // alert(json["message"]);
               $("#resultfinebarge").html(json["message"]);
               $('#Quotation_BargingVesselBarge').val(json["id_vessel"]);
               $('#VesselName').val(json["VesselName"]);
				
        }
</script>


<script>   
    $(function() {
         $( ".calendar" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
         $( ".calendar1" ).datepicker({ dateFormat: 'yy-mm-dd' });   
    }); 
</script>

<?php 
 echo"<script type='text/javascript'>
 function hitung_durasi() 
 {

    var start = $('.calendar').datepicker('getDate');
    var end   = $('.calendar1').datepicker('getDate');
    var days   = (end - start)/1000/60/60/24;

if($('#Quotation_TCEndDate').val()!=''&&$('#Quotation_TCStartDate').val()!=''){

if(start > end){
	alert('Start Date Cannot Smaller Than End Date');
	$('#Quotation_TCEndDate').val('');
	$('#total').val('');
}else{
     $('#total').val(days);
}


}


}
 </script>";
?>


<?php if($model->TCStartDate!='0000-00-00'&&$model->TCEndDate!='0000-00-00') {
 echo"<script type='text/javascript'>
 window.onload = function (){
 

  var start = $('.calendar').datepicker('getDate');
    var end   = $('.calendar1').datepicker('getDate');
    var days   = (end - start)/1000/60/60/24;

if($('#Quotation_TCEndDate').val()!=''&&$('#Quotation_TCStartDate').val()!=''){

if(start > end){
	alert('Start Date Cannot Smaller Than End Date');
	$('#Quotation_TCEndDate').val('');
	$('#total').val('');
}else{
	 $('#total').val(days);
}


}


}
 </script>";

}
?>

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
		

	
	
	<?php /*echo $form->dropDownListRow($model,'BargingVesselTug',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2')); */?>




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

    <?php echo $form->textFieldRow($model,'TCStartDate',array('class'=>'calendar' ,'onChange' => 'javascript:hitung_durasi()')); ?>

    <?php echo $form->textFieldRow($model,'TCEndDate',array('class'=>'calendar1', 'onChange' => 'javascript:hitung_durasi()')); ?>

    <div class="control-group ">
    <label class="control-label required" for="Total"><?php echo $model::model()->getAttributeLabel('Total'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

    <?php echo Chtml::textField('total','',array('class'=>'span2' ,'readonly'=>'readonly')); ?>
    days

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

	<div class="control-group ">
	<label class="control-label required" for="TCPrice"><?php echo $model::model()->getAttributeLabel('TCPrice'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

    <?php echo  $form->textField($model,'TCPrice',array('class'=>'span2' )); ?>
    /day
    <?php echo $form->error($model,'TCPrice'); ?> <!-- error message -->

    </div>
	</div>

  <?php echo $form->dropDownListRow($model,'QuantityPriceCurency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>





	<?php /*echo $form->dropDownListRow($model,'BargingVesselBarge',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "BARGE",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2')); */?>

 

	
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save Step 2 & Continue' : 'Save Step 2 & Continue',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>