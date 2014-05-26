<?php

/**
 * This is the model class for table "dir_specilistdr".
 *
 * The followings are the available columns in table 'dir_specilistdr':
 * @property integer $drspid
 * @property integer $dr_id
 * @property integer $specilist_id
 *
 * The followings are the available model relations:
 * @property Specilist $specilist
 * @property Singlefill $dr
 */
class Specilistdr extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dir_specilistdr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dr_id, specilist_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('drspid, dr_id, specilist_id', 'safe', 'on'=>'search'),
			array('specilist_id', 'safe'),
			array('*', 'compositeUniqueKeysValidator'),
		);
	}
	public function behaviors() {
		return array(
				'ECompositeUniqueKeyValidatable' => array(
						'class' => 'ECompositeUniqueKeyValidatable',
						'uniqueKeys' => array(
								'attributes' => 'dr_id, specilist_id',
								'errorMessage' => 'This speciality is already added'
						)
				),
		);
	}
	
	/**
	 * Validates composite unique keys
	 *
	 * Validates composite unique keys declared in the
	 * ECompositeUniqueKeyValidatable bahavior
	 */
	public function compositeUniqueKeysValidator() {
		$this->validateCompositeUniqueKeys();
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'specilist' => array(self::BELONGS_TO, 'Specilist', 'specilist_id'),
			'dr' => array(self::BELONGS_TO, 'Singlefill', 'dr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'drspid' => 'Drspid',
			'dr_id' => 'Dr',
			'specilist_id' => 'Specilist',
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

		$criteria->compare('drspid',$this->drspid);
		$criteria->compare('dr_id',$this->dr_id);
		$criteria->compare('specilist_id',$this->specilist_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Specilistdr the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function get_speciality($id){
		$criteria=new CDbCriteria;
		$criteria->alias='t';
		$criteria->select=array('t.drspid','i.sp_name as name');
		$criteria->join='LEFT JOIN dir_specilist i ON t.specilist_id=i.spid';
		$criteria->addCondition('t.dr_id = "'.$id.'"');	
		
		return $dataProvider=new CActiveDataProvider($this,array(
				'criteria'=>$criteria,)
		);
				
	}
}
