
<?php 
$this->menu=array(
array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage')),
array('label'=>' IM - Fuel & EHS Incentive ','url'=>array('voyageclose/listincentive','id'=>$_GET['id'],'mode'=>$_GET['mode'])),
//array('label'=>'Running VO','url'=>array('voyageorder/running_vo')),
//array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
);
?>

<div id="content">
<h2>Closed  IM - Fuel & EHS Incentive</h2>
<hr>
</div>

<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'voyage-close-form-info',
)); ?>
<?php echo $this->renderPartial('../Cfile/voyage_info', array('modelvoyage'=>$modelvoyage)); ?>
<?php $this->endWidget(); ?>




<div class="view">

<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'calculateform',
    'method'=>'post',
    'type'=>'horizontal',
)); 
?>



 <?php echo CHtml::hiddenField('id_voyage_order',$modelvoyage->id_voyage_order,array('class'=>'span3')); ?>

     Total Fuel Incentive : 
     <?php echo NumberAndCurrency::formatNumber($modelFuel->amount); ?>

     <?php echo $modelFuel->Currency->currency ;?>
    
    <br>

    Total EHS Incentive : 
     <?php echo NumberAndCurrency::formatNumber($modelEHS->amount); ?>

     <?php echo $modelEHS->Currency->currency  ;?>
    

    <br>
    <br>






<!-- list Crew -->
<style>
.listCrew table td, table th {
    padding: 5px 5px 5px 5px;
    text-align: center;
    border: 1px solid #87A1A2;
    font-size: 12px;
  font-family: Arial;
  font-weight: normal;
}

th {
  font-weight: bold;
  color:white;
}

td{
  color: black;
}

.row-fluid .spancenter {
    width: 65.4468%;
}

[class^="icon-"], [class*=" icon-"] {

    margin: 1px 0px -1px 0px;
}

#alignright{
   text-align: right;
}

</style>



<div class="listCrew">
<?php

    //$id_tug = $_GET['Tug'];
   // $vessel = VesselDB::getVessel($modelvoyage->BargingVesselTug);
    //echo '<h2>Crew of '.$modelvoyage->VesselTug->VesselName.'</h2>';
?>
<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>

<tr>
  <th  align="center" bgcolor="#1A354F"> Position </th>
  <th  align="center" bgcolor="#1A354F" > Crew Name </th>
  <th  align="center" bgcolor="#1A354F" > Status </th>
  <th  align="center" bgcolor="#1A354F"> Certificate </th>
  

  <th  align="center" bgcolor="#1A354F" colspan=2 > Fuel Incentive </th>
  <th  align="center" bgcolor="#1A354F" colspan=2 > EHS Incentive </th>
  
  
</tr>

<?php
  $LISTPOSITION = CrewDB::getListCrewPosition();
  $LISTASSIGNMENT = CrewDB::getListCrewAssignmentByVessel($modelvoyage->BargingVesselTug);
  $totalPersenFuel=0;
  $totalamountFuel=0;
  $totalPersenEHS=0;
  $totalamountEHS=0;
  
  foreach($LISTASSIGNMENT as $crew_assign){
    $crewas[$crew_assign->id_crew_position] = $crew_assign;
  } 
  
  foreach($LISTPOSITION as $position){
    echo '
    <tr>   
      <td>'.$position->crew_position.'</td>';

    
    if(isset($crewas[$position->id_crew_position])){
      $cr = $crewas[$position->id_crew_position];
      $cerlevel = isset($cr->crew->certificate_level)? $cr->crew->certificate_level->certiface_level : "-";
          echo '
            <td>'.$cr->crew->CrewName.'</td>
            <td>'.$cr->crew->StatusOwn.'</td>
            <td>'.$cerlevel.'</td>';

          $existDataCrewFuel=VoyageIncentiveCrew::model()->findByAttributes(array('id_voyage_incentive'=>$modelFuel->id_voyage_incentive, 'CrewId'=>$cr->crew->CrewId,'type_incentive'=>'FUEL'));
                if($existDataCrewFuel){
              $modelCrewFUEL=$existDataCrewFuel;
            }else{
              $modelCrewFUEL=new VoyageIncentiveCrew;
            }

          $existDataCrewEHS=VoyageIncentiveCrew::model()->findByAttributes(array('id_voyage_incentive'=>$modelEHS->id_voyage_incentive, 'CrewId'=>$cr->crew->CrewId,'type_incentive'=>'EHS'));
                if($existDataCrewEHS){
              $modelCrewEHS=$existDataCrewEHS;
            }else{
              $modelCrewEHS=new VoyageIncentiveCrew;
            }

          echo '<td style="text-align:right"> '.NumberAndCurrency::formatNumber($modelCrewFUEL->percentage).' % </td>';
          echo '<td style="text-align:right"> '.NumberAndCurrency::formatCurrency($modelCrewFUEL->amount).' </td>';
          echo '<td style="text-align:right"> '.NumberAndCurrency::formatNumber($modelCrewEHS->percentage).' % </td>';
          echo '<td style="text-align:right"> '.NumberAndCurrency::formatCurrency($modelCrewEHS->amount).' </td>';
        
          


          $totalPersenFuel=$totalPersenFuel+$modelCrewFUEL->percentage;
          $totalamountFuel=$totalamountFuel+$modelCrewFUEL->amount;
          $totalPersenEHS=$totalPersenEHS+$modelCrewEHS->percentage;
          $totalamountEHS=$totalamountEHS+$modelCrewEHS->amount;
      
    }else{
          $url = Yii::app()->createUrl("cre/sign", array('id_tug'=>$modelvoyage->BargingVesselTug));
          echo '
            <td style="font-style: italic;">Crew not available.<br><a href="'.$url.'">Assign Crew</a></td>  
            <td> - </td>
            <td> - </td>
            <td> - </td>
            <td> - </td>
            <td> - </td>
            <td> - </td> 
            ';
    }

    echo '
    </tr>
    ';
  }
  


  //TOTAL RESUME
    echo '<td colspan="4"> TOTAL </td>';
    echo '<td style="text-align:right; font-weight: bold"><b>'.NumberAndCurrency::formatNumber($totalPersenFuel).' %</b></td>';
    echo '<td style="text-align:right; font-weight: bold"><b>'.NumberAndCurrency::formatCurrency($totalamountFuel).'</b></td>';
    echo '<td style="text-align:right; font-weight: bold"><b>'.NumberAndCurrency::formatNumber($totalPersenEHS).' %</b></td>';
    echo '<td style="text-align:right; font-weight: bold"><b>'.NumberAndCurrency::formatCurrency($totalamountEHS).'</b></td>';
  
?>

</table>

</div>


<div class="form-actions">
  <?php $this->widget('bootstrap.widgets.TbButton', array(
      'buttonType'=>'submit',
      'type'=>'primary',
      'label'=>'Save',
    )); ?>
</div>


<?php $this->endWidget(); ?>




</div>


<script>
 $(document).ready(function(){

              if($('#totalfuelamount').val()==''){
                $('#totalfuelamount').val(0);
              }

              if($('#totalehsamount').val()==''){
                $('#totalehsamount').val(0);
              }

              



              $('#totalfuelamount').keyup(function () {  
                 // setiap karakter yang diketik selain angka akan langsung dihapus   
                  this.value = this.value.replace(/[^0-9\.]/g,'');
              });


            $('#totalehsamount').keyup(function () {  
                 // setiap karakter yang diketik selain angka akan langsung dihapus   
                  this.value = this.value.replace(/[^0-9\.]/g,'');
              });

              

 });
</script>



<?php

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
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

