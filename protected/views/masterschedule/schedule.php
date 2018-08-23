<?php
	$this->breadcrumbs=array(
		'Master Schedule'=>array('master'),
		'Create',
	);
	
	$modeview = "";
	if($viewer){
		$modeview = "viewer";
	}
   
	$this->menu=array(
	array('label'=>'Master Schedule','url'=>array('masterschedule/master'.$modeview), 'active'=>true),
	array('label'=>'Schedule Per Vessel','url'=>array('masterschedule/mastervessel'.$modeview), 'active'=>false),
	);
?>

<?php

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	    $('.search-form').toggle();
	    return false;
	});
	$('.search-form form').submit(function(){
	    $.fn.yiiGridView.update('availability-grid', {
	        data: $(this).serialize()
	    });
	    return false;
	});
	");
	?>



<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'method'=>'get',
)); ?>
		
			

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="masterschedule_Month"><?php echo "Month &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	
	<div class="controls">
		<?php echo Chtml::dropDownList('Month',$month,Timeanddate::getlistmonth(),
			array('prompt'=>Yii::t('strings','-- Select Month --'),'class'=>'span3'));?>
	</div>
	</div>

<!--	<div class="modePC">
	<div class ="alert alert-block " style="margin-top: -10px; width:30px;">
		<h4>Mode</h4>
		</div>
		<select name="mode" >
			<option value='past' <?php //if($mode=="past") {echo "selected";} ?> >Past Mode</option>
			<option value='current' <?php //if($mode=="current") {echo "selected";} ?>>Currenct Mode</option>
		</select>
	</div> -->

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="masterschedule_Year"><?php echo "Year &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	 <?php echo Chtml::dropDownList('Year',$year,Timeanddate::getlistyear(),
	 array('prompt'=>Yii::t('strings','-- Select Year --'),'class'=>'span3'));?>

		</div>
		</div>
	<div id="tes2" style="margin: -75px 240px 60px 850px">
		<div class ="alert alert-block" style="margin-bottom: 10px;">
		<h4>Mode</h4>
		</div>
		<?php 
			if(!isset($mode)){
				$mode = "";
			}
		?>
		<select name="mode_pair">
			<option value='active_pair'>Active Pair</option>
			<option value='last_pair' <?php if($mode=="last_pair"){ echo "selected";} ?>>Last Pair</option>
		</select>
	</div>
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



	<?php 
		$datenow=$year.'-'.$month.'-01';
		$tanggal_setelahnya=Timeanddate::adddate($datenow,"+1 month");
		$data_tanggal_setelahnya = explode("-", $tanggal_setelahnya);
		$tahun_setelahnya=$data_tanggal_setelahnya[0];
		$bulan_setelahnya=$data_tanggal_setelahnya[1];
		//echo"<br>";

		$tanggal_sebelumnya=Timeanddate::adddate($datenow,"-1 month");
		$data_tanggal_sebelumnya = explode("-", $tanggal_sebelumnya);
		$tahun_sebelumnya=$data_tanggal_sebelumnya[0];
		$bulan_sebelumnya=$data_tanggal_sebelumnya[1];
		//echo"<br>";
	?>

<div class="view">
	<?php 
		echo CHTML::submitButton('Master Template', array('submit'=>array('mastertemplate/msttemplate')));
	?>
    <?php 
    $this->widget('bootstrap.widgets.TbButton', array(
                'type'=>'inverse',
                'size'=>'small',
                'icon'=>'chevron-left white',
                'url'=>array('masterschedule/master'.$modeview,
                  'monthseacrh'=>$bulan_sebelumnya, 
                  'yearseacrh'=>$tahun_sebelumnya), 
                 
            )); 
    ?>
    <div style ="float:right;">
    <?php 
    $this->widget('bootstrap.widgets.TbButton', array(
                'type'=>'inverse',
                'size'=>'small',
                'icon'=>'chevron-right white',
                 'url'=>array('masterschedule/master'.$modeview,
                  'monthseacrh'=>$bulan_setelahnya, 
                  'yearseacrh'=>$tahun_setelahnya), 
                 
            )); 

     ?>
    </div>
</div>


<?php
if($month > 0 && $year > 0) { ?>
	
	<div class="userlistviewall" style="display:inline">
		<?php 
		
		$this->renderPartial('_masterschedule',array(
			'month'=>$month,
			'year'=>$year,
			'viewer'=>$viewer,
			'mode'=>$mode,
			//'editschedule'=>$editschedule,

		)); ?>
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