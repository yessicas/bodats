<?php
$this->breadcrumbs=array(
	'Examination',
    $modelexam->exam_title,
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
<h4>Exam Questions </h4>
Soal  Exam <?php echo $modelexam->exam_title ?>  
<hr>

<!--timer -->
<?php if ( $modelexam->is_time_limited=='1'){ ?>
<div align ="right">
<div class="boxtimer">
Time Remaining : <span id="countdown" class="timer"></span>
</div>
</div>
<?php } ?>
<!--timer -->

</div>



<!-- reload page d]saat prtama masuk-->
<?php 
//$url = Yii::app()->createUrl('personal/examination_c/id/'.Yii::app()->session['id_exam'].'/dq/'.Yii::app()->session['displayQuestions']);
$url = Yii::app()->createUrl('personal/examination_c/id/'.Yii::app()->request->cookies['id_exam'.Yii::app()->user->id]->value.'/dq/'.Yii::app()->request->cookies['displayQuestions'.Yii::app()->user->id]->value);

?>

<script>
function reloadpage()
{
// location.reload(false);
// response.setIntHeader("Refresh", 1);
// window.location.reload(); 
// alert(document.URL);
window.location = '<?php echo $url ?>';
}
</script>


<?php 
if (isset($_GET['rel'])){
            echo '<script>reloadpage();</script>'; 
            /*
            $crit = new CDbCriteria();
            $crit->condition = 'id_exam=:id_exam AND userid=:userid';
            $crit->params = array(':id_exam'=>Yii::app()->session['id_exam'],':userid'=>Yii::app()->user->id);
            $crit->order="id_exam_score DESC";
            $crit->limit=1;

            $modelexam_sore=ExamScore::model()->find($crit);
            $modelexam_sore->time_remain=$modelexam_sore->time_remain+60;
            $modelexam_sore->save(false);  
           // time remaining nya di tambah dulu agar pas nanti ngeredirect tetap pada awal
           */
           // jika ada get rel  yang dimana otomatis saat mulai exam maka akan di arahkan ke url tanpa get rel
}
else if (!isset($_GET['rel'])){
    if ( $modelexam->is_time_limited=='1'){
            $crit = new CDbCriteria();
            $crit->condition = 'id_exam=:id_exam AND userid=:userid';
            //$crit->params = array(':id_exam'=>Yii::app()->session['id_exam'],':userid'=>Yii::app()->user->id);
            $crit->params = array(':id_exam'=>Yii::app()->request->cookies['id_exam'.Yii::app()->user->id]->value,':userid'=>Yii::app()->user->id);
            $crit->order="id_exam_score DESC";
            $crit->limit=1;

            $modelexam_sore=ExamScore::model()->find($crit);
            $modelexam_sore->time_remain=$modelexam_sore->time_remain-60;
            $modelexam_sore->save(false);  
        }

}
// jika tidak ada get rel yang artinya me reload dengan sengaja maka waktu akan di kurangi 1 menit 
?>
<!-- reload page disaat prtama masuk-->





<!-- info sukses-->
<script>
        function strrpos(haystack, needle, offset) {
          //  discuss at: http://phpjs.org/functions/strrpos/
          // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
          // bugfixed by: Onno Marsman
          // bugfixed by: Brett Zamir (http://brett-zamir.me)
          //    input by: saulius
          //   example 1: strrpos('Kevin van Zonneveld', 'e');
          //   returns 1: 16
          //   example 2: strrpos('somepage.com', '.', false);
          //   returns 2: 8
          //   example 3: strrpos('baa', 'a', 3);
          //   returns 3: false
          //   example 4: strrpos('baa', 'a', 2);
          //   returns 4: 2

          var i = -1;
          if (offset) {
            i = (haystack + '')
              .slice(offset)
              .lastIndexOf(needle); // strrpos' offset indicates starting point of range till end,
            // while lastIndexOf's optional 2nd argument indicates ending point of range from the beginning
            if (i !== -1) {
              i += offset;
            }
          } else {
            i = (haystack + '')
              .lastIndexOf(needle);
          }
          return i >= 0 ? i : false;
        }

        function allFine(data) {
            //var coba="7.2014-07-14 09:22:49";
            var str = data;
            var pos = strrpos(data, '.', false);
            var id_questions = str.substring(0,pos);
            var answer_time = str.substring(pos+1);
            var answer_time_format ="<?php echo Yii::app()->dateFormatter->formatDateTime("+answer_time+", 'short') ?>";
            // alert(id_questions);
            //alert(answer_time);
            //alert(answer_time_format);
           $("#result"+id_questions).html("<div class='alert alert-info' style='font-size:9px;padding:1px 1px 1px 1px;'>Saved at "+answer_time+"</div>");
           $(".animate"+id_questions).show();
           $(".animate"+id_questions).animate({opacity: 1.0}, 5000).fadeOut("slow");
          //$.fn.yiiListView.update('questionslistview', {   
                    //data: $(this).serialize()
               // });
        }
