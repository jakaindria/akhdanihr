<?php
    /**
     * @var yii\web\View                        $this
     * @var app\modules\master\models\UnitKerja $model
     */
?>
<div class="unit-kerja-create">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= \Yii::t('akhdanihr', 'Tambah {data}', [
                    'data' => \Yii::t('master_unitkerja', 'Unit Kerja')
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
