



<script>   
    $(function() {
         $( ".calendar" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
         $( ".calendar1" ).datepicker({ dateFormat: 'yy-mm-dd' });  
         $( ".calendar2" ).datepicker({ dateFormat: 'yy-mm-dd' });   
    }); 
</script>

<?php 
 echo"<script type='text/javascript'>
 function hitung_durasi() 
 {

 var end = $('#VesselMaintenancePlan_end_date').val()
 var start = $('#VesselMaintenancePlan_start_date').val()
 var end_pisah = end.split('-');
 var start_pisah = start.split('-');
 var objek_tgl=new Date();
 var tanggal_awal=objek_tgl.setFullYear(start_pisah[0],start_pisah[1],start_pisah[2]);
 var tanggal_akhir=objek_tgl.setFullYear(end_pisah[0],end_pisah[1],end_pisah[2]);

if($('#VesselMaintenancePlan_end_date').val()!=''){

if(start > end){
	alert('Start Date Cannot Smaller Than End Date');
	$('#VesselMaintenancePlan_end_date').val('');
	$('#VesselMaintenancePlan_Duration').val('');
}else{
	var hasil= (tanggal_akhir-tanggal_awal)/(60*60*24*1000)

    $('#VesselMaintenancePlan_Duration').val(hasil+1)
}


}


}
 </script>";
?>



<div class="view">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'vessel-maintenance-plan-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<!--
<p class="help-block"><i>Isian Dengan Tanda  <span class="required">*</span> Tidak Boleh Kosong</i></p>
-->

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>

	<?php echo $form->dropDownListRow($model,'id_vessel',CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName','VesselType'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

	<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MaintenanceName',array('class'=>'span4','maxlength'=>32)); ?>

	<?php echo $form->dropDownListRow($model,'id_maintenance_type',CHtml::listData(MstMaintenanceType::model()->findAll(), 'id_maintenance_type', 'MaintenanceTypeName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

	<?php // echo $form->textFieldRow($model,'id_maintenance_type',array('class'=>'span5')); ?>


	<?php echo $form->textFieldRow($model,'start_date',array('class'=>'calendar', 'id'=>'VesselMaintenancePlan_start_date' ,'onChange' => 'javascript:hitung_durasi()')); ?>

	<?php echo $form->error($model,'start_date'); ?>

	<?php echo $form->textFieldRow($model,'end_date',array('class'=>'calendar1', 'id'=>'VesselMaintenancePlan_end_date','onChange' => 'javascript:hitung_durasi()')); ?>

	<?php echo $form->error($model,'end_date'); ?>

	<?php echo $form->textFieldRow($model,'Duration',array('class'=>'span3', 'id'=>'VesselMaintenancePlan_Duration','readonly'=>'readonly')); ?>

	<?php echo $form->error($model,'Duration'); ?>

	<?php echo $form->dropDownListRow($model,'TypeSchedule',array('UNSCHEDULED'=>'UNSCHEDULED', 'SCHEDULED'=>'SCHEDULED'), 
			array('prompt'=>'-- Select --','class'=>'span3'));?>
	<?php echo $form->dropDownListRow($model,'TypeBreakdown',array('UNBREAKDOWN'=>'UNBREAKDOWN', 'BREAKDOWN'=>'BREAKDOWN'), 
			array('prompt'=>'-- Select --','class'=>'span3'));?>

	<?php echo $form->textAreaRow($model,'Description',array('rows'=>4, 'cols'=>50, 'class'=>'span5')); ?>







	<?php // repeat form 
	if($model->isNewRecord){
	?>
	<?php echo $form->dropDownListRow($model,'is_repeat',array('NO'=>'NO','YES'=>'YES'),
	array('class'=>'span1','maxlength'=>32,'onChange' => 'javascript:enable(this.selectedIndex, "is_repeat")')); ?>

	<div id="up">
	<div class="control-group ">
	<label class="control-label required" for="VesselMaintenancePlan_interval"><?php echo $model::model()->getAttributeLabel('Repeat'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo $form->textField($model,'interval_repeat',array('class'=>'span2')); ?>

	<?php echo $form->dropDownList($model,'type_interval',array('Days'=>'Days','Hours'=>'Hours'),array('style'=>'width:60px')); ?>
	<?php echo $form->error($model,'interval_repeat'); ?> <!-- error message -->
	</div>
	</div>

	<?php echo $form->textFieldRow($model,'until_date',array('class'=>'calendar2')); ?>
	</div>

	<script>
	 var x = document.getElementById('VesselMaintenancePlan_is_repeat');
	 var s= x.selectedIndex;
     enable(s);

	function enable(id)
	{
	  if(id==1){
	    //alert(id);
	    var el = document.getElementById("up");
	    el.style.display = 'inline';

	 
	  }else{
	  	//alert(id);
	    var el = document.getElementById("up");
	    el.style.display = 'none';
		//var s= x.selectedIndex;
		//alert(s);
	  }
	}
	</script>

	<?php } // end of  repeat form ?>







	<?php //echo $form->textFieldRow($model,'RunningHour',array('class'=>'span5')); ?>

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


