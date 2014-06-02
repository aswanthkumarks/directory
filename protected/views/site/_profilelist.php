<?php $url=$data->name;  $url=$data->primaryKey.'/'.$this->geturl($url); ?>

<li data-id="web print" class="clearfix">
<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/'.$data->img_url,$data->name,array("width"=>"150px" ,"height"=>"150px", 'class'=>'profile_pic')), array($url) ); ?>
 <h3><?php echo CHtml::link(CHtml::encode($data->name), array($url) ); ?></h3>
 <span class='degree'><?php echo $data->degrees; ?></span>
 </li>