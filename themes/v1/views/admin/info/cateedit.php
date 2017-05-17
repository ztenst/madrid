<?php
$this->pageTitle = '添加栏目分类';
$this->breadcrumbs = array('资讯管理',$this->pageTitle);
?>
<div class="portlet-body">
    <?php $form = $this->beginWidget('HouseForm',array('htmlOptions'=>array('class'=>'form-horizontal'))) ?>
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">分类名称<span class="required" aria-required="true">*</span></label>
            <div class="col-md-4">
                <?php echo $form->textField($model,'name',array('class'=>'form-control')) ?>
            </div>
            <div class="col-md-2"><?php echo $form->error($model, 'name') ?></div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">分类拼音<span class="required" aria-required="true">*</span></label>
            <div class="col-md-4">
                <?php echo $form->textField($model,'pinyin',array('class'=>'form-control')) ?>
            </div>
            <div class="col-md-2"><?php echo $form->error($model, 'pinyin') ?></div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">分类排序<span class="required" aria-required="true">*</span></label>
            <div class="col-md-4">
                <?php echo $form->textField($model,'sort',array('class'=>'form-control')) ?>
            </div>
            <div class="col-md-2"><?php echo $form->error($model, 'sort') ?></div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">SEO-Title<span class="required" aria-required="true">*</span></label>
            <div class="col-md-4">
                <?php echo $form->textField($model,'seo_data[title]',array('class'=>'form-control')); ?>
            </div>
            <div class="col-md-2"><?php echo $form->error($model, 'seo_data[title]') ?></div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">SEO-Keywords<span class="required" aria-required="true">*</span></label>
            <div class="col-md-4">
                <?php echo $form->textField($model,'seo_data[keywords]',array('class'=>'form-control')); ?>
            </div>
            <div class="col-md-2"><?php echo $form->error($model, 'seo_data[keywords]') ?></div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">SEO-Description<span class="required" aria-required="true">*</span></label>
            <div class="col-md-4">
                <?php echo $form->textField($model,'seo_data[description]',array('class'=>'form-control')); ?>
            </div>
            <div class="col-md-2"><?php echo $form->error($model, 'seo_data[description]') ?></div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">文章信息显示配置</label>
            <div class="col-md-9">
                <?php echo $form->checkBoxList($model, 'config', ArticleCateExt::$config, array('separator'=>'','class'=>'form-control')); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2" style="text-align: right;">分类状态</label>
            <div class="col-md-4 radio-list">
                <?php echo $form->radioButtonList($model, 'status',ArticleCateExt::$status, array('separator'=>'','template'=>'<label>{input} {label}</label>')); ?>
            </div>
        </div>


        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-2 col-md-9">
                    <button type="submit" class="btn green">保存</button>
                    <?php echo CHtml::link('返回',Yii::app()->user->returnUrl,array('class'=>'btn default')) ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>
