<?php

/**
 * This is the model class for table "dir_phone".
 *
 * The followings are the available columns in table 'dir_phone':
 * @property integer $ph_id
 * @property string $phno
 * @property integer $sub_fil_id
 * @property string $label
 * The followings are the available model relations:
 * @property Singlefill $subFil
 */
class Phone extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dir_phone';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phno, sub_fil_id', 'required'),
			array('sub_fil_id', 'numerical', 'integerOnly'=>true),
			array('phno', 'length', 'max'=>25),
			array('label', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ph_id, phno, sub_fil_id, label', 'safe','on'=>'search'),
			array('*', 'compositeUniqueKeysValidator'),
		);
	}
	public function behaviors() {
		return array(
				'ECompositeUniqueKeyValidatable' => array(
						'class' => 'ECompositeUniqueKeyValidatable',
						'uniqueKeys' => array(
								'attributes' => 'phno,sub_fil_id',
								'errorMessage' => 'This Phone Number is already added'
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
			'subFil' => array(self::BELONGS_TO, 'Singlefill', 'sub_fil_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ph_id' => 'Ph',
			'phno' => 'Phno',
			'label' => 'label',
			'sub_fil_id' => 'Sub Fil',
			
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

		$criteria->compare('ph_id',$this->ph_id);
		$criteria->compare('phno',$this->phno,true);
		$criteria->compare('sub_fil_id',$this->sub_fil_id);
		$criteria->compare('label',$this->label);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Phone the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function get_phonenos($uid){
		
		$criteria=new CDbCriteria;
		$criteria->select=array('ph_id,phno,label'); 
		$criteria->addCondition('sub_fil_id = "'.$uid.'"');
		
		return $dataProvider=new CActiveDataProvider($this,array(
				'criteria'=>$criteria,)
		);
	}
}
