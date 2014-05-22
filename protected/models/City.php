<?php

/**
 * This is the model class for table "dir_city".
 *
 * The followings are the available columns in table 'dir_city':
 * @property integer $city_id
 * @property integer $state_id
 * @property string $city_name
 */
class City extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dir_city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_name', 'required'),
			array('state_id', 'numerical', 'integerOnly'=>true),
			array('city_name', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('city_id, state_id, city_name', 'safe', 'on'=>'search'),
			array('*', 'compositeUniqueKeysValidator'),
		);
	}
	public function behaviors() {
		return array(
				'ECompositeUniqueKeyValidatable' => array(
						'class' => 'ECompositeUniqueKeyValidatable',
						'uniqueKeys' => array(
								'attributes' => 'city_name, state_id',
								'errorMessage' => 'City name is already added For this State'
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'city_id' => 'City',
			'state_id' => 'State',
			'city_name' => 'City Name',
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

		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('city_name',$this->city_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return City the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
