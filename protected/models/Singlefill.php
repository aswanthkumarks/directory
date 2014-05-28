<?php

/**
 * This is the model class for table "dir_singlefill".
 *
 * The followings are the available columns in table 'dir_singlefill':
 * @property integer $matfil_id
 * @property integer $mat_id
 * @property integer $city_id
 * @property integer $state_id
 * @property integer $pro_pic
 * @property string $address
 * @property string $pin
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Images[] $images
 * @property Phone[] $phones
 * @property Matter $mat
 * @property Images $proPic
 * @property State $state
 */
class Singlefill extends CActiveRecord
{
	public $dir_type,$name,$desc,$degrees;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dir_singlefill';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mat_id','safe'),
			array('matfil_id','safe'),
			array('city_id', 'required'),
			array('mat_id, city_id, state_id, pro_pic, status', 'numerical', 'integerOnly'=>true),
			array('address', 'length', 'max'=>300),
			array('pin', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('matfil_id, mat_id, city_id, state_id, pro_pic, address, pin, status', 'safe', 'on'=>'search'),
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
			'images' => array(self::HAS_MANY, 'Images', 'imgof'),
			'phones' => array(self::HAS_MANY, 'Phone', 'sub_fil_id'),
			'mat' => array(self::BELONGS_TO, 'Matter', 'mat_id'),
			'proPic' => array(self::BELONGS_TO, 'Images', 'pro_pic'),
			'state' => array(self::BELONGS_TO, 'State', 'state_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'matfil_id' => 'Matfil',
			'mat_id' => 'Mat',
			'city_id' => 'City',
			'state_id' => 'State',
			'pro_pic' => 'Pro Pic',
			'address' => 'Address',
			'pin' => 'Pin',
			'status' => 'Status',
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

		$criteria->compare('matfil_id',$this->matfil_id);
		$criteria->compare('mat_id',$this->mat_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('pro_pic',$this->pro_pic);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('pin',$this->pin,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Singlefill the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function get_matter_type($id){
				
		$criteria=new CDbCriteria;
		$criteria->alias='t';
		$criteria->select=array('i.dir_type');
		$criteria->join='LEFT JOIN dir_matter i ON i.id=t.mat_id';
		$criteria->condition='t.matfil_id="'.$id.'"';
		$sql=$this->find($criteria);
		return $sql->dir_type;
	}
	
	public function get_itemdetails($id){
		$criteria=new CDbCriteria;
		$criteria->alias='t';
		$criteria->select=array('i.*','t.address','t.pin','t.city_id','t.state_id');
		$criteria->join='LEFT JOIN dir_matter i ON i.id=t.mat_id';
		return $this->find($criteria);
	
	}
	
	
}
