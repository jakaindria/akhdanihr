<?php
    /**
     * @var yii\web\View                     $this
     * @var app\modules\org\models\IzinUsaha $model
     */
?>
<div class="izin-usaha-view">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= \Yii::t('akhdanihr', 'Detail {data}', [
                    'data' => \Yii::t('org_izinusaha', 'Izin Usaha')
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