</script>
<!-- info sukses-->





<!-- proses klik jawaban -->
<script>
function checkbox(name,id,choice,id_question,maxchecked,number_choice)
{

    //alert(name);
    //alert(choice);

    //alert(name+choice);
    var number_of_checked=0;
    for (i = 1; i <= number_choice; i++) { 

            var el = document.getElementById(name+i);
            if( el.checked ==true){
                number_of_checked=number_of_checked+1;
            }
            
        }
    //alert(number_of_checked);

    if(number_of_checked>maxchecked){
     //alert("This Question Only "+maxchecked+" Point Can be Checked");
      $("#result"+id_question).html("<div class='alert alert-error' style='font-size:9px;padding:1px 1px 1px 1px;'>Failed.. Only "+maxchecked+" Point Can be Checked</div>");
      $(".animate"+id_question).show();
      $(".animate"+id_question).animate({opacity: 1.0}, 5000).fadeOut("slow");
     document.getElementById(id).checked=false;
    }
    else{
    //alert(x);
    var x = document.getElementById(id).checked;
    jQuery.ajax({'type':'post','success':allFine,'url':'<?php echo Yii::app()->request->baseUrl; ?>/personal/choosecheckboxanswer/id_score_detail/'+name+'/choice/'+choice+'/status/'+x+'/id_question/'+id_question,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
    }
      
}
</script>

<script>
function radiobutton(name,id,choice,id_question)
{

    //alert(name);
    //alert(choice);
    var x = document.getElementById(id).checked;
    //alert(x);
    jQuery.ajax({'type':'post','success':allFine,'url':'<?php echo Yii::app()->request->baseUrl; ?>/personal/chooseradiobuttonanswer/id_score_detail/'+name+'/choice/'+choice+'/status/'+x+'/id_question/'+id_question,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
       
}
</script>
<!-- proses klik jawaban -->





<!-- countdown -->

<?php 
//$urlgrade = Yii::app()->createUrl('personal/grade/id/'.Yii::app()->session['id_exam'].'/dq/'.Yii::app()->session['displayQuestions']);
//$urlupdatetimetemain = Yii::app()->createUrl('personal/updatetimeremain/id/'.Yii::app()->session['id_exam'].'/dq/'.Yii::app()->session['displayQuestions']);
$urlgrade = Yii::app()->createUrl('personal/grade/id/'.Yii::app()->request->cookies['id_exam'.Yii::app()->user->id]->value.'/dq/'.Yii::app()->request->cookies['displayQuestions'.Yii::app()->user->id]->value);
$urlupdatetimetemain = Yii::app()->createUrl('personal/updatetimeremain/id/'.Yii::app()->request->cookies['id_exam'.Yii::app()->user->id]->value.'/dq/'.Yii::app()->request->cookies['displayQuestions'.Yii::app()->user->id]->value);

?>


<?php
$userid=Yii::app()->user->id;
//$id_exam=Yii::app()->session['id_exam'];
$id_exam=Yii::app()->request->cookies['id_exam'.Yii::app()->user->id]->value;
$sql="SELECT * FROM exam_score where id_exam= $id_exam and userid='$userid'  order by id_exam_score DESC limit 0,1";
$lastexamscore=ExamScore::model()->findAllBySql($sql,array(
            'keyField' => 'id_exam_score'));
 foreach($lastexamscore as $list_lastexamscore){
        $id_exam_score=$list_lastexamscore->id_exam_score;
        $time_remain=$list_lastexamscore->time_remain;
    }
?>







<?php if ( $modelexam->is_time_limited=='1'){ ?>

<script>
var second= 60*1000; // 60 seconds
function updatetimeremain(){
//alert('update time remain'); 
jQuery.ajax({'type':'post','url':'<?php echo $urlupdatetimetemain ?>','cache':false,'data':jQuery(this).parents("form").serialize()});return false;
};
var countdownTimer = setInterval('updatetimeremain()', second);
</script>

<script>
var seconds = <?php echo $time_remain ?>;
//var seconds = 360;
function timerexam() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;  
    }
    if (minutes < 10) {
        minutes = "0" + minutes;  
    }

    document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        //document.getElementById('countdown').innerHTML = "Buzz Buzz";
         window.location = '<?php echo $urlgrade ?>';
    } else {
        seconds--;
    }
}
var countdownTimer = setInterval('timerexam()', 1000);

</script>

<?php } ?>


<!-- countdown -->







<div class="view">
<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
//'enableHistory'=>true,
//'ajaxUpdate'=>false,
//'enablePagination' => false,
'summaryText'=>'',
'id'=>'questionslistview', 
/*
'sortableAttributes'=>array(
        'attribute1',
        'attribute2',
        ),
*/
'itemView'=>'_viewquestions',
)); ?>
</div>


