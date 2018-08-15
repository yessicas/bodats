<?php

class PersonalController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/triplets';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(

array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('freeexam','viewexam','examination','examination_c','choosecheckboxanswer','chooseradiobuttonanswer','confirmationgrade','grade','summary','updatetimeremain'),
'users'=>array('*'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}


public function actionViewexam($id)
{

    if (isset(Yii::app()->request->cookies['examination'.Yii::app()->user->id]) ){
        $id_exam =Yii::app()->request->cookies['id_exam'.Yii::app()->user->id]->value;
        $displayQuestions=Yii::app()->request->cookies['displayQuestions'.Yii::app()->user->id]->value;

        Yii::app()->user->setFlash('success', "Anda Masih Mempunyai Ujian Yang Belum Selesai");
        $this->redirect(array('personal/examination_c','id'=>$id_exam,'dq'=>$displayQuestions));
    }

    else{

    $userid=Yii::app()->user->id;
    $model=$this->loadModel($id);

    $criteria = new CDbCriteria();
    $criteria->condition = "is_block = 1 AND  userid = :userid AND next_exam <= :datenow ";
    $criteria->params = array('userid'=>$userid,':datenow'=>date("Y-m-d"));
    $modellastexam=  ExamSummary::model()->find($criteria); 

    if($modellastexam){
    $modellastexam->is_block=0;
    $modellastexam->exam_remain=$model->number_try;
    $modellastexam->save();
    }


$this->render('viewexam',array(
'model'=>$model,
));

    }
}

public function actionfreeexam()
{

    
$model=new Exam('freeexam');
$modelhasexam=new Exam('hasexam');

$this->render('freeexam',array(
'model'=>$model,
'modelhasexam'=>$modelhasexam,
));
}


public function actionExamination()
{

if (isset($_POST['id_exam'])&&isset($_POST['displayQuestions'])){

$id_exam=$_POST['id_exam'];
$displayQuestions=$_POST['displayQuestions'];

if (isset(Yii::app()->request->cookies['examination'.Yii::app()->user->id]) ){
unset(Yii::app()->request->cookies['examination'.Yii::app()->user->id]);
unset(Yii::app()->request->cookies['id_exam'.Yii::app()->user->id]);
unset(Yii::app()->request->cookies['displayQuestions'.Yii::app()->user->id]);

/*
if (isset(Yii::app()->session['examination'])){
unset(Yii::app()->session['examination']);
unset(Yii::app()->session['id_exam']);
unset(Yii::app()->session['displayQuestions']);
*/
}


$this->redirect(array('personal/examination_c','id'=>$id_exam,'dq'=>$displayQuestions,'rel'=>'1'));

}


else {

Yii::app()->user->setFlash('error', "Maaf Anda Halaman Yang Anda Minta Tidak Ada");
        $this->redirect(array('personal/freeexam'));
}




}




