<?php
    /**
     * @var yii\web\View                   $this
     * @var app\modules\system\models\Role $model
     */
?>
<div class="role-view">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= \Yii::t('akhdanihr', 'Detail {data}', [
                    'data' => \Yii::t('system_role', 'User Role')
                ]) ?>
            </h3>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_content">
            <?= $this->render('_form', [
                'model'  => $model,
                'action' => 'view'
            ]) ?>
        </div>
    </div>
</div>
