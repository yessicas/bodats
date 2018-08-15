<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $userid
 * @property string $code_id
 * @property string $type
 * @property string $full_name
 * @property string $email
 * @property string $password
 * @property string $security_code
 * @property string $secret_question
 * @property string $answer_secret_question
 * @property string $is_reset
 * @property string $reset_code
 * @property integer $status_activated
 * @property string $created_date
 * @property string $ip_addr_created
 * @property string $hit_count
 * @property string $last_login
 * @property string $last_logout
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	//public $verifyCode;
	public $repeatpassword;
	public $old_password;
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, password, repeatpassword, email,type', /*code_id, security_code, secret_question, answer_secret_question, created_date, ip_addr_created, last_login, last_logout,*/ 'required'/*,'on'=>'insert'*/),
			array('password','ext.validators.EPasswordStrength', 'min'=>8,'message' => Yii::t('password', 'Password Terlalu Lemah, Password Minimal 8 karakter setidaknya terdiri dari Huruf Capital dan Huruf Kecil serta Nomor '),'on'=>'insert'),
			array('password','ext.validators.EPasswordStrength', 'min'=>8,'message' => Yii::t('password', 'Password Terlalu Lemah, Password Minimal 8 karakter setidaknya terdiri dari Huruf Capital dan Huruf Kecil serta Nomor '),'on'=>'update'),
			array('status_activated, is_reset', 'numerical', 'integerOnly'=>true),
			array('userid', 'length', 'max'=>20),
			array('code_id, reset_code,CompanyName', 'length', 'max'=>100),
			array('type', 'length', 'max'=>10),
			array('full_name, email, answer_secret_question,secret_question', 'length', 'max'=>250),
			array('password', 'length', 'max'=>150),
			array('security_code', 'length', 'max'=>200),
			array('ip_addr_created', 'length', 'max'=>64),
			array('hit_count', 'length', 'max'=>11),
			array('userid' , 'cekuseridexist','on'=>'insert'),
			array('email', 'email'),
			array('userid' , 'cekemailexist','on'=>'insert'),
			//array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd'),'on'=>'insert'),
			//array('verifyCode', 'required','on'=>'insert'),
			array('repeatpassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Ulangi Password Tidak Sesuai",'on'=>'insert'),
			array('repeatpassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Ulangi Password Tidak Sesuai",'on'=>'update'),
			array('repeatpassword, password', 'length', 'max'=>100, 'allowEmpty'=>true,'on'=>'update'),
			array('secret_question, answer_secret_question' , 'required', 'on' => 'activateduser'),
			array('secret_question, answer_secret_question' , 'required', 'on' => 'activatedcompany'),
			array('secret_question, answer_secret_question' , 'required', 'on' => 'activatedschool'),
			array('answer_secret_question' , 'required', 'on' => 'secquest'),
			array('repeatpassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Ulangi Password Tidak Sesuai",'on'=>'resetpass'),
			array('old_password, password' , 'required', 'on' => 'cpass'),
			array('old_password' , 'cekoldpass','on'=>'cpass'),
			array('repeatpassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Ulangi Password Tidak Sesuai",'on'=>'cpass'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userid, code_id,type, full_name,CompanyName, email, type,password,repeatpassword, security_code, secret_question, answer_secret_question, status_activated, created_date, ip_addr_created, hit_count, last_login, last_logout', 'safe', 'on'=>'search'),
			array('userid, code_id,type, full_name,CompanyName, email,type, password,repeatpassword, security_code, secret_question, answer_secret_question, status_activated, created_date, ip_addr_created, hit_count, last_login, last_logout', 'safe', 'on'=>'searchuser'),
		
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'auth' => array(self::HAS_MANY, 'Authitem', 'type'),
			'tipe' => array(self::BELONGS_TO, 'Authitem', 'type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userid' => 'User ID',
			'code_id' =>Yii::t('strings','Code'),
			'type' => 'User Type',
			'full_name' =>Yii::t('strings','Full Name'),
			'CompanyName'=>'Customer Company',
			'email' => 'Email',
			'password' =>Yii::t('strings','Password'),
			'security_code' => 'Security Code',
			'secret_question' =>Yii::t('strings','Secret Question'),
			'answer_secret_question' =>Yii::t('strings','Answer Secret Question'),
			'is_reset' =>Yii::t('strings','Is Reset'),
			'reset_code' =>Yii::t('strings','Reset Code'),
			'status_activated' => 'Status Activated',
			'created_date' => 'Created Date',
			'ip_addr_created' => 'IP Addr Created',
			'hit_count' => 'Hit Count',
			'last_login' => 'Last Login',
			'last_logout' => 'Last Logout',
			//'verifyCode' => Yii::t('strings','Verify Code'),
			'repeatpassword' =>Yii::t('strings','Repeat Password'),
			'old_password' =>'Old Password',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('code_id',$this->code_id,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('CompanyName',$this->CompanyName,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('security_code',$this->security_code,true);
		$criteria->compare('secret_question',$this->secret_question,true);
		$criteria->compare('answer_secret_question',$this->answer_secret_question,true);
		$criteria->compare('is_reset',$this->is_reset,true);
		$criteria->compare('reset_code',$this->reset_code,true);
		$criteria->compare('status_activated',$this->status_activated);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('ip_addr_created',$this->ip_addr_created,true);
		$criteria->compare('hit_count',$this->hit_count,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('last_logout',$this->last_logout,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchuser()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'type<>:type';
		$criteria->params = array(':type'=>'ADM');

		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('code_id',$this->code_id,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('CompanyName',$this->CompanyName,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('security_code',$this->security_code,true);
		$criteria->compare('secret_question',$this->secret_question,true);
		$criteria->compare('answer_secret_question',$this->answer_secret_question,true);
		$criteria->compare('is_reset',$this->is_reset,true);
		$criteria->compare('reset_code',$this->reset_code,true);
		$criteria->compare('status_activated',$this->status_activated);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('ip_addr_created',$this->ip_addr_created,true);
		$criteria->compare('hit_count',$this->hit_count,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('last_logout',$this->last_logout,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	

	public function cekuseridexist()
	{

		$modelname='Users';
		$fieldname='userid';
		$valuefield=$this->userid;
		if(RuleExistDB::getPkExist($modelname,$valuefield)){
			$this->addError($fieldname, $fieldname. Yii::t('strings',' sudah ada')) ;
		}
	}

	public function cekemailexist()
	{

		$modelname='Users';
		$fieldname='email';
		$valuefield=$this->email;

		if(RuleExistDB::getAttributesExist($modelname,$fieldname,$valuefield)){
			$this->addError($fieldname, $fieldname.' Yang Anda Msukan  Sudah Ada  ') ;
		}
		/*
	    $model = self::findByAttributes(array('email'=>$this->email));
	    if ($model)
	         $this->addError('email', 'Email  Yang Anda MAsukan Sudah Dipakai  ') ;// validasi model gagal sehingga perintah save() akan dibatalkan.
		*/
	}


	public function cekoldpass()
	{
		$enkripted_pass=md5($this->old_password);
	    $model = self::findByAttributes(array('password'=>$enkripted_pass));
	    if (!$model)
	         $this->addError('old_password', 'Old Password Wrong') ;

	}

}
