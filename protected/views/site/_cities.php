<?php $url=$data->city_name;  $url=$this->geturl($url); ?>

<li data-id="web print" class="clearfix">
 <h3><?php echo CHtml::link(CHtml::encode($data->city_name), array('site/directory','d'=>$_GET['d'],'s'=>$_GET['s'],'c'=>$data->city_id) ); ?></h3>
</li>