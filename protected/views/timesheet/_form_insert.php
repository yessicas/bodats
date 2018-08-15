<style>
.loading-indicator { 
background: white url('images/ajax-loader.gif') right center no-repeat; 
}
</style>

<?php 
if($prevActivity){
	$previousdate=$prevActivity->StartDate;
	$previousactivity=$prevActivity->Activity;
}else{
	$previousdate='-';
	$previousactivity='-';
}

if($nextActivity){
	$nextdate=$nextActivity->StartDate;
	$nextactivity=$nextActivity->Activity;
}else{
	$nextdate='-';
	$nextactivity='-';
}
?>



<?php 

if($previousdate!='-' && $nextdate!='-'){
 echo"<script type='text/javascript'>
 

function cekType(data) {        
               //alert(data);

               if(data=='POINT'){
               		var prevDate = $('#prevDate').val(); 
               		$('#Timesheet_StartDate').val(prevDate);
               		$('#Timesheet_StartDate').attr('readonly', true);

               }

               if(data=='DURATION'){
               		$('#Timesheet_StartDate').val('');
               		$('#Timesheet_StartDate').attr('readonly', false);

               		$('#Timesheet_StartDate').blur(function () {
               			var start = new Date($('#prevDate').val()); 
               			var after = new Date($('#nextDate').val()); 

						var end = new Date($('#Timesheet_StartDate').val())  ;

						if(start >= end){
							alert('Date Cannot smaller or same Than Previous Date');
							$('#Timesheet_StartDate').val('');
						}

						if(after <= end){
							alert('Date Cannot Higher or same Than Next Date');
							$('#Timesheet_StartDate').val('');
						}
               		 });
               }
				
        }

 </script>";

}
?>

<?php 

if($previousdate!='-' && $nextdate=='-'){
 echo"<script type='text/javascript'>
 
function cekType(data) {        
               //alert(data);

               if(data=='POINT'){
               		var prevDate = $('#prevDate').val(); 
               		$('#Timesheet_StartDate').val(prevDate);
               		$('#Timesheet_StartDate').attr('readonly', true);

               }

               if(data=='DURATION'){
               		$('#Timesheet_StartDate').val('');
               		$('#Timesheet_StartDate').attr('readonly', false);

               		$('#Timesheet_StartDate').blur(function () {
               			var start = new Date($('#prevDate').val()); 
               			var after = new Date($('#nextDate').val()); 

						var end = new Date($('#Timesheet_StartDate').val())  ;

						if(start >= end){
							alert('Date Cannot smaller or same Than Previous Date');
							$('#Timesheet_StartDate').val('');
						}
               		 });
               }
				
        }

 </script>";

}
?>








