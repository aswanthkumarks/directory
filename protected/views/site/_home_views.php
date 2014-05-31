<?php $url=$data->primaryKey."/".$data->name; ?>

<li data-id="web print" class="clearfix">
 
<?php echo CHtml::link(CHtml::image($data->img_url,$data->name,array('class' => 'profile_pic') ), array($url)); ?>
<h3><?php echo CHtml::link(CHtml::encode($data->name), array($url) ); ?></h3>
<span class='dir_type'><?php echo $data->dir; ?></span><br/>
<span class='dir_city'><?php echo $data->city_name; ?></span>,<span class='dir_state'><?php echo $data->state_name; ?></span>
</li>