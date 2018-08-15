<?php
$this->breadcrumbs=array(
	'Crew Payrolls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CrewPayroll','url'=>array('index')),
	array('label'=>'Manage CrewPayroll','url'=>array('admin')),
);
?>
<script>   
    $(function() {
         $( ".calendar" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
         $( ".calendar1" ).datepicker({ dateFormat: 'yy-mm-dd' });   
    }); 
</script>

<h3>Update Crew Payroll</h3>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'crew-payroll-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<?php echo $form->errorSummary($model); ?>
	<?php echo CrewDisplayer::displayCustomerInfo($CrewId); ?>
	<div class="view">
	<?php
		//$PAYROLLITEM = PayrollDB::getListPayrollitem();
		$PAYROLLITEM = PayrollDB::getListPayrollitemFix();
		$eff_date = '';
		foreach($PAYROLLITEM as $payitem){
			$namafield = str_replace(" ", "_", $payitem->payroll_item); // mengganti spasi karena payroll_item itu ada yang berspasi, sedangkan name untuk text field tidak boleh ada spasi
			$payroll = PayrollDB::getCrewPayrollPerItem($CrewId, $payitem->id_payroll_item);
			if($payroll != null){
				$payroll_value = $payroll->amount;
				$eff_date = $payroll->effective_date;
			}else{
				$payroll_value = 0;
			}
				
			echo '
			<div class="control-group ">
				<label class="control-label">'.$payitem->payroll_item.'</label>
				<div class="controls">
					'.CHtml::textField($namafield,$payroll_value,array('class'=>'span4', 'maxLength'=>14)).'
				</div>
			</div>
			';
		}
	?>
		<?php echo CHtml::hiddenField('CrewId', $CrewId,array('class'=>'span3','maxlength'=>20)); ?> 
		<div class="control-group ">
			<label class="control-label" for="">Currency</label>
			<div class="controls">
				<?php echo CHtml::dropDownList('Currency','IDR',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),array('class'=>'span2'));?>
			</div>
		</div>
		<div class="control-group ">
			<label class="control-label" for="">Effective Date</label>
			<div class="controls">
				<?php echo CHtml::textField('EffectiveDate',$eff_date,array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>
			</div>
		</div>
		<div class="control-group ">
			<label class="control-label" for="CrewAssignment_id_crew_position">Legal Document</label>
			<div class="controls">
				<?php echo CHtml::textField('LegalDocument','',array('class'=>'span5', 'maxLength'=>250)); ?>
			</div>
		</div>

		
	</div>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
