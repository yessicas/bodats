<h4>Add Sales Plan <?php if(isset($is_mode)){echo ucwords($is_mode);} ?></h4>
<div id='myDiv'>
</div>
 <?php 
 $url = Yii::app()->createUrl("demand/caculat");
 echo CHtml::ajaxSubmitButton('Form Ajax Submit Button',$url, 
		array(
			//'success'=>'function(){$("#mydialog").dialog("close");}',
			//'success'=>'alert("great")',
			'update'=>'#myDiv'
		),
		array('name' => 'run', 'class' => 'btn btn-success')
    ); 
?>
							
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sales-plan-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

<?php echo $form->errorSummary($model); ?>
<div class="view">
	<?php
		$model->id_vessel_tug = $id_tug;
		$model->id_vessel_barge = $id_barge;
		$model->year = $year*1;
		$model->month = $month*1;
	?>

	<?php echo $form->hiddenField($model,'id_vessel_tug',array('class'=>'span5')); ?>
	<?php echo $form->hiddenField($model,'id_vessel_barge',array('class'=>'span5')); ?>
	<?php echo $form->hiddenField($model,'year',array('class'=>'span5')); ?>
	<?php echo $form->hiddenField($model,'month',array('class'=>'span5')); ?>
	
	<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
			array(               
				'label'=>'Month',
				'type'=>'raw',
				'value'=>CHtml::encode(Timeanddate::getFullMonthEng($model->month)),
			),
			//'month',
			'year',
			array(               
				'label'=>'Tug',
				'type'=>'raw',
				'value'=>CHtml::encode($model->Tug->VesselName),
			),
			array(               
				'label'=>'Barge',
				'type'=>'raw',
				'value'=>CHtml::encode($model->Barge->VesselName),
			),
			//'Tug.VesselName',
			//'Barge.VesselName',


	),
	)); ?>
</div>


 <?php  
 $url = Yii::app()->createUrl("salesplan/result", array('id_tug'=>$id_tug, 'id_barge'=>$id_barge, 'month'=>$month, 'year'=>$year));
 $this->widget('bootstrap.widgets.TbButton', array(      
	'label' =>Yii::t('strings','Calculate Cost'),
	'icon'=>'check white',
	'size'=>'mini',
	'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	//'url'=>array('create'),   
	'url'=>$url,
	'htmlOptions' => array(
			'class'=>'various fancybox.ajax', 
		),
	));
?>
<?php

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 450,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>false, // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>

	<?php
		if($model->isNewRecord ){
			$model->QuantityUnit = "MT";
			$model->TotalQuantity = 0;
		}
	?>

	<?php echo $form->textFieldRow($model,'VoyageName',array('class'=>'span5','maxlength'=>50)); ?>
	
	<?php echo $form->dropDownListRow($model, 'id_customer',CHtml::listData(Customer::model()->findAll(array('order'=>'CompanyName ASC')), 'id_customer', 'CompanyName'),
		array('prompt'=>Yii::t('strings','-- Select Customer --'),'class'=>'span4'));?>

	<?php echo $form->textFieldRow($model,'voyage_no',array('class'=>'span5')); ?>
	
	<?php echo $form->dropDownListRow($model, 'JettyIdStart',CHtml::listData(Jetty::model()->findAll(array('order'=>'JettyName ASC')), 'JettyId', 'JettyName'),
		array('prompt'=>Yii::t('strings','-- Select Port Of Loading --'),'class'=>'span4'));?>
		
	<?php echo $form->dropDownListRow($model, 'JettyIdEnd',CHtml::listData(Jetty::model()->findAll(array('order'=>'JettyName ASC')), 'JettyId', 'JettyName'),
		array('prompt'=>Yii::t('strings','-- Select Port Of Loading --'),'class'=>'span4'));?>

	<?php echo $form->textFieldRow($model,'TotalQuantity',array('class'=>'span5')); ?>

	<?php echo $form->textField($model,'QuantityUnit',array('readonly'=>true, 'class'=>'span1','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'PriceUnit',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>
	
	<?php echo $form->dropDownListRow($model, 'id_currency',CHtml::listData(Currency::model()->findAll(array('order'=>'id_currency ASC')), 'id_currency', 'currency'),
		array('prompt'=>Yii::t('strings','-- Select Currency --'),'class'=>'span4'));?>
	
	<?php echo $form->textFieldRow($model,'FuelLtr',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'FuelCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'AgencyCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DepreciationCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CrewCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Rent',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SubconCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IncuranceCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RepairCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DockingCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'BrokerageCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'OthersCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'GP_COGM',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginFuelCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginAgencyCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginDepreciationCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginCrewCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginRent',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginSubconCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginIncuranceCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginRepairCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginDockingCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginBrokerageCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginOthersCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'GP_COGS',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
