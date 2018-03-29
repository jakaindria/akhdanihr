<?php
    
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    /**
     * @var yii\web\View                 $this
     * @var app\modules\org\models\Pajak $model
     * @var yii\widgets\ActiveForm       $form
     * @var string                       $action
     */
    
    $action = $action ?: ($model->isNewRecord ? 'create' : 'update');
?>

<div class="pajak-form">
    <?php
        $form = ActiveForm::begin([
                                      'options' => [
                                          'class'   => 'form-horizontal form-label-left',
                                          'enctype' => 'multipart/form-data'
                                      ]
                                  ]);
    ?>
    
    <?=
        $form->field($model, 'jenis', [
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
        $form->field($model, 'masa', [
            'labelOptions' => [
                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
            ],
            'options'      => [
                'class' => 'form-group col-xs-12',
            ],
            'template'     => "{label}<div class='col-xs-6 col-sm-4 col-md-2'>{input}\n{hint}{error}</div>"
        ])->textInput(['maxlength' => TRUE, 'disabled' => $action == 'view'])
    ?>
    
    <?=
        $form->field($model, 'nomorbukti', [
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
        $form->field($model, 'tglbukti', [
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
            'value'         => $model->isNewRecord ? date('d-M-Y') : date('d-M-Y', DateTime::createFromFormat('Y-m-d', $model->tglbukti)->getTimestamp()),
            'pluginOptions' => [
                'todayHighlight' => TRUE,
                'todayBtn'       => TRUE,
                'format'         => 'yyyy-mm-dd',
                'autoclose'      => TRUE,
            ]
        ]);
    ?>
    
    <?php
        if (isset($model->docname) && isset($model->docurl)) {
            $html .= Html::beginTag('div', ['class' => 'form-group col-xs-12']);
            $html .= Html::label(\Yii::t("akhdanihr", 'Lampiran'), NULL, ['class' => 'control-label col-xs-6 col-sm-3 col-md-2']);
            $html .= Html::beginTag('div', ['class' => 'col-xs-6 col-sm-7 col-md-3']);
            $html .= Html::beginTag('p', ['class' => 'form-control-static']);
            $html .= Html::a($model->docname, Yii::$app->getHomeUrl() . $model->docurl, ['target' => '_blank']);
            $html .= Html::endTag('p');
            $html .= Html::endTag('div');
            $html .= Html::endTag('div');
            
            echo $html;
        }
    ?>
    
    <?php
        if ($action != 'view') {
            echo $form->field($model, 'dokumen', [
                'labelOptions' => [
                    'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
                ],
                'options'      => [
                    'class' => 'form-group col-xs-12'
                ],
                'template'     => "{label}<div class='col-xs-6 col-sm-7 col-md-3'>{input}\n{hint}{error}</div>"
            ])->fileInput(['disabled' => $action == 'view'])->label(isset($model->docname) && isset($model->docurl) ? "" : "Lampiran");
        }
    ?>

    <div class="form-group text-right">
        <?= Html::a($action != 'view' ? "<i class='fa fa-times'></i> " . \Yii::t('akhdanihr', 'Batal') : "<i class='fa fa-arrow-left'></i> " . \Yii::t('akhdanihr', 'Kembali'),
                    Yii::$app->request->referrer ?: ['.'],
                    ['class' => $action != 'view' ? 'btn btn-danger' : 'btn btn-primary']) ?>
        <?= $action != 'view' ? Html::submitButton("<i class='fa fa-save'></i> " . \Yii::t('akhdanihr', 'Simpan'), ['class' => 'btn btn-success']) : '' ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>
