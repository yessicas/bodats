<?php 
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

            echo " Are you Sure Finish This Exam ?";
            echo "<br>";
            echo " Soal Yang Sudah Dijawab ada  ".$answeredquestions." dari ".$total_data." Total soal";
            
?>
