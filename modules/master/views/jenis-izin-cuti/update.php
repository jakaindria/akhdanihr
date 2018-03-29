<?php
    /**
     * @var yii\web\View                            $this
     * @var app\modules\master\models\JenisIzinCuti $model
     */
?>
<div class="jenis-izin-cuti-update">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= \Yii::t('akhdanihr', 'Ubah {data}', [
                    'data' => \Yii::t('master_jenisizincuti', 'Jenis Izin / Cuti')
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