public function actionExamination_c($id,$dq)
{


//if (isset($_POST['id_exam'])&&isset($_POST['displayQuestions'])){

//$id_exam=$_POST['id_exam'];
//$displayQuestions=$_POST['displayQuestions'];

$id_exam=$id;
$displayQuestions=$dq;

$userid=Yii::app()->user->id;
$datenow=date("Y-m-d");


$sql="SELECT * FROM exam_summary where id_exam= $id_exam and userid='$userid'  order by id_exam_summary DESC limit 0,1";
$lastexam=ExamSummary::model()->findAllBySql($sql,array(
            'keyField' => 'id_exam_summary'));
$modelexam=Exam::model()->findByPk($id_exam);



if (!isset(Yii::app()->request->cookies['examination'.Yii::app()->user->id]) ){

$cookie = new CHttpCookie('examination'.Yii::app()->user->id, $userid);
$cookie->expire = time()+$modelexam->duration_second; 
Yii::app()->request->cookies['examination'.Yii::app()->user->id] = $cookie;

$cookieidexam = new CHttpCookie('id_exam'.Yii::app()->user->id, $id_exam);
$cookieidexam->expire = time()+$modelexam->duration_second; 
Yii::app()->request->cookies['id_exam'.Yii::app()->user->id] = $cookieidexam;

$cookiedq = new CHttpCookie('displayQuestions'.Yii::app()->user->id, $displayQuestions);
$cookiedq->expire = time()+$modelexam->duration_second; 
Yii::app()->request->cookies['displayQuestions'.Yii::app()->user->id] = $cookiedq;

/*
if (!isset(Yii::app()->session['examination'])){
Yii::app()->session['examination'] = $userid;
Yii::app()->session['id_exam'] = $id_exam;
Yii::app()->session['displayQuestions'] = $displayQuestions;
*/


if ($lastexam==false) {

$modelexamsummary= new ExamSummary;
$modelexamsummary->id_exam=$id_exam;
$modelexamsummary->userid=$userid;
$modelexamsummary->score=0;
$modelexamsummary->exam_date=$datenow;
$modelexamsummary->exam_remain=$modelexam->number_try-1;
$modelexamsummary->is_block=0;
$modelexamsummary->next_exam='-';
$modelexamsummary->valid_until=$this->adddate($datenow,"+".$modelexam->validation_expired."day");
$modelexamsummary->save(false);

//$datas='awal kosong';
}


if ($lastexam==true) {


    foreach($lastexam as $list_lastexam){
        $exam_remain=$list_lastexam->exam_remain;
    }

    if ($exam_remain>0){

        $newremainingexam = $exam_remain-1;

        $modelexamsummary= new ExamSummary;
        $modelexamsummary->id_exam=$id_exam;
        $modelexamsummary->userid=$userid;
        $modelexamsummary->score=0;
        $modelexamsummary->exam_date=$datenow;

        if($newremainingexam >0){
            $modelexamsummary->exam_remain=$newremainingexam;
            $modelexamsummary->is_block=0;
            $modelexamsummary->next_exam='-';
            $modelexamsummary->valid_until=$this->adddate($datenow,"+".$modelexam->validation_expired."day");
           // $datas= 'udah ada isi tp blum block' ;
        }
      if ($newremainingexam==0){
            $modelexamsummary->exam_remain=$newremainingexam;
            $modelexamsummary->is_block=1;
            $modelexamsummary->next_exam=$this->adddate($datenow,"+".$modelexam->next_try_expired."day");;
            $modelexamsummary->valid_until=$this->adddate($datenow,"+".$modelexam->validation_expired."day");
           // $datas= 'terakhir dan di block' ;
        }
        
        $modelexamsummary->save(false);    
        
    }

    if ($exam_remain==0){
        Yii::app()->user->setFlash('error', "Maaf Anda Tidak Bisa Mengikuti Ujian Sampai diperbolehkan");
        $this->redirect(array('personal/freeexam'));
    }


}


$modelexam->number_participant=$modelexam->number_participant+1;
$modelexam->save(false);
//update participant 

$this->render('examination',array(
'dataProvider'=>$this->loadnewquestion($id_exam,$displayQuestions,$modelexam),
'modelexam'=>$modelexam,
));
}

//}


if (isset(Yii::app()->request->cookies['examination'.Yii::app()->user->id]) ){
$id_exam=Yii::app()->request->cookies['id_exam'.Yii::app()->user->id]->value;
$displayQuestions=Yii::app()->request->cookies['displayQuestions'.Yii::app()->user->id]->value;

/*
if (isset(Yii::app()->session['examination'])){
$id_exam = Yii::app()->session['id_exam'];
$displayQuestions=Yii::app()->session['displayQuestions'];
*/
$this->render('examination',array(
'dataProvider'=>$this->loadquestion($id_exam,$displayQuestions),
'modelexam'=>$modelexam,
));

}



/*
else {

Yii::app()->user->setFlash('error', "Maaf Anda Halaman Yang Anda Minta Tidak Ada");
        $this->redirect(array('personal/freeexam'));
}
*/

}


