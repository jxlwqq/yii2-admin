<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<!--<div class="article-form">

    <?php /*$form = ActiveForm::begin(); */?>

    <?/*= $form->field($model, 'title')->textInput(['maxlength' => true]) */?>

    <?/*= $form->field($model, 'author')->textInput(['maxlength' => true]) */?>

    <?/*= $form->field($model, 'abstract')->textarea(['maxlength' => true]) */?>

    <?/*= $form->field($model, 'source')->textInput(['maxlength' => true]) */?>

    <div class="form-group">
        <?/*= Html::submitButton( 'Create'  , ['class' =>  'btn btn-success' ]) */?>
    </div>



</div>-->

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $this->title ?></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php
    $form = ActiveForm::begin();
    $form->addCssClass = 'form-horizontal'; ?>
        <div class="box-body">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <div class="form-group">

                <label class="col-sm-1 control-label">标题</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="title"  " placeholder="标题">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-1 control-label">作者</label>

                <div class="col-sm-11">
                    <input type="text" class="form-control"  name="author"  placeholder="作者">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-1 control-label">来源</label>

                <div class="col-sm-11">
                    <input type="text" class="form-control"  name="source"  placeholder="来源">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-1 control-label">标签</label>

                <div class="col-sm-11">
                    <input type="text" class="form-control"  name="source"  placeholder="标签">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-1 control-label">摘要</label>
                <div class="col-sm-11">
                    <textarea name="abstract" id=""></textarea>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-1 control-label">正文</label>
                <div class="col-sm-11">
                    <textarea name="content" id=""></textarea>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-default">取消</button>
            <button type="submit" class="btn btn-info pull-right">添加</button>
        </div>
        <!-- /.box-footer -->
    <?php ActiveForm::end(); ?>
</div>
