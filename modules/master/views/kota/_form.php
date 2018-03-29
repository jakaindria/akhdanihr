<?php
    
    use app\modules\master\models\Provinsi;
    use kartik\select2\Select2;
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    /**
     * @var yii\web\View                   $this
     * @var app\modules\master\models\Kota $model
     * @var yii\widgets\ActiveForm         $form
     * @var Provinsi[]|array               $provinsi
     * @var array                          $provinsiOptionsData
     * @var string                         $action
     */
    
    $action = $action ?: ($model->isNewRecord ? 'create' : 'update');
    
    $provinsi = Provinsi::find()->notDeleted()->orderBy("nama")->all();
    $provinsiOptionsData = ArrayHelper::map($provinsi, 'id', 'nama');
?>

<div class="kota-form">
    <?php
        $form = ActiveForm::begin([
                                      'options' => [
                                          'class' => 'form-horizontal form-label-left'
                                      ]
                                  ]);
    ?>
    
    <?=
        $form->field($model, 'provinceid', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12',
                'style' => 'margin-top: 30px'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-4'>{input}\n{hint}{error}</div>"
        ])->widget(Select2::className(), [
            'data'          => $provinsiOptionsData,
            'options'       => ['prompt' => ''],
            'theme'         => Select2::THEME_BOOTSTRAP,
            'disabled'      => $action == 'view',
            'pluginOptions' => [
                'allowClear' => TRUE
            ],
        ]);
    ?>
    
    <?=
        $form->field($model, 'kode', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12'
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-1'>{input}\n{hint}{error}</div>"
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
            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-4'>{input}\n{hint}{error}</div>"
        ])->textInput(['maxlength' => TRUE, 'disabled' => $action == 'view'])
    ?>

    <div class="form-group text-right">
        <?= Html::a($action != 'view' ? "<i class='fa fa-times'></i> " . \Yii::t('akhdanihr', 'Batal') : "<i class='fa fa-arrow-left'></i> " . \Yii::t('akhdanihr', 'Kembali'),
                    Yii::$app->request->referrer ?: ['.'],
                    ['class' => $action != 'view' ? 'btn btn-danger' : 'btn btn-primary']) ?>
        <?= $action != 'view' ? Html::submitButton("<i class='fa fa-save'></i> " . \Yii::t('akhdanihr', 'Simpan'), ['class' => 'btn btn-success']) : '' ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>
