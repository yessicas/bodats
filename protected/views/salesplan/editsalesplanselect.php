<h4>Edit Sales Plan <?php if(isset($is_mode)){echo ucwords($is_mode);} ?></h4>					
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sales-plan-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

<?php //echo $form->errorSummary($model); ?>
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
	
	<?php 
	/*
	$this->widget('bootstrap.widgets.TbDetailView',array(
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
	)); 
	*/
	?>
	
	<?php
		echo FormCommonDisplayer::displayRowInputReadonly("Month", CHtml::encode(Timeanddate::getFullMonthEng($model->month)));
		echo FormCommonDisplayer::displayRowInputReadonly("Year", CHtml::encode($model->year));
		echo FormCommonDisplayer::displayRowInputReadonly("Tug", CHtml::encode($model->Tug->VesselName));
		echo FormCommonDisplayer::displayRowInputReadonly("Barge", CHtml::encode($model->Barge->VesselName));
	?>
</div>
<div class = "animated flash">
<?php //echo $form->errorSummary($model); ?>
</div>
<div class="view">
	<?php
		if($model->isNewRecord ){
			$model->QuantityUnit = "MT";
			$model->TotalQuantity = 0;
			$model->PriceUnit = 0;
			$model->id_currency = 1;
		}
	?>
	

	<?php echo $form->dropDownListRow($model, 'id_customer',CHtml::listData(Customer::model()->findAll(array('order'=>'CompanyName ASC')), 'id_customer', 'CompanyName'),
		array('prompt'=>Yii::t('strings','-- Select Customer --'),'class'=>'span4'));?>
	
	<?php echo $form->dropDownListRow($model, 'JettyIdStart',CHtml::listData(Jetty::model()->findAll(array('order'=>'JettyName ASC')), 'JettyId', 'JettyName'),
		array('prompt'=>Yii::t('strings','-- Select Port Of Loading --'),'class'=>'span4'));?>
		
	<?php echo $form->dropDownListRow($model, 'JettyIdEnd',CHtml::listData(Jetty::model()->findAll(array('order'=>'JettyName ASC')), 'JettyId', 'JettyName'),
		array('prompt'=>Yii::t('strings','-- Select Port Of Loading --'),'class'=>'span4'));?>
	
	<?php
		$firstcol = $form->labelEx($model,'TotalQuantity');
		$secondcol = $form->textField($model,'TotalQuantity',array('class'=>'span3', 'id'=>'quantity'));
		$secondcol .= " ".$form->textField($model,'QuantityUnit',array('readonly'=>true, 'class'=>'span1','maxlength'=>10));
		$secondcol .= $form->error($model,'TotalQuantity');
		echo FormCommonDisplayer::displayRowInput($firstcol, $secondcol);
	?>
	
	<?php 
		/*
		$firstcol = $form->labelEx($model,'PriceUnit');
		$secondcol = $form->textField($model,'PriceUnit',array('class'=>'span3','id'=>'price'));
		$secondcol .= " ".$form->dropDownList($model, 'id_currency',CHtml::listData(Currency::model()->findAll(array('order'=>'id_currency ASC')), 'id_currency', 'currency'),
		array('class'=>'span1'));
		$secondcol .= $form->error($model,'PriceUnit');
		echo FormCommonDisplayer::displayRowInput($firstcol, $secondcol);
		*/
	?>
	
<?php
	$this->widget('application.extensions.moneymask.MMask',array(
		'element'=>'#prices,#quantitys',
		'currency'=>'PHP',
		'config'=>array(
			'symbolStay'=>true,
			'thousands'=>'.',
			'decimal'=>',',
			'precision'=>0,
		)
	));

	//echo CHtml::textField('price', '', array('id'=>'price'));
?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>$model->isNewRecord ? 'Save' : 'Save',
			)); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
