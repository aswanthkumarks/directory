<?php

class AdminController extends Controller
{
	public $layout='//layouts/lefty';
	public function actionIndex()
	{
		$this->render('index');
	}

	public function filters()
	{
		return array(
				'accessControl', 
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
				array('allow', // allow authenticated users to access all actions
						'users'=>array('@'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
	
	
	public function actionCountry(){		
			$model=new Country();
			$dataProvider=new CActiveDataProvider('Country',array(
					'pagination'=>array(
							'pageSize'=>20,
					),)
			);		
		$this->render('country',array('model'=>$model,
				'dataProvider'=>$dataProvider,));
	}
	
	public function actionState(){
		$model=new State();
		
		if(isset($_POST['State'])){
			$model->attributes=$_POST['State'];
			if($model->validate())
			{
				$model->save();
				Yii::app()->user->setFlash('success', "State Added!");				 				 
			}		
			
		}	
		
		$criteria=new CDbCriteria(array(
				'order'=>'state_name ASC',
		));
		if(isset($_GET['q']))
			$criteria->addSearchCondition('country_id',$_GET['q']);
		
		$dataProvider=new CActiveDataProvider('State',array(
				'pagination'=>array(
						'pageSize'=>20,
				),
				'criteria'=>$criteria,)
		);	
		$this->render('state',array('model'=>$model,
				'dataProvider'=>$dataProvider,));
	}
	
	public function actionCity(){
		$model=new City();
	
		if(isset($_POST['City'])){
			$model->attributes=$_POST['City'];
			if($model->validate())
			{
				$model->save();
				Yii::app()->user->setFlash('success', "City Added!");
			}
				
		}
	
		$criteria=new CDbCriteria(array(
				'order'=>'city_name ASC',
		));
		if(isset($_GET['q']))
			$criteria->addSearchCondition('state_id',$_GET['q']);
	
		$dataProvider=new CActiveDataProvider('City',array(
				'pagination'=>array(
						'pageSize'=>20,
				),
				'criteria'=>$criteria,)
		);
		$this->render('city',array('model'=>$model,
				'dataProvider'=>$dataProvider,));
	}
	
	public function actionDirtype(){
		$model=new Type();
		
		if(isset($_POST['Type'])){
			$model->attributes=$_POST['Type'];
			if($model->validate())
			{
				if(!empty($model->type_id)){
					$update_model= Type::model()->findByPk($model->type_id);
					$update_model->name= $model->name;
					$update_model->save(FALSE);
					Yii::app()->user->setFlash('success', "Updated Directory Type");
				}
				else{
				$model->save();
				Yii::app()->user->setFlash('success', "Directory Type Added!");
				}
			}
		
		}
		
		$criteria=new CDbCriteria(array(
				'order'=>'name ASC',
		));
		$dataProvider=new CActiveDataProvider('Type',array(
				'pagination'=>array(
						'pageSize'=>20,
				),
				'criteria'=>$criteria,)
		);
		$this->render('dirtype',array('model'=>$model,
				'dataProvider'=>$dataProvider,));
		
	} 
	
	
	public function actionSpecilist(){
		$model=new Specilist();
	
		if(isset($_POST['Specilist'])){
			
			$model->attributes=$_POST['Specilist'];
			if($model->validate())
			{			
				
			if(!empty($model->spid)){
				$update_model= Specilist::model()->findByPk($model->spid);
				$update_model->sp_name= $model->sp_name;
				$update_model->save(FALSE);				
				Yii::app()->user->setFlash('success', "Specilist Updated!");				
			}
			else{
			
				$model->save();
				Yii::app()->user->setFlash('success', "Specilist Added!");
				
			}
			}
	
		}
	
		$criteria=new CDbCriteria(array(
				'order'=>'sp_name ASC',
		));
		$dataProvider=new CActiveDataProvider('Specilist',array(
				'pagination'=>array(
						'pageSize'=>20,
				),
				'criteria'=>$criteria,)
		);
		$this->render('specilists',array('model'=>$model,
				'dataProvider'=>$dataProvider,));
	
	}
	
	public function actionDir_items(){
		$model=new Matter();
		
		
		if(isset($_POST['Matter'])){
			$model->attributes=$_POST['Matter'];
			if($model->validate())
			{
				$model->save();
				Yii::app()->user->setFlash('success', "New Item Added!");
				
				
			}
		}
		
		
		$criteria=new CDbCriteria(array(
				'order'=>'id ASC',
		));
		
		if(isset($_GET['cat'])){	
			 
			$model->search=(int) $_GET['cat'];
			
		}
		$dataProvider=$model->getmaterlist();
		
		$this->render('dir-items',array('model'=>$model,
				'dataProvider'=>$dataProvider,));
		
		
	
	}
	public function actionUsers(){
		$model=new Users();
		
		if(isset($_GET['p']) && $_GET['p']='edit'){
			
		}
		
		$criteria=new CDbCriteria(array(
				'order'=>'uid ASC',
		));
		
		$dataProvider=new CActiveDataProvider('Users',array(
				'pagination'=>array(
						'pageSize'=>20,
				),
				'criteria'=>$criteria,));
		
		$this->render('users',array('model'=>$model,
				'dataProvider'=>$dataProvider,));
	}
}