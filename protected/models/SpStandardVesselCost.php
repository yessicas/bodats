<?php

/**
 * This is the model class for table "standard_vessel_cost".
 *
 * The followings are the available columns in table 'standard_vessel_cost':
 * @property string $id_sp_standard_vessel_cost
 * @property integer $id_vessel
 * @property integer $month
 * @property integer $year
 * @property double $depreciation_cost
 * @property double $rent_cost
 * @property double $crew_own_cost
 * @property double $crew_subcont_cost
 * @property double $insurance
 * @property double $repair
 * @property double $docking
 * @property double $brokerage_fee
 * @property double $others
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class SpStandardVesselCost extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sp_standard_vessel_cost';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_vessel, year, depreciation_cost, rent_cost,  crew_own_cost, crew_subcont_cost, insurance, repair, docking, brokerage_fee, others, created_date, created_user, ip_user_updated', 'required'),
			array('id_vessel, month, year', 'numerical', 'integerOnly'=>true),
			array('depreciation_cost, rent_cost,  crew_own_cost, crew_subcont_cost, insurance, repair, docking, brokerage_fee, others', 'numerical'),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			array('id_vessel' , 'cekvesselinsert','on'=>'insert'),
			array('id_vessel' , 'cekvesselupdate','on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_sp_standard_vessel_cost, id_vessel, month, year, depreciation_cost, rent_cost, crew_own_cost, crew_subcont_cost, insurance, repair, docking, brokerage_fee, others, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sp_standard_vessel_cost' => 'ID Standard Vessel Cost',
			'id_vessel' => 'Vessel',
			'month' => 'Month',
			'year' => 'Year',
			'depreciation_cost' => 'Depreciation',
			'crew_own_cost' => 'Crew Own ',
			'crew_subcont_cost' => 'Crew Subcont ',
			'insurance' => 'Insurance',
			'repair' => 'Repair',
			'docking' => 'Docking',
			'brokerage_fee' => 'Brokerage Fee',
			'others' => 'Others',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
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

		$criteria->compare('id_sp_standard_vessel_cost',$this->id_sp_standard_vessel_cost,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);
		$criteria->compare('depreciation_cost',$this->depreciation_cost);
		$criteria->compare('crew_own_cost',$this->crew_own_cost);
		$criteria->compare('crew_subcont_cost',$this->crew_subcont_cost);
		$criteria->compare('insurance',$this->insurance);
		$criteria->compare('repair',$this->repair);
		$criteria->compare('docking',$this->docking);
		$criteria->compare('brokerage_fee',$this->brokerage_fee);
		$criteria->compare('others',$this->others);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>15),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StandardVesselCost the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function cekvesselinsert()
	{

	    $model = StandardVesselCost::model()->find(array(
           'condition' => 'id_vessel = :id_vessel',
           'params' => array(
               ':id_vessel' => $this->id_vessel,
           ),
       ));
	    if ($model)
	         $this->addError('id_vessel', 'Vessel sudah Ada di dalam Data Standar Vessel Cost') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

	}

	public function cekvesselupdate()
	{

	    $model = StandardVesselCost::model()->find(array(
           'condition' => 'id_vessel = :id_vessel  AND id_sp_standard_vessel_cost <>:id_sp_standard_vessel_cost',
           'params' => array(
               ':id_vessel' => $this->id_vessel,
               ':id_sp_standard_vessel_cost' => $this->id_sp_standard_vessel_cost,
           ),
       ));
	    if ($model)
	         $this->addError('id_vessel', 'Vessel sudah Ada di dalam Data Standar Vessel Cost') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

	}
}
