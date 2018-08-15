<?php

/**
 * This is the model class for table "finding_report".
 *
 * The followings are the available columns in table 'finding_report':
 * @property string $id_finding_report
 * @property string $Date
 * @property integer $id_vessel
 * @property string $Status
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 *
 * The followings are the available model relations:
 * @property Vessel $idVessel
 * @property FindingReportDetail[] $findingReportDetails
 */
class FindingReport extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FindingReport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */

	public $VesselName;

	public function tableName()
	{
		return 'finding_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Date, id_vessel', 'required'),
			//array('id_vessel', 'numerical', 'integerOnly'=>true),
			array('id_vessel,created_user', 'length', 'max'=>45),
			array('FindingReportNumber','length', 'max'=>100),
			array('ip_user_updated', 'length', 'max'=>50),
			array('NoReport, NoMonth, NoYear', 'numerical', 'integerOnly'=>true),
			array('Status', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_finding_report, Date, id_vessel,VesselName, Status, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'Vessel' => array(self::BELONGS_TO, 'Vessel', 'id_vessel'),
			'findingReportDetails' => array(self::HAS_MANY, 'FindingReportDetail', 'id_finding_report'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_finding_report' => 'ID Finding Report',
			'Date' => 'Date',
			'id_vessel' => 'ID Vessel',
			'Status' => 'Status',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
			'vesselname'=>'Vessel Name',
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
		$criteria->with=array('Vessel');
        $criteria->together=true;

		$criteria->compare('id_finding_report',$this->id_finding_report,true);
		$criteria->compare('Date',$this->Date,true);
		$criteria->compare('t.id_vessel',$this->id_vessel);
		$criteria->compare('Vessel.VesselName',$this->VesselName,true);
		$criteria->compare('t.Status',$this->Status,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);
		$criteria->compare('FindingReportNumber',$this->FindingReportNumber,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id_finding_report ASC',
            'attributes'=>array(

              'VesselName'=>array(
                 'asc'=>'Vessel.VesselName ASC',
                 'desc'=>'Vessel.VesselName DESC',
              ),

              '*',
          					),
        				),
			'pagination'=>array(
        	'pageSize'=>15,
   								 ),
		));
	}
}