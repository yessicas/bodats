<?php
$this->breadcrumbs=array(
	'Actial Sales Report'=>array('actualsales'),
);


$this->menu=array(

array('label'=>'Actual Sales Report','url'=>array('actualsalesreport/actualsales'),'active'=>true),


);
?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'method'=>'get',
)); ?>

<?
	//SET Default Value
	$DEFAULT_YEAR = (Timeanddate::getCurrentYear()*1)+1;
	
	if($month != "")
		$DEFAULT_MONTH = $month;
	else
		$DEFAULT_MONTH = Timeanddate::getCurrentMonth();
		
	if($year != "")
		$DEFAULT_YEAR = $year;
	else
		$DEFAULT_YEAR = Timeanddate::getCurrentMonth();

    $DEFAULT_LEVEL = $level;
?>

<h3 style="margin-bottom:-5px;"> Actual Sales Report </h3>
<hr>
<div class="view">

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="ActualSalesReport_Month"><?php echo "Month &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::dropDownList('Month',$DEFAULT_MONTH,Timeanddate::getlistmonth(),
			array('prompt'=>Yii::t('strings','-- Select Month --'),'class'=>'span3'));?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="ActualSalesReport_Year"><?php echo "Year &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::dropDownList('Year',$DEFAULT_YEAR,Timeanddate::getlistyear(),
			array('prompt'=>Yii::t('strings','-- Select Year --'),'class'=>'span3'));?>
	</div>
	</div>

    <div class="form-horiz ">
    <?php //echo $form->labelEx($model,'customername'); ?>
    <label class="control-label required" for="ActualSalesReport_Year"><?php echo "Level &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

    <div class="controls">
        <?php 
			//echo CHtml::dropDownList('Level',$DEFAULT_LEVEL,array('1'=>'Level 1','2'=>'Level 2','3'=>'Level 3'),
			echo CHtml::dropDownList('Level',$DEFAULT_LEVEL,array('1'=>'Level 1','2'=>'Level 2'),
            array('class'=>'span2'));?>
    </div>
    </div>

	<div class="form-actions" style="margin-top:10px; padding:10px 75px;">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Display',
        )); ?>
    </div>

</div>	<br/>


<style>
table td, table th {
    padding: 5px 5px 5px 5px;

    border: 1px solid #87A1A2;
    font-size: 10px;
}

th {
	font-weight: bold;
	color:white;
}

td{
	color: black;
}
</style>

<?php
	if($year > 0){
		echo $this->renderPartial('../actualsalesreport/report_view', array('month'=>$month, 'year'=>$year , 'level'=>$level)); 
		//echo $this->renderPartial('../crew/_form', array('model'=>$model)); 
	}
?>


 <?php
if(isset($_GET['Month'])) { ?>

<div class="userlistviewall" style="display:inline">

<?php 

}
else {
?>
    <div class="userlistviewall" style="display:none">
        <?php

}

?>