<?php 
    /* Input dialog with Javascript callback */
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'confirmgradedialog',
        'options'=>array(
            'title'=>'Confirmation',
            'autoOpen'=>false,
            'modal'=>true,
            'show' => 'blind',
            'hide' => 'explode',
            'width'=>450,
            'buttons'=>array(
                'Yes And Grade'=>'js:gotograde',
                'No'=>'js:function(){ $("#confirmgradedialog").dialog("close");}',
            ),
        ),
    ));

    echo'<div id="dialogbox"></div>';

    $this->endWidget('zii.widgets.jui.CJuiDialog');



?>

<script type="text/javascript" >
    function gotograde(){
        $(this).dialog("close");
        window.location = '<?php echo $urlgrade ?>';
        //alert('ok');
        //alert( $("#item-name-input").val() + " has been added");
    }
</script>

<div style="text-align:right">
<?php echo Chtml::ajaxLink('Finish And Grade',Yii::app()->createUrl('personal/confirmationgrade',
     array('asDialog'=>1)),array('type'=>'POST',
      'url'=>'js:$(this).attr("href")',
      'update'=>'#dialogbox'),array('class'=>'search-button btn btn-primary'));
?>
</div>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 'auto',
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
        'width'       => '500',
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
//if (isset(Yii::app()->request->cookies['must']) ){

//$cookie = new CHttpCookie('must', 5);
//$cookie->expire = time()+60*60*24*180; 
//Yii::app()->request->cookies['must'] = $cookie;

//unset(Yii::app()->request->cookies['must']);

//}
/*
else {
    Yii::app()->request->cookies['must']->value;
}
*/

//echo Yii::app()->request->cookies['must']->value;

//echo $id_exam=Yii::app()->request->cookies['id_exam']->value;
//echo $displayQuestions=Yii::app()->request->cookies['displayQuestions']->value;
?>

<?php
/*
function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

$random_numbers=UniqueRandomNumbersWithinRange(1,4,4);
print_r( UniqueRandomNumbersWithinRange(1,4,4) );

echo"<br>";
*/
//print_r(QuestionsDB::getrandomarray(4));
/*
$random_numbers=QuestionsDB::getrandomarray(4);
for ($i = 0; $i < count($random_numbers); ++$i) {

        print $random_numbers[$i];
        //echo'<br>';
        //echo $i+1;
    }
*/
          /*
             // hitungan confirmasi
            $datas = $dataProvider->getData();
            $total_data=$dataProvider->getItemCount();
            $answeredquestions=0;
            foreach ($datas as $list_data){
                $id_exam_score=$list_data->id_exam_score;
                if($list_data->choice1_answer==1||$list_data->choice2_answer==1||$list_data->choice3_answer==1||$list_data->choice4_answer==1||$list_data->choice5_answer==1||$list_data->choice6_answer==1||$list_data->choice7_answer==1){
                $answeredquestions=$answeredquestions+1;
                }
               //echo $list_data->id_exam_score_detail;
            }

            echo 'total ansewed questions '.$answeredquestions;
            echo "<br>";
            echo 'total questions '.$total_data;
            echo "<br>";
            //echo $id_exam_score;
            //echo"<br>";

            $sql_total_point_score_detail="SELECT SUM(total_point) AS total_point_examination FROM exam_score_detail where  id_exam_score='$id_exam_score' ";
            $total_point_score_detail=ExamScoreDetail::model()->findAllBySql($sql_total_point_score_detail,array(
                        'keyField' => 'id_exam_score'));
             foreach($total_point_score_detail as $list_total_point_score_detail){
                    $total_point_examination=$list_total_point_score_detail->total_point_examination;
                }
            echo 'total point ' .$total_point_examination;


            $sql_total_max_point_score_detail="SELECT SUM(max_point) AS total_max_point_examination FROM exam_score_detail where  id_exam_score='$id_exam_score' ";
            $total_max_point_score_detail=ExamScoreDetail::model()->findAllBySql($sql_total_max_point_score_detail,array(
                        'keyField' => 'id_exam_score'));
             foreach($total_max_point_score_detail as $list_total_max_point_score_detail){
                    $total_max_point_examination=$list_total_max_point_score_detail->total_max_point_examination;
                }
            echo "<br>";
            echo 'total Max point '.$total_max_point_examination;

            echo "<br>";
            //echo'final score '.floor(($total_point_examination/$total_max_point_examination)*100);
            $decimal_final_score=($total_point_examination/$total_max_point_examination)*100;
            $costumize_decimal_final_score=sprintf("%1.2f", $decimal_final_score);
            $final_score=$costumize_decimal_final_score;
            echo $final_score;
            */
?>


