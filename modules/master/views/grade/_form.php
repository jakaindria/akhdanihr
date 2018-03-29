<?php
    
    use kartik\money\MaskMoney;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    /**
     * @var yii\web\View                    $this
     * @var app\modules\master\models\Grade $model
     * @var yii\widgets\ActiveForm          $form
     * @var string                          $action
     */
    
    $action = $action ?: ($model->isNewRecord ? 'create' : 'update');
?>

<div class="grade-form">
    <?php
        $form = ActiveForm::begin([
                                      'options' => [
                                          'class' => 'form-horizontal form-label-left'
                                      ]
                                  ]);
    ?>
    
    <?=
        $form->field($model, 'kode', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12',
                'style' => 'margin-top: 30px'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-4 col-md-2'>{input}\n{hint}{error}</div>"
        ])->textInput(['maxlength' => TRUE, 'disabled' => $action == 'view'])
    ?>
    
    <?=
        $form->field($model, 'nama', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-5'>{input}\n{hint}{error}</div>"
        ])->textInput(['maxlength' => TRUE, 'disabled' => $action == 'view'])
    ?>
    
    <?=
        $form->field($model, 'ratesalary', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-4 col-md-2'>{input}\n{hint}{error}</div>"
        ])->widget(MaskMoney::className(), ['options' => ['disabled' => $action == 'view',
                                                          'class'    => 'form-control text-right']])
    ?>
    
    <?=
        $form->field($model, 'spjharian', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-4 col-md-2'>{input}\n{hint}{error}</div>"
        ])->widget(MaskMoney::className(), ['options' => ['disabled' => $action == 'view',
                                                          'class'    => 'form-control text-right']])
    ?>
    
    <?=
        $form->field($model, 'plafonpinjaman', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-4 col-md-2'>{input}\n{hint}{error}</div>"
        ])->widget(MaskMoney::className(), ['options' => ['disabled' => $action == 'view',
                                                          'class'    => 'form-control text-right']])
    ?>
    
    <?=
        $form->field($model, 'isactive', [
            'options'  => [
                'class' => 'form-group col-xs-12'
            ],
            'template' => "{label}<div class='col-xs-6 col-xs-offset-6 col-sm-8 col-md-offset-3 col-md-8 col-md-offset-2'>{input}\n{hint}{error}</div>"
        ])->checkbox(['maxlength' => TRUE,
                      'disabled'  => $action == 'view',
                      'label'     => \Yii::t('akhdanihr', \Yii::t("akhdanihr", 'Aktif'))
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
