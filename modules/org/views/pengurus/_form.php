<?php
    
    use app\modules\org\models\Pemilik;
    use kartik\money\MaskMoney;
    use kartik\number\NumberControl;
    use kartik\select2\Select2;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    /**
     * @var yii\web\View                   $this
     * @var app\modules\org\models\Pengurus $model
     * @var yii\widgets\ActiveForm         $form
     * @var string                         $action
     */
    
    $action = $action ?: ($model->isNewRecord ? 'create' : 'update');
?>

<div class="pengurus-form">
    <?php
        $form = ActiveForm::begin([
                                      'options' => [
                                          'class'   => 'form-horizontal form-label-left'
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
        $form->field($model, 'jabatan', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-6'>{input}\n{hint}{error}</div>"
        ])->textInput(['maxlength' => TRUE, 'disabled' => $action == 'view'])
    ?>
    
    <?=
        $form->field($model, 'tglmenjabatdari', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-5 col-md-2'>{input}\n{hint}{error}</div>"
        ])->widget(\kartik\date\DatePicker::className(), [
            'name'          => 'date',
            'options'       => ['placeholder' => ''],
            'type'          => \kartik\date\DatePicker::TYPE_COMPONENT_APPEND,
            'disabled'      => $action == 'view',
            'readonly'      => TRUE,
            'layout'        => '{input}{remove}',
            'value'         => $model->isNewRecord ? date('d-M-Y') : date('d-M-Y', DateTime::createFromFormat('Y-m-d', $model->tglmenjabatdari)->getTimestamp()),
            'pluginOptions' => [
                'todayHighlight' => TRUE,
                'todayBtn'       => TRUE,
                'format'         => 'yyyy-mm-dd',
                'autoclose'      => TRUE,
            ]
        ]);
    ?>
    
    <?=
        $form->field($model, 'tglmenjabatsampai', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-5 col-md-2'>{input}\n{hint}{error}</div>"
        ])->widget(\kartik\date\DatePicker::className(), [
            'name'          => 'date',
            'options'       => ['placeholder' => ''],
            'type'          => \kartik\date\DatePicker::TYPE_COMPONENT_APPEND,
            'disabled'      => $action == 'view',
            'readonly'      => TRUE,
            'layout'        => '{input}{remove}',
            'value'         => $model->isNewRecord ? date('d-M-Y') : date('d-M-Y', DateTime::createFromFormat('Y-m-d', $model->tglmenjabatsampai)->getTimestamp()),
            'pluginOptions' => [
                'todayHighlight' => TRUE,
                'todayBtn'       => TRUE,
                'format'         => 'yyyy-mm-dd',
                'autoclose'      => TRUE,
            ]
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
