<?php
	$this->pageTitle='户型列表';
	?>
	<h2><?=$house->title?></h2>
<table class="table table-bordered table-striped table-condensed flip-content">
    <thead class="flip-content">
        <tr>
            <!-- <th width="35px"><input type="checkbox"></th> -->
            <th class="text-center">id</th>
            <th class="text-center">标题</th>
            <th class="text-center">图片</th>
            <th class="text-center">室/厅/卫</th>
            <!-- <th class="text-center">状态</th> -->
            <th class="text-center">面积</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($infos as $v): ?>
        <tr>
            <td  class="text-center"><?php echo $v->id ?></td>
            <td  class="text-center"><?php echo $v->title ?></td>
            <td  class="text-center"><?=strstr($v->image,'http')?$v->image:('<img width="200px" height="180px" src="'.ImageTools::fixImagefcc($v->image).'">')?></td>
            <td class="text-center"><?php echo $v->bedroom.'/'.$v->livingroom.'/'.$v->bathroom ?></td>
            <td class="text-center"><?php echo $v->size; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php $this->widget('AdminLinkPager', array('pages'=>$pager)) ?>