<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'timesheet-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="view">
<h4 style="color:#BD362F;">Previous Activity </h4>

    <div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Previous Date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	
	<?php echo Chtml::textField('prevDate',$previousdate,array('class'=>'span3','readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Previous Activity'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	
	<?php echo Chtml::textField('prevActivity',$previousactivity,array('class'=>'span5','readonly'=>'readonly')); ?>
	</div>
	</div>

</div>

<div class="view">
<h4 style="color:#BD362F;">Next Activity </h4>

    <div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Next Date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	
	<?php echo Chtml::textField('nextDate',$nextdate,array('class'=>'span3','readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Next Activity'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	
	<?php echo Chtml::textField('nextActivity',$nextactivity,array('class'=>'span5','readonly'=>'readonly')); ?>
	</div>
	</div>

</div>


<div class="view">
<h4 style="color:#BD362F;">Add New Activity </h4>


<?php //echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'id_voyage_activity',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'StartDate',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_voyage_activity',CHtml::listData(VoyageMstActivity::model()->findAll(),'id_voyage_activity', 'voyage_activity_desc'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3',
     'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('timesheet/findTypeMstActivity') /*, 'update'=>'#id_update'*/,'success'=>'cekType')));?>

     <?php echo $form->textAreaRow($model,'timesheet_desc',array('cols'=>50 , 'rows'=>4, 'class'=>'span5','maxlength'=>500)); ?>


	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('StartDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget( 'ext.EJuiTimePicker.EJuiTimePicker', array(
			'model' => $model, // Your model
			'language'=>'id',
			'attribute' => 'StartDate', // Attribute for input
			'options' => array(
					'showOn'=>'focus',
					'dateFormat'=>'yy-mm-dd',
					),
			'htmlOptions' => array(
					'style'=>'width:150px;', // styles to be applied
					'size' => '10',    // textField maxlength
					//'onBlur' => 'javascript:cekDate()',
			),
			)); ?>
	<?php echo $form->error($model,'StartDate'); ?> <!-- error message -->
	</div>
	</div>

	
	<?php 
	if(!$model->isNewRecord){
		$value=isset($_POST['Timesheet']['JettyName']) ? $_POST['Timesheet']['JettyName'] : $model->Position->JettyName;
	}
	else{
		$value=isset($_POST['Timesheet']['JettyName']) ? $_POST['Timesheet']['JettyName'] : '';
	}
	?>


	<div class="control-group ">
	<?php //echo $form->labelEx($model,'JettyName'); ?>
	<label class="control-label required" for="Timesheet_JettyName"><?php echo $model::model()->getAttributeLabel('JettyName'); ?> <span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'JettyName', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('timesheet/autoposition')."';
						 
							  // ambil JSON ke server
							  $(document.activeElement).addClass('loading-indicator');
							  $.getJSON(urlsource+'/search/'+query, function(result) {
										  source = result;
										  $.each(source, function (i, model) {
									listdata[model.nama] = model;
									data.push(model.nama);
								 });
								 process(data);
								 $(document.activeElement).removeClass('loading-indicator');
								 });
														
							}",
					//'minLength'=>3,
                    'items'=>5,
					'highlighter'=> "js:function(item) {
						
						var itm = ''
						
									 + '<div class=\'typeahead_wrapper\'>'
									 + '<div class=\'typeahead_labels\'>'
									 + '<div class=\'typeahead_primary\'>' + listdata[item].nama + '</div>'
									 + '</div>'
									 + '</div>'
									
									;
								 	
						return itm;
				
					}",
					//'matcher'=>"js:function(item) {
                    //    return ~item.toLowerCase().indexOf(this.query.toLowerCase());
                    //}",
					'updater'=> "js:function(item) {
						$('#Timesheet_JettyId').val(listdata[item].id); 
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span5','value'=>$value,), 
            ));
			?> 
			<?php echo $form->error($model,'JettyName'); ?>
		</div>
		</div>

	<?php // $listPosition= array(0=>'BANJARMASIN', $modelvoyage->BargingJettyIdStart =>$modelvoyage->JettyOrigin->JettyName,$modelvoyage->BargingJettyIdEnd =>$modelvoyage->JettyDestination->JettyName) ?>
	<?php //echo $form->dropDownListRow($model,'JettyId',$listPosition,
    //array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));  ?>

	<?php echo $form->hiddenField($model,'JettyId',array('class'=>'span2','maxlength'=>3)); ?>




	<?php //echo $form->dropDownListRow($model,'id_voyage_activity',CHtml::listData(VoyageMstActivity::model()->findAll(),'id_voyage_activity', 'voyage_activity_desc'),
    //array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));?>

     <?php  echo $form->dropDownListRow($model,'id_mst_timesheet_summary',CHtml::listData(MstTimesheetSummary::model()->findAll(array('condition' => 'is_active = 1')),'id_mst_timesheet_summary', 'timesheet_summary'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));  ?>

    <?php /* echo $form->dropDownListRow($model,'PortCategory',array('PARK'=>'PARK','START'=>'START','END'=>'END'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3')); */ ?>

	<?php echo $form->textFieldRow($model,'Activity',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'Duration',array('class'=>'span5')); ?>

	<?php /*
	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Duration'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo $form->textField($model,'Duration',array('class'=>'span3','readonly'=>'readonly')); ?> 
	<?php echo Chtml::textField('hour','Hour',array('class'=>'span1','readonly'=>'readonly')); ?>
	<?php echo $form->error($model,'Duration'); ?> <!-- error message -->
	</div>
	</div>
	*/
	?>

	<?php echo $form->textFieldRow($model,'Remarks',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'updated_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated_user',array('class'=>'span3','maxlength'=>45,'value'=>Yii::app()->user->id,'readonly'=>'readonly')); ?>

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