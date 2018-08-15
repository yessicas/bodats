<?php

require('lib/Gantti.php'); 
?>

<div id="content">
<h2>Viessel Schedule</h2>
<hr>
</div>


<div class="view">

  <!--search -->
<?php echo CHtml::beginForm(array('vesopr/schedule'),'get'); ?>
    
  
    Month &nbsp&nbsp
   <?php echo chtml::dropDownList('monthseacrh',$monthseacrh,Timeanddate::getlistmonth(),array('class'=>'span2')); ?> &nbsp &nbsp &nbsp

    Year &nbsp &nbsp &nbsp
   <?php echo chtml::dropDownList('yearseacrh',$yearseacrh,Timeanddate::getlistyear(),array('class'=>'span2')); ?>

   <br>

    Type &nbsp &nbsp &nbsp
   <?php 
   $listdatatypevessel=array( '' =>'ALL', 'TUG' =>'TUG', 'BARGE' =>'BARGE' );  
   echo chtml::dropDownList('vesseltypesearch',$vesseltypesearch,$listdatatypevessel,array('class'=>'span2')); 
   ?> &nbsp &nbsp &nbsp

    Name &nbsp&nbsp
   <?php echo chtml::textField('vesselnamesearch',$vesselnamesearch,array('class'=>'span3')); ?>
  
<br> <br>
 
    <div  align="left">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Search',
        )); ?>

    </div>
<?php echo CHtml::endForm(); ?>
  <!-- end search -->

    
    <!--tombol next an previous  -->
    <?php 
    $datenow=$yearseacrh.'-'.$monthseacrh.'-01';
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

    <?php 
    $this->widget('bootstrap.widgets.TbButton', array(
                'type'=>'inverse',
                'size'=>'small',
                'icon'=>'chevron-left white',
                'url'=>array('vesopr/schedule',
                  'monthseacrh'=>$bulan_sebelumnya, 
                  'yearseacrh'=>$tahun_sebelumnya, 
                  'vesseltypesearch'=>$vesseltypesearch,
                  'vesselnamesearch'=>$vesselnamesearch),   
            )); 
    ?>
    <div style ="float:right;">
    <?php 
    $this->widget('bootstrap.widgets.TbButton', array(
                'type'=>'inverse',
                'size'=>'small',
                'icon'=>'chevron-right white',
                 'url'=>array('vesopr/schedule',
                  'monthseacrh'=>$bulan_setelahnya, 
                  'yearseacrh'=>$tahun_setelahnya, 
                  'vesseltypesearch'=>$vesseltypesearch,
                  'vesselnamesearch'=>$vesselnamesearch),  
            )); 

     ?>
    </div>

    <!--end tombol next an previous  -->


</div>








<?php 

if(count($group_all_tug)>0){
$tug_shcedule = new Gantti($group_all_tug, array(
  'title'      => 'Vessel Tug',
  'cellwidth'  => 22,
  'cellheight' => 35,
  'today'      => false
));

echo $tug_shcedule;
echo '<br>';
}


if(count($group_all_barge)>0){
$barge_schedule = new Gantti($group_all_barge, array(
  'title'      => 'Vessel Barge',
  'cellwidth'  => 22,
  'cellheight' => 35,
  'today'      => false
));

echo $barge_schedule;
echo '<br>';
}

if(count($group_all_tug)==0 && count($group_all_barge) ==0 ) {
  echo'<center>';
  echo'<div class="alert in alert-block fade alert-danger">
  Tidak ditemukan Vessel Schedule
  </div>';
  echo'</center>';
}

 ?>





















<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
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













 <?php

 
/*

 $dataddd = array();

$dataddd[] = array(
  'id'=>'1',
  'label' => 'Project 1',
  'urlblock'=>'url',
  'urlclass'=>'popup',
  'start' => '2014-01-5', 
  'end'   => '2014-01-11',
  'class' => 'shipping-order',
);


$dataddd[] = array(
  'id'=>'1',
  'label' => 'Project 1',
  'urlblock'=>'url',
  'urlclass'=>'popup',
  'start' => '2014-01-12', 
  'end'   => '2014-01-23',
  'class' => 'voyage-order',
);

$dataddd[] = array(
  'id'=>'4',
  'label' => 'Project 2',
  'urlblock'=>'url',
  'urlclass'=>'popup',
  'start' => '2014-01-11', 
  'end'   => '2014-01-12',
  'class' => 'sailing',
);


$dataddd[] = array(
  'id'=>'5',
  'label' => 'Project 3',
  'urlblock'=>'url',
  'urlclass'=>'popup',
  'start' => '2014-01-23', 
  'end'   => '2014-01-25',
  'class' => 'maintenence',
);


//print_r($dataddd);


$result = array();
foreach ($dataddd as $datasx) {
  $id = $datasx['id'];
  if (isset($result[$id])) {
     $result[$id][] = $datasx;
  } else {
     $result[$id] = array($datasx);
  }
}

//print_r($result);
$re=$result;
//echo'<br>';

/*
Array ( 

        [1] => Array (
           [0] => Array ( [id] => 1 [label] => Project 1 [urlblock] => url [urlclass] => popup [start] => 2014-01-5 [end] => 2014-01-13 [class] => shipping-order )
           [1] => Array ( [id] => 1 [label] => Project 1 [urlblock] => url [urlclass] => popup [start] => 2014-01-12 [end] => 2014-01-23 [class] => voyage-order ) 
               )
        [2] => Array ( 
           [0] => Array ( [id] => 2 [label] => Project 2 [urlblock] => url [urlclass] => popup [start] => 2014-01-11 [end] => 2014-01-12 [class] => sailing ) 
                )
        [3] => Array (
           [0] => Array ( [id] => 3 [label] => Project 3 [urlblock] => url [urlclass] => popup [start] => 2014-01-23 [end] => 2014-01-25 [class] => maintenence ) 
                )
      
      )

*/


/*
$contoh = new Gantti($re, array(
  'title'      => 'Transhipmount',
  'cellwidth'  => 22,
  'cellheight' => 35,
  'today'      => false
));



echo $contoh;

/*
foreach ($re as $key => $val) {
        
          if(count($re[$key])==1){
             echo'ul';
             print $re[$key][0]['label'];
             echo'ul';
             echo'<br>';
          }

          else if(count($re[$key])>1){

          echo 'ul';
          echo'<br>';

          for ($h = 0; $h < count($re[$key]); ++$h) {
          print $re[$key][$h]['label'].'-'.$re[$key][$h]['start'];
          echo'<br>';
          }

          echo 'ul';
          echo'<br>';
         
          
      }

    
        
    }

//echo'<br>';
//for ($h = 0; $h < count($re[1]); ++$h) {
 //       print $re[1][$h]['label'];
 //   }

foreach ($group_data_shiping_order_tug as $key => $val) {
    echo "[ $key ] = $val<br/>";
}

print_r($group_data_shiping_order_tug[5]);



*/
  ?>
