<?php
    
    use app\modules\master\models\UnitKerja;
    use kartik\select2\Select2;
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    /**
     * @var yii\web\View                        $this
     * @var app\modules\master\models\UnitKerja $model
     * @var yii\widgets\ActiveForm              $form
     * @var string                              $action
     */
    
    $action = $action ?: ($model->isNewRecord ? 'create' : 'update');
    
    if ($model->isNewRecord) {
        $parent = UnitKerja::find()->active()->orderBy("nama")->all();
        
        // Set default value isactive jika data baru
        $model->isactive = 1;
    } else {
        $parent = UnitKerja::find()->active()->andWhere("NOT treecode LIKE '$model->treecode%'")->orderBy("nama")->all();
    }
    $parentOptionsData = ArrayHelper::map($parent, 'id', 'nama');
?>

<div class="unit-kerja-form">
    <?php
        $form = ActiveForm::begin([
                                      'options' => [
                                          'class' => 'form-horizontal form-label-left'
                                      ]
                                  ]);
    ?>
    
    <?=
        $form->field($model, 'parentid', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12',
                'style' => 'margin-top: 30px'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-6'>{input}\n{hint}{error}</div>"
        ])->widget(Select2::className(), [
            'data'          => $parentOptionsData,
            'options'       => ['prompt' => ''],
            'theme'         => Select2::THEME_BOOTSTRAP,
            'disabled'      => $action == 'view',
            'pluginOptions' => [
                'allowClear' => TRUE
            ],
        ]);
    ?>
    
    <?=
        $form->field($model, 'nama', [
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
        $form->field($model, 'alamat', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-6'>{input}\n{hint}{error}</div>"
        ])->textarea(['maxlength' => TRUE, 'disabled' => $action == 'view', 'rows' => 4])
    ?>
    
    <?=
        $form->field($model, 'telepon', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-4'>{input}\n{hint}{error}</div>"
        ])->textInput(['maxlength' => TRUE, 'disabled' => $action == 'view'])
    ?>
    
    <?=
        $form->field($model, 'fax', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-4'>{input}\n{hint}{error}</div>"
        ])->textInput(['maxlength' => TRUE, 'disabled' => $action == 'view'])
    ?>
    
    <?=
        $form->field($model, 'email', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-4'>{input}\n{hint}{error}</div>"
        ])->textInput(['maxlength' => TRUE, 'disabled' => $action == 'view'])
    ?>
    
    <?=
        $form->field($model, 'ishavegl', [
            'options'  => [
                'class' => 'form-group col-xs-12'
            ],
            'template' => "{label}<div class='col-xs-6 col-xs-offset-6 col-sm-8 col-md-offset-3 col-md-8 col-md-offset-2'>{input}\n{hint}{error}</div>"
        ])->checkbox(['maxlength' => TRUE,
                      'disabled'  => $action == 'view',
                      'label'     => \Yii::t("akhdanihr", 'Aktif')
                     ])
    ?>
    
    <?=
        $form->field($model, 'isactive', [
            'options'  => [
                'class' => 'form-group col-xs-12'
            ],
            'template' => "{label}<div class='col-xs-6 col-xs-offset-6 col-sm-8 col-md-offset-3 col-md-8 col-md-offset-2'>{input}\n{hint}{error}</div>"
        ])->checkbox(['maxlength' => TRUE,
                      'disabled'  => $action == 'view',
                      'label'     => \Yii::t("akhdanihr", 'Aktif')
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
