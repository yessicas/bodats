<?php
$this->breadcrumbs=array(
	'Free Exam'=>array('freeexam'),
	$model->exam_title,
);

$this->menu=array(
array('label'=>'List Exam','url'=>array('index')),
array('label'=>'Create Exam','url'=>array('create')),
array('label'=>'Update Exam','url'=>array('update','id'=>$model->id_exam)),
array('label'=>'Delete Exam','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_exam),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Delete Exam','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_exam),'confirm'=>'Apakah anda yakin akan menghapus data ini?')),
array('label'=>'Manage Exam','url'=>array('admin')),
);
?>


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
<div class="well">
<h4> Exam  <?php echo $model->exam_title; ?></h4>
<hr>
</div>

<div class="alert alert-block alert-error">
<p align ="justify">
<?php if (CHtml::encode($model->exam_turn(Yii::app()->user->id))>0){?>

Anda Harus Ujian Secara Kontinyu Selama Durasi Waktu Tersebut.
Jika anda keluar sebelum waktunya, maka ujian anda dianggap selesai dan anda dinilai berdasarkan nilai yang ada. 
</p>
Perhatikan bahwa anda masih punya kesempatan  <?php echo CHtml::encode($model->exam_turn(Yii::app()->user->id));?>  kali lagi Untuk Mengikuti Ujian Ini !
<?php }?>

<?php if (CHtml::encode($model->exam_turn(Yii::app()->user->id))==0){?>
    Anda Tidak Memiliki lagi Kesempatan ujian Sampai Pada Tanggal <?php echo CHtml::encode(Yii::app()->dateFormatter->formatDateTime($model->nextexam(Yii::app()->user->id), 'long', false))?>
<?php }?>
</div>

<?php 

echo CHtml::beginForm(array('personal/examination'),'post',array('name'=>'dataexam', 'target'=>'_blank', 'onSubmit'=>'return input_data_exam(this)'));

echo CHtml::hiddenField('id_exam', $model->id_exam);

$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'type'=>'striped bordered condensed',
'attributes'=>array(
	//array('label'=>'Label','name'=>'attribute','value'=>'value'),
	/*
	array(
		'name' => 'hak_akses',
		'type' => 'raw',
		'value' => CHtml::encode($model->ubahAkses()),
		),
	*/
		//'id_exam',
		'exam_title',
		'question_number',
		//'duration_second',
        array(
        'name' => 'is_time_limited',
        'type' => 'raw',
        'value' => CHtml::encode($model->limitedtime()),
        ),

        array(
        'label' => 'Duration',
        'type' => 'raw',
        'value' => CHtml::encode($model->durations()),
        ),
		//'is_time_limited',
        array(
        'label' => 'Your Turn',
        //'visible' => Yii::app()->user->id=='ichsanmust',
        'type' => 'raw',
        'value' => CHtml::encode($model->exam_turn(Yii::app()->user->id)),
        ),

        array(
        'label' => 'Next Exam',
        'visible' => CHtml::encode($model->exam_turn(Yii::app()->user->id))==0,
        'type' => 'raw',
        //'value' => CHtml::encode($model->nextexam(Yii::app()->user->id)),
        'value'=>CHtml::encode(Yii::app()->dateFormatter->formatDateTime($model->nextexam(Yii::app()->user->id), 'long', false)),
        ),

        array('label'=>'Display Questions',
        'type'=>'raw',
         'visible' => CHtml::encode($model->exam_turn(Yii::app()->user->id))>0,
        'value'=>CHtml::dropDownlist("displayQuestions","",  array("1" => "1", "3" => "3", "5" => "5", "10" => "10", "20" => "20") ,array("class"=>"span3",
         "id" => "displayQuestions","prompt"=>"--Pilih --")),
          ),

         array('label'=>'',
        'type'=>'raw',
         'visible' => CHtml::encode($model->exam_turn(Yii::app()->user->id))>0,
        'value'=>CHtml::button('Start Exam', array('type'=>'submit' , 'class'=>'btn btn-primary')),
          ),
        //'number_try',
        //'validation_expired',
        //'next_try_expired', 
        //'number_participant',
),
)); ?>

<?php echo CHtml::endForm(); ?>


<script>
function input_data_exam(dataexam){

  if (dataexam.displayQuestions.value == ""){
    alert("Display Questions Cannot Blank");
    dataexam.displayQuestions.focus();
    return (false);
  }
      
  return (true);
}
  
  </script>

<?
/*
$a=array("red","green","blue","yellow","brown");
$random_keys=array_rand($a,3);
echo $a[$random_keys[0]]."<br>";
echo $a[$random_keys[1]]."<br>";
echo $a[$random_keys[2]];
 // ekxperimen
echo'<br>';
print_r($a);
echo $dataarray=min($random_keys);
echo $a[$random_keys[$dataarray]];
 // ekxperimen
*/
//$ar=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
//print_r(array_rand($ar,1));
//$dada= array_rand($ar,1);
//echo$ar[$dada];




// ali eksperimen buat di pake 
/*
            $x = new CDbCriteria();
            $x->condition = 'id_exam=:id_exam';
            $x->params = array(':id_exam'=>1);
            $varianmodel=ExamVarians::model()->findAll($x);
            $slicerandom=count($varianmodel)-1;
            $array= array();
            $i=0;
            foreach($varianmodel as $list_xmodel){
                $i++;
                //echo $list_xmodel->no_question."<br>";
                 $array[$i]= $list_xmodel->id_exam_varians;
            }
            //echo'<br>';
            //print_r($array);
            //echo'<br>';
            
            echo'<br>';
            //$random_varians=array_rand($array,$slicerandom);
            //echo $array[$random_varians[0]]."<br>";
            //echo $array[$random_varians[1]]."<br>";
            //$datasarray=min($random_varians);
            //echo $array[$random_varians[$datasarray]];

            $datas= array_rand($array,1);
            echo $array[$datas];
 
           
*/
     
     //echo floor(-5.567);
    /*
     $bil1 = 17.127281738247323278;
     $costumize_decimal=sprintf("%1.2f", $bil1);
     echo $costumize_decimal;
    */
?>