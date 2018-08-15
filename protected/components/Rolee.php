
<?php
class Rolee{

    public static function Getrole()
 {
         if (!Yii::app()->user->isGuest) {
              $model = new Authassignment();
              $datas = $model->findByAttributes(array('userid'=>Yii::app()->user->id));
               

                return $datas->itemname;

   }

}
}