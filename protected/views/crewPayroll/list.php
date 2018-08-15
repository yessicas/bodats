<?php
$this->breadcrumbs=array(
	'Master Schedule'=>array('master'),
	'Create',
);

$this->menu=array(
array('label'=>'Base Crew Payroll','url'=>array('crewPayroll/list')),
array('label'=>'Monthly Crew Payroll','url'=>array('crewPayroll/listmonthly')),
);
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'method'=>'get',
)); ?>
		
		
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="asign_Tug"><?php echo "Tug &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php 
		$defaultvalue = '';
		if(isset($_GET['Tug'])) {
			$defaultvalue = $_GET['Tug'];
			$id_tug = $_GET['Tug'];
		}
		if(isset($id_tug)){
			$defaultvalue = $id_tug;
			$id_tug = $id_tug;
		}

		echo CHtml::dropDownList('Tug',$defaultvalue ,CHtml::listData(VesselDB::getListTug(), 'id_vessel', 'VesselName'),
     array('prompt'=>'-- Select --','class'=>'span3'));?>
	</div>
	</div>

    <?php if (isset($monthly)){

    //SET Default Value
    $DEFAULT_YEAR = (Timeanddate::getCurrentYear()*1);
    $DEFAULT_MONTH = date('m'); //Defaultnya dimulai dari Januari
    
    if(isset($_GET['month']))
        $DEFAULT_MONTH = $_GET['month'];
        
    if(isset($_GET['year']))
        $DEFAULT_YEAR = $_GET['year'];

    ?>

    <div class="form-horiz ">
    <?php //echo $form->labelEx($model,'customername'); ?>
    <label class="control-label required" for="SalesPlan_Month"><?php echo "Month &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

    <div class="controls">
        <?php echo CHtml::dropDownList('month',$DEFAULT_MONTH,Timeanddate::getlistmonth(),
            array('class'=>'span3'));?>
    </div>
    </div>

    <div class="form-horiz ">
    <?php //echo $form->labelEx($model,'customername'); ?>
    <label class="control-label required" for="SalesPlan_Year"><?php echo "Year &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

    <div class="controls">
        <?php echo CHtml::dropDownList('year',$DEFAULT_YEAR,Timeanddate::getlistyearFuture(),
            array('class'=>'span3'));?>
    </div>
    </div>

    <?php } ?>



	<div class="form-actions" style="padding: 5px; margin: 0px 0px 0px 0px;">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Display',
            'htmlOptions'=>
            array(
            	'style'=>'margin-left:145px;'),
        )); 
?>
	</div>
<br>

<?php if (isset($monthly)){
    echo'<div class="alert alert-block alert-info">This information about Fixed Salary for crew (Monthly Crew Payroll). <br>
    If there is a change in fixed salary, you can change in <i>Update payroll info</i></div>';
}else{
    echo'<div class="alert alert-block alert-info">This information about Fixed Salary for crew (Base Crew Payroll). <br>
    If there is a change in fixed salary, you can change in <i>Update payroll info</i></div>';
}
?>
<?php
if($id_tug > 0) { ?>

<div class="userlistviewall" style="display:inline">
	<?php 
    if (isset($monthly)){
        $this->renderPartial('/crewPayroll/_listofvesselmonthly',array('id_tug'=>$id_tug,'month'=>$DEFAULT_MONTH, 'year'=>$DEFAULT_YEAR));
    }else{
        $this->renderPartial('/crewPayroll/_listofvessel',array('id_tug'=>$id_tug)); 
    }
	?>
</div>

<?php

}
else {
?>
    <div class="userlistviewall" style="display:none">
        <?php

}

?>

</div>




<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 500,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>array( 'type' => 'inside' ), // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

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






<?php $this->endWidget(); ?>



<script>
function reloaddata(id, data) {
     $('.userlistviewall').show(300);
}
</script>