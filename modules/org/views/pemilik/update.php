<?php
    /**
     * @var yii\web\View                   $this
     * @var app\modules\org\models\Pemilik $model
     */
?>
<div class="pemilik-update">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= \Yii::t('akhdanihr', 'Ubah {data}', [
                    'data' => \Yii::t('org_pemilik', 'Pemilik')
                ]) ?>
            </h3>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_content">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
