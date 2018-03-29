<?php
    
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    /**
     * @var yii\web\View                        $this
     * @var app\modules\master\models\HariLibur $model
     * @var yii\widgets\ActiveForm              $form
     * @var string                              $action
     */
    
    $action = $action ?: ($model->isNewRecord ? 'create' : 'update');
?>

<div class="hari-libur-form">
    <?php
        $form = ActiveForm::begin([
                                      'options' => [
                                          'class' => 'form-horizontal form-label-left'
                                      ]
                                  ]);
    ?>
    
    <?=
        $form->field($model, 'keterangan', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12',
                'style' => 'margin-top: 30px'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-5'>{input}\n{hint}{error}</div>"
        ])->textInput(['maxlength' => TRUE, 'disabled' => $action == 'view'])
    ?>
    
    <?=
        $form->field($model, 'tanggal', [
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
            'value'         => $model->isNewRecord ? date('d-M-Y') : date('d-M-Y', DateTime::createFromFormat('Y-m-d', $model->tanggal)->getTimestamp()),
            'pluginOptions' => [
                'todayHighlight' => TRUE,
                'todayBtn'       => TRUE,
                'format'         => 'yyyy-mm-dd',
                'autoclose'      => TRUE,
            ]
        ]);
    ?>
    
    <?=
        $form->field($model, 'isinternal', [
            'options'  => [
                'class' => 'form-group col-xs-12'
            ],
            'template' => "{label}<div class='col-xs-6 col-xs-offset-6 col-sm-8 col-md-offset-3 col-md-8 col-md-offset-2'>{input}\n{hint}{error}</div>"
        ])->checkbox(['maxlength' => TRUE,
                      'disabled'  => $action == 'view',
                      'label'     => \Yii::t('master_harilibur', 'Libur Internal Perusahaan')
                     ])
    ?>

    <div class="form-group text-right">
        <?= Html::a($action != 'view' ? "<i class='fa fa-times'></i> " . \Yii::t('akhdanihr', 'Batal') : "<i class='fa fa-arrow-left'></i> " . \Yii::t('akhdanihr', 'Kembali'),
                    Yii::$app->request->referrer ?: ['.'],
                    ['class' => $action != 'view' ? 'btn btn-danger' : 'btn btn-primary']) ?>
        <?= $action != 'view' ? Html::submitButton("<i class='fa fa-save'></i> " . \Yii::t('akhdanihr', 'Simpan'), ['class' => 'btn btn-success']) : '' ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
