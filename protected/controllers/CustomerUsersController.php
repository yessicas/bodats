<?php

class CustomerUsersController extends Controller
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
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','update','view','create','index'),
'roles'=>array('ADM'),
),
array('deny',  // deny all users
'roles'=>array('CUS','MKT','OPR','FIC','CRW','NAU'),
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new CustomerUsers;


// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['CustomerUsers']))
{
$model->attributes=$_POST['CustomerUsers'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('view','id'=>$model->id_customer_user));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('create',array(
'model'=>$model,
));
}

public function actionCreate2()
{
$model=new Users;


// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Users']))
{
      $model->attributes=$_POST['Users'];
      $model->ip_addr_created=$_SERVER['REMOTE_ADDR'];
      $model->created_date=date("Y-m-d H:i:s");
      $model->type = "CUS";
      $model->userid= $_POST['Users']['userid'];
      $model->CompanyName= $_POST['Users']['CompanyName'];
     
        if($model->save()){

              $pass=Users::model()->findByPk($model->userid);
              $pass->code_id=SecurityGenerator::CodeIdGenerate($model->userid); //encryp code_id
              $enkripted_password=SecurityGenerator::CodeIdGenerate($model->password); // mengenkripsi password
              $pass->password=$enkripted_password;
              $pass->security_code=SecurityGenerator::CodeIdGenerate($enkripted_password); // mengenkripsi password yang sudah di enkripsi
              $pass->save(false);


            $model2=new CustomerUsers;
            $model2->userid=$model->userid;
            $model2->id_customer=$model->CompanyName;
            $model2->save();
           
    
            $modelauthassigment= new Authassignment;
            $modelauthassigment->itemname=$model->type;
            $modelauthassigment->userid=$model->userid;
            $modelauthassigment->bizrule='';
            $modelauthassigment->data='';
            $modelauthassigment->save();

        Yii::app()->user->setFlash('success', " Data Saved");
        $this->redirect(array('zone/masuserof'));
        }
        }
        if(Yii::app()->request->getIsAjaxRequest())
        {
                  echo $this->renderPartial('create2',array('model'=>$model),true,true);//This will bring out the view along with its script.
                  }

        else 
        $this->render('create2',array(
        'model'=>$model,
        ));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['CustomerUsers']))
{
$model->attributes=$_POST['CustomerUsers'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('admin','id'=>$model->id_customer_user));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('CustomerUsers');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new CustomerUsers('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['CustomerUsers']))
$model->attributes=$_GET['CustomerUsers'];

$this->render('admin',array(
'model'=>$model,
));
}

public function actionAutocust()  
      {  
           $res =array();  
           $row=array();  
           if (isset($_GET['search'])) {  
                $sql ="SELECT * FROM  customer WHERE CompanyName LIKE :CompanyName ";  
                $command =Yii::app()->db->createCommand($sql);  
                $command->bindValue(":CompanyName", ''.'%'.$_GET['search'].'%', PDO::PARAM_STR);  
                $res =$command->queryAll();  
                foreach($res as $value):  
                     $row[]=array(  
                               
                         
                          'id'=>$value['id_customer'],  // return value from autocomplete 
						  'nama'=>$value['CompanyName'],
                     );   
                endforeach;  
           }  
           echo CJSON::encode($row);  
           Yii::app()->end();            
      }

 public function actionAutouser()  
      {  
           $res =array();  
           $row=array();  
           if (isset($_GET['search'])) {  
                $sql ="SELECT * FROM  Users WHERE userid LIKE :userid ";  
                $command =Yii::app()->db->createCommand($sql);  
                $command->bindValue(":userid", ''.'%'.$_GET['search'].'%', PDO::PARAM_STR);  
                $res =$command->queryAll();  
                foreach($res as $value):  
                     $row[]=array(  
                               
                         
                          'id'=>$value['userid'],  // return value from autocomplete 
						  'nama'=>$value['userid'],
                     );   
                endforeach;  
           }  
           echo CJSON::encode($row);  
           Yii::app()->end();            
      }

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=CustomerUsers::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='customer-users-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
