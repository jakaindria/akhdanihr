<?php
    
    use app\modules\org\models\Pemilik;
    use kartik\number\NumberControl;
    use kartik\select2\Select2;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    /**
     * @var yii\web\View                   $this
     * @var app\modules\org\models\Pemilik $model
     * @var yii\widgets\ActiveForm         $form
     * @var string                         $action
     */
    
    $action = $action ?: ($model->isNewRecord ? 'create' : 'update');
?>

<div class="pemilik-form">
    <?php
        $form = ActiveForm::begin([
                                      'options' => [
                                          'class' => 'form-horizontal form-label-left'
                                      ]
                                  ]);
    ?>
    
    <?=
        $form->field($model, 'nama', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12',
                'style' => 'margin-top: 30px'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-6'>{input}\n{hint}{error}</div>"
        ])->textInput(['maxlength' => TRUE, 'disabled' => $action == 'view'])
    ?>
    
    <?=
        $form->field($model, 'noktp', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12',
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-6 col-md-4'>{input}\n{hint}{error}</div>"
        ])->textInput(['maxlength' => TRUE, 'disabled' => $action == 'view'])
    ?>
    
    <?=
        $form->field($model, 'alamat', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12',
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-6'>{input}\n{hint}{error}</div>"
        ])->textarea(['maxlength' => TRUE, 'disabled' => $action == 'view', 'rows' => 4])
    ?>
    
    <?=
        $form->field($model, 'saham', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-4 col-md-2'>{input}\n{hint}{error}</div>"
        ])->widget(NumberControl::className(), ['options'            => ['disabled' => $action == 'view',
                                                                         'class'    => 'form-control text-right'],
                                                'maskedInputOptions' => ['digits'         => 2,
                                                                         'groupSeparator' => '.',
                                                                         'radixPoint'     => ',']])
    ?>
    
    <?=
        $form->field($model, 'satuan', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12',
                'style' => 'margin-top: 30px'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-4 col-md-3'>{input}\n{hint}{error}</div>"
        ])->widget(Select2::className(), [
            'data'          => Pemilik::getSatuanSahamWithLabel(),
            'options'       => ['prompt' => ''],
            'theme'         => Select2::THEME_BOOTSTRAP,
            'disabled'      => $action == 'view',
            'pluginOptions' => [
                'prefix'     => '',
                'allowClear' => TRUE
            ],
        ]);
    ?>

    <div class="form-group text-right">
        <?= Html::a($action != 'view' ? "<i class='fa fa-times'></i> " . \Yii::t('akhdanihr', 'Batal') : "<i class='fa fa-arrow-left'></i> " . \Yii::t('akhdanihr', 'Kembali'),
                    Yii::$app->request->referrer ?: ['.'],
                    ['class' => $action != 'view' ? 'btn btn-danger' : 'btn btn-primary']) ?>
        <?= $action != 'view' ? Html::submitButton("<i class='fa fa-save'></i> " . \Yii::t('akhdanihr', 'Simpan'), ['class' => 'btn btn-success']) : '' ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>
