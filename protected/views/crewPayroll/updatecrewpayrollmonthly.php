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


	<?php /*
	<div class="control-group ">
    <?php //echo $form->labelEx($model,'customername'); ?>
    <label class="control-label required" for="SalesPlan_Month"><?php echo "Month &nbsp"  ?></label> <!-- label manual -->

    <div class="controls">
        <?php echo CHtml::dropDownList('month',$month,Timeanddate::getlistmonth(),
            array('class'=>'span3'));?>
    </div>
    </div>

    <div class="control-group ">
    <?php //echo $form->labelEx($model,'customername'); ?>
    <label class="control-label required" for="SalesPlan_Year"><?php echo "Year &nbsp"  ?></label> <!-- label manual -->

    <div class="controls">
        <?php echo CHtml::dropDownList('year',$year,Timeanddate::getlistyearFuture(),
            array('class'=>'span3'));?>
    </div>
    </div>

    */
    ?>



    <div class="control-group ">
    <?php //echo $form->labelEx($model,'customername'); ?>
    <label class="control-label required" for="SalesPlan_Month"><?php echo "Month &nbsp"  ?></label> <!-- label manual -->

    <div class="controls">
        <?php echo CHtml::dropDownList('monthFormat',$month,Timeanddate::getlistmonth(),
            array('class'=>'span3','disabled'=>'disabled'));?>
        <?php echo CHtml::hiddenField('month',$month,array('class'=>'span3','readonly'=>'readonly'));?>
    </div>
    </div>

    <div class="control-group ">
    <?php //echo $form->labelEx($model,'customername'); ?>
    <label class="control-label required" for="SalesPlan_Year"><?php echo "Year &nbsp"  ?></label> <!-- label manual -->

    <div class="controls">
        <?php echo CHtml::textField('year',$year,array('class'=>'span3','readonly'=>'readonly'));?>
    </div>
    </div>
		

	<?php


		$PAYROLLITEM = PayrollDB::getListPayrollitem();
		//$PAYROLLITEM = PayrollDB::getListPayrollitemFix();
		foreach($PAYROLLITEM as $payitem){
			$namafield = str_replace(" ", "_", $payitem->payroll_item); // mengganti spasi karena payroll_item itu ada yang berspasi, sedangkan name untuk text field tidak boleh ada spasi


			if($payitem->id_payroll_item==1||$payitem->id_payroll_item==2){ // mendeklarasikan yang di readonly hanya wages dan allowance
				$readonly=true;
			}else{
				$readonly=false;
			}
			
			$amount = CrewPayroll::model()->findByAttributes(array( 'CrewId'=>$CrewId, 'id_payroll_item'=>$payitem->id_payroll_item  ));
			if($amount && $payitem->id_payroll_item<>3){ // ambil data dari base crew payrole selain THR
				$data=$amount->amount;
				$curency=$amount->id_currency; // ambil curency
			}else{
				$data=0;
			}

			echo '
			<div class="control-group ">
				<label class="control-label">'.$payitem->payroll_item.'</label>
				<div class="controls">
					'.CHtml::textField($namafield,$data,array('class'=>'span4', 'maxLength'=>14,'readonly'=>$readonly)).'
				</div>
			</div>
			';
		}
	?>
		<?php echo CHtml::hiddenField('CrewId', $CrewId,array('class'=>'span3','maxlength'=>20)); ?> 
		<div class="control-group ">
			<label class="control-label" for="">Currency</label>
			<div class="controls">
				<?php echo CHtml::dropDownList('Currency',$curency,CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),array('class'=>'span2'));?>
			</div>
		</div>
		<div class="control-group ">
			<label class="control-label" for="">Pay Date</label>
			<div class="controls">
				<?php echo CHtml::textField('transfer_date','',array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>
			</div>
		</div>
		<div class="control-group ">
			<label class="control-label" for="CrewAssignment_id_crew_position">Pay Date</label>
			<div class="controls">
				<?php echo CHtml::dropDownList('transfer_type','',array('CASH'=>'CASH','BANK TRANSFER'=>'BANK TRANSFER'),array('class'=>'span2', 'maxLength'=>250)); ?>
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