public function actionchoosecheckboxanswer($id_score_detail,$choice,$status,$id_question){

$choice_answer='choice'.$choice.'_answer';
$point_answer='point'.$choice.'_answer';
$score='score_choice'.$choice;
$modelexamquestion=ExamQuestion::model()->findByPk($id_question);

if ($status=='true'){
    $choosenvalue='1';
    $pont_score=$modelexamquestion->$score;
    //$timenow=date("Y-m-d H:i:s");
}
else{
    $choosenvalue='0';
    $pont_score='0';
   // $timenow='0000-00-00 00:00:00';
}

$model=ExamScoreDetail::model()->findByPk($id_score_detail);
$model->$choice_answer=$choosenvalue;
$model->$point_answer=$pont_score;
//$model->answer_time=$timenow;
$model->answer_time= date("Y-m-d H:i:s");
$model->save(false);   



$modelsaveddetail=ExamScoreDetail::model()->findByPk($id_score_detail);
$total_point=0;
for ($i = 1; $i <= $modelexamquestion->number_choice; $i++){
$fieldpointchoice='point'.$i.'_answer';
$total_point=$total_point+$modelsaveddetail->$fieldpointchoice;
}
$modelsaveddetail->total_point=$total_point; 
$modelsaveddetail->save(false); 


echo $id_question.'.'.Yii::app()->dateFormatter->formatDateTime($model->answer_time, 'medium');
}

public function actionchooseradiobuttonanswer($id_score_detail,$choice,$status,$id_question){

$choice_answer='choice'.$choice.'_answer';
$point_answer='point'.$choice.'_answer';
$score='score_choice'.$choice;
$modelexamquestion=ExamQuestion::model()->findByPk($id_question);
$pont_score=$modelexamquestion->$score;
$choosenvalue='1';
$unchoosenvalue='0';


$modelresetdetail=ExamScoreDetail::model()->findByPk($id_score_detail);
for ($i = 1; $i <= $modelexamquestion->number_choice; $i++){

$fieldnamechoice='choice'.$i.'_answer';
$fieldpointchoice='point'.$i.'_answer';

$modelresetdetail->$fieldnamechoice=$unchoosenvalue;
$modelresetdetail->$fieldpointchoice=$unchoosenvalue;
}
$modelresetdetail->save(false); 



$model=ExamScoreDetail::model()->findByPk($id_score_detail);
$model->$choice_answer=$choosenvalue;
$model->$point_answer=$pont_score;
$model->answer_time= date("Y-m-d H:i:s");
$model->save(false);  


$modelsaveddetail=ExamScoreDetail::model()->findByPk($id_score_detail);
$total_point=0;
for ($i = 1; $i <= $modelexamquestion->number_choice; $i++){
$fieldpointchoice='point'.$i.'_answer';
$total_point=$total_point+$modelsaveddetail->$fieldpointchoice;
}
$modelsaveddetail->total_point=$total_point; 
$modelsaveddetail->save(false); 


echo $id_question.'.'.Yii::app()->dateFormatter->formatDateTime($model->answer_time, 'medium');


}

