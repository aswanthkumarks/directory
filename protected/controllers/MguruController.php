<?php

class MguruController extends Controller
{
	
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
	
	public function actionDynamiccities()
	{
		if(isset($_POST['stateid'])){
			$data=City::model()->findAll('state_id=:state_id',
					array(':state_id'=>(int) $_POST['stateid']));
		
			$data=CHtml::listData($data,'city_id','city_name');
			echo CHtml::tag('option',
					array('value'=>''),CHtml::encode('---Select City---'),true);
			foreach($data as $value=>$name)
			{
				echo CHtml::tag('option',
						array('value'=>$value),CHtml::encode($name),true);
			}
		}
	}
	
}

?>