<?php

/**
 * This is the model class for table "dir_matter".
 *
 * The followings are the available columns in table 'dir_matter':
 * @property integer $id
 * @property string $name
 * @property string $degrees
 * @property string $desc
 * @property integer $dir_type
 * @property integer $addedby
 *
 * The followings are the available model relations:
 * @property Type $dirType
 * @property Type $UserId
 * @property Singlefill[] $singlefills
 */
class Matter extends CActiveRecord
{
	public $typ,$matfil_id;
	public $search='';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dir_matter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, dir_type', 'required'),
			array('search', 'safe'),
			array('id', 'safe'),
			array('dir_type', 'numerical', 'integerOnly'=>true),
			array('addedby', 'numerical', 'integerOnly'=>true),
			array('name, degrees', 'length', 'max'=>200),
			array('desc', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, degrees, desc, dir_type,addedby', 'safe', 'on'=>'search'),
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
			'dirType' => array(self::BELONGS_TO, 'Type', 'dir_type'),
			'UserId' => array(self::BELONGS_TO, 'Users', 'addedby'),
			'singlefills' => array(self::HAS_MANY, 'Singlefill', 'mat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'degrees' => 'Degrees',
			'desc' => 'Desc',
			'dir_type' => 'Dir Type',
			'addedby' => 'Addedby',
			
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('degrees',$this->degrees,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('dir_type',$this->dir_type);
		$criteria->compare('addedby',$this->addedby);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Matter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getmaterlist(){
		$criteria=new CDbCriteria;		
		$criteria->alias='t';
		$criteria->select=array('t.*','i.name as typ','j.matfil_id');
		$criteria->join='LEFT JOIN dir_type i ON i.type_id=t.dir_type RIGHT JOIN dir_singlefill j ON j.mat_id=t.id';
		$criteria->addCondition('j.matfil_id'<>'');
		
		if($this->search!=''){			
			$criteria->addCondition('t.dir_type = "'.$this->search.'"');
		}		
		
		return $dataProvider=new CActiveDataProvider($this,array(
				'pagination'=>array(
						'pageSize'=>20,
				),
				'criteria'=>$criteria,)
				);
		
	}
	
	
}