<?php
/*

<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>
<tr>
<th width=20% colspan=4 align="center" bgcolor="#1A354F"> TUG & BARGE </th>
<th width=35% colspan=9 align="center" bgcolor="#1A354F"> SALES PLAN </th>
<th width=35% colspan=13 align="center" bgcolor="#1A354F"> COST </th>
<th width=10% colspan=2 align="center" bgcolor="#1A354F"> GP </th>
</tr>

<tr>
<td width=1% align="center" bgcolor="#C7F2F2">No. </td>
<td width=8% align="center" bgcolor="#C7F2F2">Tug </td>
<td width=8% align="center" bgcolor="#C7F2F2">Barge </td>
<td width=3% align="center" bgcolor="#C7F2F2">Voyage Name </td>


<td width=1% align="center" bgcolor="#C7F2F2">No. </td>
<td width=8% align="center" bgcolor="#C7F2F2">Customer </td>
<td width=10% align="center" bgcolor="#C7F2F2">Loading </td>
<td width=8% align="center" bgcolor="#C7F2F2">Discharge </td>
<td width=3% align="center" bgcolor="#C7F2F2">Voy</td>
<td width=1% align="center" bgcolor="#C7F2F2">Ton</td>
<td width=8% align="center" bgcolor="#C7F2F2">USD/ Ton</td>
<td width=8% align="center" bgcolor="#C7F2F2">Amount </td>
<td width=3% align="center" bgcolor="#C7F2F2">Total Revenue</td>

<td width=1% align="center" bgcolor="#C7F2F2">Fuel (Ltr) </td>
<td width=8% align="center" bgcolor="#C7F2F2">Fuel Cost </td>
<td width=8% align="center" bgcolor="#C7F2F2">Agency </td>
<td width=3% align="center" bgcolor="#C7F2F2">Depreciation</td>
<td width=1% align="center" bgcolor="#C7F2F2">Crew Cost</td>
<td width=8% align="center" bgcolor="#C7F2F2">Rent</td>
<td width=8% align="center" bgcolor="#C7F2F2">Sub Cont </td>
<td width=3% align="center" bgcolor="#C7F2F2">Insurance</td>
<td width=3% align="center" bgcolor="#C7F2F2">Repair & Maintain</td>
<td width=1% align="center" bgcolor="#C7F2F2">Docking</td>
<td width=8% align="center" bgcolor="#C7F2F2">Brokerage fee</td>
<td width=8% align="center" bgcolor="#C7F2F2">Others </td>
<td width=3% align="center" bgcolor="#C7F2F2">Total Cost</td>

<td width=8% align="center" bgcolor="#C7F2F2">Amount </td>
<td width=3% align="center" bgcolor="#C7F2F2">Margin</td>

</tr>

<tr>
<td width=20% rowspan=4 align="center" > 1 </td>
<td width=35% rowspan=4 align="center" > PATRIA 10 </td>
<td width=35% rowspan=4 align="center" > AURIGA </td>
<td width=10% rowspan=4 align="center" > AUR </td>


<td width=10% align="center" > 1 </td>
<td width=10% align="center" > SRSJ </td>
<td width=10% align="center" > B Ninggi </td>
<td width=10% align="center" > Taboneo </td>
<td width=10%  align="center" > 1 </td>
<td width=10%  align="center" > 7300 </td>
<td width=10%  align="center" > 19 </td>
<td width=10%  align="center" > 20 </td>
<td width=10%  align="center" > 50 </td>


<td width=10%  align="center" > 50 </td>
<td width=10%  align="center" > 25 </td>
<td width=10%  align="center" > 15 </td>
<td width=10%  align="center" > 7000 </td>
<td width=10%  align="center" > 50 </td>
<td width=10%  align="center" >  </td>
<td width=10%  align="center" >  </td>
<td width=10%  align="center" > 7000 </td>
<td width=10%  align="center" > 50 </td>
<td width=10%  align="center" > 25 </td>
<td width=10%  align="center" >  </td>
<td width=10%  align="center" > 7000 </td>
<td width=10%  align="center" > 45000 </td>

<td width=10%  align="center" > 30 </td>
<td width=10%  align="center" > 35% </td>
</tr>

<tr>

<td width=10% align="center" > 2 </td>
<td width=10% align="center" > SRSJ </td>
<td width=10% align="center" > B Ninggi </td>
<td width=10% align="center" > Taboneo </td>
<td width=10%  align="center" > 1 </td>
<td width=10%  align="center" > 7300 </td>
<td width=10%  align="center" > 19 </td>
<td width=10%  align="center" > 20 </td>
<td width=10%  align="center" > 70 </td>

<td width=10%  align="center" > 50 </td>
<td width=10%  align="center" > 25 </td>
<td width=10%  align="center" > 15 </td>
<td width=10%  align="center" > 7000 </td>
<td width=10%  align="center" > 50 </td>
<td width=10%  align="center" >  </td>
<td width=10%  align="center" >  </td>
<td width=10%  align="center" > 7000 </td>
<td width=10%  align="center" > 50 </td>
<td width=10%  align="center" > 25 </td>
<td width=10%  align="center" >  </td>
<td width=10%  align="center" > 7000 </td>
<td width=10%  align="center" > 45000 </td>

<td width=10%  align="center" > 40 </td>
<td width=10%  align="center" > 34% </td>

</tr>

<tr>
	<td colspan=4 >

 <?php  $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Sales Plan Detail'),
                'icon'=>'plus white',
                'size'=>'mini',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('salesplan/result'),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                     
                                        ),
            
                ));
                ?>
            </td>

    <td width=10%  align="center" >  </td>
	<td width=10%  align="center" > </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>

	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" > </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" > </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" > </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>


	<td width=10%  align="center" > </td>
	<td width=10%  align="center" >  </td>
	
    </tr>

    <tr>

    <td colspan=4 align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> AMOUNT </td>
    <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 3 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
      <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
       <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 123 </td>
        <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 233 </td>


     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 3 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 123 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 233 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 3 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 140 </td>

      <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> -2% </td>
    
    </tr>

</table>

*/
?>


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