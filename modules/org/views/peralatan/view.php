<?php
    /**
     * @var yii\web\View                     $this
     * @var app\modules\org\models\Peralatan $model
     */
?>
<div class="peralatan-view">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= \Yii::t('akhdanihr', 'Detail {data}', [
                    'data' => \Yii::t('org_peralatan', 'Peralatan')
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
