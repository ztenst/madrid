<?php
$this->pageTitle = '帮助列表';
$this->breadcrumbs = array('帮助管理', $this->pageTitle);
?>

<div class="table-toolbar">
    <div class="btn-group pull-left">
        <form class="form-inline">
            标题
            <div class="form-group">
                <?php echo CHtml::textField('title', empty($_GET['title']) ? '' : $_GET['title'], array('class' => 'form-control')) ?>
            </div>
            <button type="submit" class="btn btn-warning">搜索 <i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="pull-right">
        <a href="<?php echo $this->createUrl('edit') ?>" class="btn blue">
            添加帮助 <i class="fa fa-plus"></i>
        </a>
    </div>
</div>
<table class="table table-bordered table-striped table-condensed flip-content">
    <thead class="flip-content">
    <tr>
        <th width="35px"><input type="checkbox"></th>
        <th class="text-center">id</th>
        <th class="text-center">标题</th>
        <th class="text-center">关键词</th>
        <th class="text-center">创建时间</th>
        <th class="text-center">状态</th>
        <th class="text-center">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($dataProvider->data as $v): ?>
        <tr>
            <td><input class="checkboxes" type="checkbox" name="item[]" value="<?php echo $v->id ?>"></td>
            <td><?php echo $v->id ?></td>
            <td class="text-center"><?php echo $v->title; ?></td>
            <td class="text-center"><?php echo $v->keyword; ?></td>
            <td class="text-center"><?php echo date('Y-m-d',$v->created); ?></td>
            <td class="text-center"><?php echo ResoldHelpExt::$status_array[$v->status]?></td>
            <td>
                <a href="<?php echo $this->createUrl('edit',array('id'=>$v->id)) ?>" class="btn default btn-xs green"><i class="fa fa-edit"></i> 编辑 </a>
                <?php echo CHtml::htmlButton('删除', array('data-toggle'=>'confirmation', 'class'=>'btn btn-xs red', 'data-title'=>'确认删除？', 'data-btn-ok-label'=>'确认', 'data-btn-cancel-label'=>'取消', 'data-popout'=>true,'ajax'=>array('url'=>$this->createUrl('ajaxDel'),'type'=>'post','success'=>'function(data){location.reload()}','data'=>array('id'=>$v->id))));?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php $this->widget('AdminLinkPager', array('pages'=>$dataProvider->pagination)) ?>