<?php
    
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    /**
     * @var yii\web\View                   $this
     * @var app\modules\system\models\Role $model
     * @var yii\widgets\ActiveForm         $form
     * @var string                         $action
     */
    
    $action = $action ?: ($model->isNewRecord ? 'create' : 'update');
?>

<div class="role-form">
    <?php
        $form = ActiveForm::begin([
                                      'options' => [
                                          'class' => 'form-horizontal form-label-left'
                                      ]
                                  ]);
    ?>
    
    <?=
        $form->field($model, 'id', [
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
        $form->field($model, 'islinktounitkerja', [
            'options'  => [
                'class' => 'form-group col-xs-12'
            ],
            'template' => "{label}<div class='col-xs-6 col-xs-offset-6 col-sm-8 col-md-offset-3 col-md-8 col-md-offset-2'>{input}\n{hint}{error}</div>"
        ])->checkbox(['maxlength' => TRUE,
                      'disabled'  => $action == 'view',
                      'label'     => \Yii::t('system_role', 'Terkait Ke Unit Kerja')
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