public function loadModel($id)
{
$model=Exam::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

public function adddate($vardate,$added)
{
$data = explode("-", $vardate);
$date = new DateTime();
$date->setDate($data[0], $data[1], $data[2]);
$date->modify("".$added."");
$day= $date->format("Y-m-d");
return $day;
}

public function loadquestion($id_exam,$displayQuestions)
{


$userid=Yii::app()->user->id;
$sql="SELECT * FROM exam_score where id_exam= $id_exam and userid='$userid'  order by id_exam_score DESC limit 0,1";
$lastexamscore=ExamScore::model()->findAllBySql($sql,array(
            'keyField' => 'id_exam_score'));




    if($lastexamscore==false){
        throw new CHttpException(404,'The requested page does not exist.');
    }

    else {

         foreach($lastexamscore as $list_lastexamscore){
                $id_exam_score=$list_lastexamscore->id_exam_score;
            }

        $criteriaquestionsdetail = new CDbCriteria();
        $criteriaquestionsdetail->condition = 'id_exam_score=:id_exam_score';
        $criteriaquestionsdetail->params = array(':id_exam_score'=>$id_exam_score);

        $dataProvider=new CActiveDataProvider('ExamScoreDetail',array(
        'criteria'=>$criteriaquestionsdetail,
        'sort'=>array(
               'defaultOrder'=>' no_question ASC ',
                    ),
                'pagination'=>array(
                                'pageSize'=>5,
                        ),
                'totalItemCount' => $displayQuestions,
        ));

        return $dataProvider;
    }




}


public function loadnewquestion($id_exam,$displayQuestions,$modelexam)
{
$timenow=date("Y-m-d H:i:s");

            $x = new CDbCriteria();
            $x->condition = 'id_exam=:id_exam';
            $x->params = array(':id_exam'=>$id_exam);
            $varianmodel=ExamVarians::model()->findAll($x);
            //$slicerandom=count($varianmodel)-1;
            $array= array();
            $i=0;
            foreach($varianmodel as $list_xmodel){
                $i++;
                //echo $list_xmodel->no_question."<br>";
                 $array[$i]= $list_xmodel->id_exam_varians;
            }
            

            if(empty($array)){

                if(Exam::model()->failedopenexamvariananddelete(Yii::app()->user->id,$id_exam)){
                    Yii::app()->user->setFlash('error', "Maaf Ujian Ini Belum Ada Soalnya ");
                    $this->redirect(array('personal/freeexam'));
                }
            }

            $datas= array_rand($array,1);
            $id_exam_varians=$array[$datas];


            $modelexamscore= new ExamScore;
            $modelexamscore->id_exam=$id_exam;
            $modelexamscore->id_exam_varians=$id_exam_varians;///
            $modelexamscore->userid=Yii::app()->user->id;
            $modelexamscore->start_exam=$timenow;
            $modelexamscore->end_exam="000-00-00 00:00:00";
            $modelexamscore->status_active=1;
            $modelexamscore->status_finish=0;

            if ( $modelexam->is_time_limited=='1'){
            $modelexamscore->time_remain=$modelexam->duration_second+60;// ditambah dulu satu menit soalnya nanti pas rdirect akan di kurang satu menit
            }

            if ( $modelexam->is_time_limited=='0'){
            $modelexamscore->time_remain=$modelexam->duration_second;
            }

            $modelexamscore->final_score=0;
            $modelexamscore->number_question_answered=0;
            $modelexamscore->total_number_question=$displayQuestions;
            $modelexamscore->save(false);


$criteria = new CDbCriteria();
$criteria->condition = 'id_exam_varians=:id_exam_varians';
$criteria->limit=$displayQuestions;
$criteria->order="RAND()"; 
$criteria->params = array(':id_exam_varians'=> $modelexamscore->id_exam_varians);


$questions = ExamQuestion::model()->findAll($criteria); 
$no=1;
foreach($questions as $list_questions){

            $modelexamscore_detail= new ExamScoreDetail;
            $modelexamscore_detail->id_exam_score=$modelexamscore->id_exam_score;
            $modelexamscore_detail->id_question=$list_questions->id_question;
            $modelexamscore_detail->id_question_type=$list_questions->question_type;
            $modelexamscore_detail->no_question=$no;
            $modelexamscore_detail->total_point=0;
            $modelexamscore_detail->max_point=$list_questions->max_score;
            $modelexamscore_detail->answer_time=0;
            $modelexamscore_detail->save(false);
            $no++;
         }


$criteriaquestionsdetail = new CDbCriteria();
$criteriaquestionsdetail->condition = 'id_exam_score=:id_exam_score';
$criteriaquestionsdetail->params = array(':id_exam_score'=>$modelexamscore->id_exam_score);

$dataProvider=new CActiveDataProvider('ExamScoreDetail',array(
'criteria'=>$criteriaquestionsdetail,
'sort'=>array(
       'defaultOrder'=>' no_question ASC ',
            ),
        'pagination'=>array(
                        'pageSize'=>5,
                ),
        'totalItemCount' => $displayQuestions,
));

return $dataProvider;


}


public function actionconfirmationgrade()
 {
    /*
    $id_exam = Yii::app()->session['id_exam'];
    $displayQuestions=Yii::app()->session['displayQuestions'];
    */
    $id_exam =Yii::app()->request->cookies['id_exam'.Yii::app()->user->id]->value;
    $displayQuestions=Yii::app()->request->cookies['displayQuestions'.Yii::app()->user->id]->value;

    

    if (Yii::app()->request->isAjaxRequest)
    {
        $this->renderPartial('confirmationgrade',
           array('dataProvider'=>$this->loadquestion($id_exam,$displayQuestions)),false,true);
        if (!empty($_GET['asDialog']))
           echo CHtml::script('$("#confirmgradedialog").dialog("open")');
        Yii::app()->end();
    }
    else
    {
       $this->render('confirmationgrade',array(
          'dataProvider'=>$this->loadquestion($id_exam,$displayQuestions),
       ));
    }
 }


 public function actiongrade($id,$dq)
 {
    $userid=Yii::app()->user->id;
    $id_exam=$id;
    $displayQuestions=$dq;
    $dataProvider=$this->loadquestion($id_exam,$displayQuestions);
    $datas = $dataProvider->getData();
            foreach ($datas as $list_dataprovider){
                $id_exam_score=$list_dataprovider->id_exam_score;
               //echo $list_data->id_exam_score_detail;
            }


            $criteria = new CDbCriteria();
            $criteria->condition = 'id_exam_score=:id_exam_score';
            $criteria->params = array(':id_exam_score'=>$id_exam_score);
            $exandetail = ExamScoreDetail::model()->findAll($criteria); 
            $total_data=count($exandetail);

            $answeredquestions=0;
            foreach($exandetail as $list_data){
             if($list_data->choice1_answer==1||$list_data->choice2_answer==1||$list_data->choice3_answer==1||$list_data->choice4_answer==1||$list_data->choice5_answer==1||$list_data->choice6_answer==1||$list_data->choice7_answer==1){
                $answeredquestions=$answeredquestions+1;
                }
           }

             // hitung score
            $sql_total_point_score_detail="SELECT SUM(total_point) AS total_point_examination FROM exam_score_detail where  id_exam_score='$id_exam_score' ";
            $total_point_score_detail=ExamScoreDetail::model()->findAllBySql($sql_total_point_score_detail,array(
                        'keyField' => 'id_exam_score'));
             foreach($total_point_score_detail as $list_total_point_score_detail){
                    $total_point_examination=$list_total_point_score_detail->total_point_examination;
                }
           // echo 'total point ' .$total_point_examination;


            $sql_total_max_point_score_detail="SELECT SUM(max_point) AS total_max_point_examination FROM exam_score_detail where  id_exam_score='$id_exam_score' ";
            $total_max_point_score_detail=ExamScoreDetail::model()->findAllBySql($sql_total_max_point_score_detail,array(
                        'keyField' => 'id_exam_score'));
             foreach($total_max_point_score_detail as $list_total_max_point_score_detail){
                    $total_max_point_examination=$list_total_max_point_score_detail->total_max_point_examination;
                }

            $decimal_final_score=($total_point_examination/$total_max_point_examination)*100;
            $costumize_decimal_final_score=sprintf("%1.2f", $decimal_final_score);
            $final_score=$costumize_decimal_final_score;
            //echo "<br>";
            //echo 'total Max point '.$total_max_point_examination;

            //echo "<br>";
            //echo'final score '.$final_score;
            
            $modelexam_score=ExamScore::model()->findByPk($id_exam_score);
            $modelexam_score->number_question_answered=$answeredquestions;
            $modelexam_score->final_score=$final_score;
            $modelexam_score->status_finish=1;
            $modelexam_score->status_active=0;
            $modelexam_score->end_exam= date("Y-m-d H:i:s");
            $modelexam_score->save(false);  


            $crit = new CDbCriteria();
            $crit->condition = 'id_exam=:id_exam AND userid=:userid';
            $crit->params = array(':id_exam'=>$id_exam,':userid'=>$userid);
            $crit->order="id_exam_summary DESC";
            $crit->limit=1;

            $modelexam_summary=ExamSummary::model()->find($crit);
            $modelexam_summary->score=$final_score;
            $modelexam_summary->save(false);  

            /*
            unset(Yii::app()->session['examination']);
            unset(Yii::app()->session['id_exam']);
            unset(Yii::app()->session['displayQuestions']);
            */
            unset(Yii::app()->request->cookies['examination'.Yii::app()->user->id]);
            unset(Yii::app()->request->cookies['id_exam'.Yii::app()->user->id]);
            unset(Yii::app()->request->cookies['displayQuestions'.Yii::app()->user->id]);

            Yii::app()->user->setFlash('info', " Selamat Anda Telah Selesai Ujian");
            $this->redirect(array('personal/summary','id'=>$id_exam,'dq'=>$displayQuestions));


 }

  public function actionsummary($id,$dq)
 {
    $userid=Yii::app()->user->id;
    $id_exam=$id;
    $displayQuestions=$dq;
    $dataProvider=$this->loadquestion($id_exam,$displayQuestions);
    $datas = $dataProvider->getData();
            foreach ($datas as $list_dataprovider){
                $id_exam_score=$list_dataprovider->id_exam_score;
               //echo $list_data->id_exam_score_detail;
            }


            $criteria = new CDbCriteria();
            $criteria->condition = 'id_exam_score=:id_exam_score';
            $criteria->params = array(':id_exam_score'=>$id_exam_score);
            $exandetail = ExamScoreDetail::model()->findAll($criteria); 
            $total_data=count($exandetail);

            $answeredquestions=0;
            foreach($exandetail as $list_data){
             if($list_data->choice1_answer==1||$list_data->choice2_answer==1||$list_data->choice3_answer==1||$list_data->choice4_answer==1||$list_data->choice5_answer==1||$list_data->choice6_answer==1||$list_data->choice7_answer==1){
                $answeredquestions=$answeredquestions+1;
                }
           }

             // hitung score
            $sql_total_point_score_detail="SELECT SUM(total_point) AS total_point_examination FROM exam_score_detail where  id_exam_score='$id_exam_score' ";
            $total_point_score_detail=ExamScoreDetail::model()->findAllBySql($sql_total_point_score_detail,array(
                        'keyField' => 'id_exam_score'));
             foreach($total_point_score_detail as $list_total_point_score_detail){
                    $total_point_examination=$list_total_point_score_detail->total_point_examination;
                }
           // echo 'total point ' .$total_point_examination;


            $sql_total_max_point_score_detail="SELECT SUM(max_point) AS total_max_point_examination FROM exam_score_detail where  id_exam_score='$id_exam_score' ";
            $total_max_point_score_detail=ExamScoreDetail::model()->findAllBySql($sql_total_max_point_score_detail,array(
                        'keyField' => 'id_exam_score'));
             foreach($total_max_point_score_detail as $list_total_max_point_score_detail){
                    $total_max_point_examination=$list_total_max_point_score_detail->total_max_point_examination;
                }

            $decimal_final_score=($total_point_examination/$total_max_point_examination)*100;
            $costumize_decimal_final_score=sprintf("%1.2f", $decimal_final_score);
            $final_score=$costumize_decimal_final_score;

            $modelexam=Exam::model()->findByPk($id_exam);




if($dataProvider==false){
    throw new CHttpException(404,'The requested page does not exist.');
}

else {
    $this->render('summary',array(
    'total_questions'=>$total_data,
    'answeredquestions'=>$answeredquestions,
    'final_score'=>$final_score,
    'modelexam'=>$modelexam,
    ));
}


}

public function actionupdatetimeremain($id,$dq)
{
    $userid=Yii::app()->user->id;
    $id_exam=$id;
    $displayQuestions=$dq;
            $crit = new CDbCriteria();
            $crit->condition = 'id_exam=:id_exam AND userid=:userid';
            $crit->params = array(':id_exam'=>$id_exam,':userid'=>$userid);
            $crit->order="id_exam_score DESC";
            $crit->limit=1;

            $modelexam_sore=ExamScore::model()->find($crit);
            $modelexam_sore->time_remain=$modelexam_sore->time_remain-60;
            $modelexam_sore->save(false);  
}


}
