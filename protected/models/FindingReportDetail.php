<?php

/**
 * This is the model class for table "finding_report_detail".
 *
 * The followings are the available columns in table 'finding_report_detail':
 * @property string $id_finding_report_detail
 * @property string $id_finding_report
 * @property integer $TrInventoryTreeId
 * @property string $ProblemIdentification
 * @property string $Location
 * @property string $ImageLink
 * @property string $PIC
 * @property string $CorrectiveAction
 * @property string $DueDate
 * @property string $Status
 * @property string $PreventiveAction
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 *
 * The followings are the available model relations:
 * @property FindingReport $idFindingReport
 */
class FindingReportDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FindingReportDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'finding_report_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProblemIdentification, Location,PIC, CorrectiveAction, DueDate, PreventiveAction', 'required'),
			array('id_part', 'numerical', 'integerOnly'=>true),
			array('id_finding_report', 'length', 'max'=>20),
			array('Location, PIC, Status', 'length', 'max'=>32),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),

			array('ImageLink', 'required','on'=>'insert'),
			array('ImageLink', 'file','on'=>'insert',
			'types'=>'jpg',
			'allowEmpty' => false,
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file to large max file is 1mb', 
					),
			
			array('ImageLink', 'file','on'=>'update',
			'allowEmpty' => true,
			'types'=>'jpg',
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file to Large max file is 1mb',
			),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_finding_report_detail, id_finding_report, id_part, ProblemIdentification, Location, ImageLink, PIC, CorrectiveAction, DueDate, Status, PreventiveAction, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
						array('id_finding_report_detail, id_finding_report, id_part, ProblemIdentification, Location, ImageLink, PIC, CorrectiveAction, DueDate, Status, PreventiveAction, created_date, created_user, ip_user_updated', 'safe', 'on'=>'searchbyfinding'),
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
			'idFindingReport' => array(self::BELONGS_TO, 'FindingReport', 'id_finding_report'),
			'idPart' => array(self::BELONGS_TO, 'Part', 'id_part'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_finding_report_detail' => 'ID Finding Report Detail',
			'id_finding_report' => 'ID Finding Report',
			'id_part' => 'Part Name',
			'ProblemIdentification' => 'Problem Identification',
			'Location' => 'Location',
			'ImageLink' => 'Image',
			'PIC' => 'Pic',
			'CorrectiveAction' => 'Corrective Action',
			'DueDate' => 'Due Date',
			'Status' => 'Status',
			'PreventiveAction' => 'Preventive Action',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_finding_report_detail',$this->id_finding_report_detail,true);
		$criteria->compare('id_finding_report',$this->id_finding_report,true);
		$criteria->compare('id_part',$this->id_part);
		$criteria->compare('ProblemIdentification',$this->ProblemIdentification,true);
		$criteria->compare('Location',$this->Location,true);
		$criteria->compare('ImageLink',$this->ImageLink,true);
		$criteria->compare('PIC',$this->PIC,true);
		$criteria->compare('CorrectiveAction',$this->CorrectiveAction,true);
		$criteria->compare('DueDate',$this->DueDate,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('PreventiveAction',$this->PreventiveAction,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

public function searchbyfinding($id_finding_report)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'id_finding_report=:id_finding_report';
		$criteria->params = array(':id_finding_report'=>$id_finding_report);

		$criteria->compare('id_finding_report_detail',$this->id_finding_report_detail,true);
		$criteria->compare('id_finding_report',$this->id_finding_report,true);
		$criteria->compare('id_part',$this->id_part);
		$criteria->compare('ProblemIdentification',$this->ProblemIdentification,true);
		$criteria->compare('Location',$this->Location,true);
		$criteria->compare('ImageLink',$this->ImageLink,true);
		$criteria->compare('PIC',$this->PIC,true);
		$criteria->compare('CorrectiveAction',$this->CorrectiveAction,true);
		$criteria->compare('DueDate',$this->DueDate,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('PreventiveAction',$this->PreventiveAction,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}


