<?php
$this->breadcrumbs=array(
	'Examination Summary' ,
    $modelexam->exam_title,
);


?>

<div class="well">
<h4>Exam Summary </h4>
Soal  Exam <?php echo $modelexam->exam_title ?>  
<hr>
</div>

<?php
if(Yii::app()->user->hasFlash('info')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'info' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>

<div class="view">
<?php
echo "Anda Telah Menyelesaikan Ujian ".$modelexam->exam_title.", dan berikut hasilnya : ";
echo"<br>";
echo "Total soal yang di jawab : ".$answeredquestions;
echo " dari total soal : ".$total_questions;
echo"<br>";
echo "Score anda : ".$final_score;
echo"<br>";
?>

<div align="right">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'url'=>array('personal/freeexam'),   
			'label'=> 'Back To Free Exam',
		)); ?>
</div>
</div>