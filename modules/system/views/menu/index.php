<?php
    
    use app\modules\system\models\Menu;
    use kartik\select2\Select2;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    /**
     * @var yii\web\View                   $this
     * @var app\modules\system\models\Menu $model
     * @var array                          $routeOptionsData
     * @var array                          $menu
     * @var yii\widgets\ActiveForm         $form
     */
    
    $action = $model->isNewRecord ? "add" : "update";
?>

<div class="menu-index">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= \Yii::t('system_menu', 'Menu Management') ?>
            </h3>
        </div>
        <div class="title_right">
            <div class="col-xs-12 text-right">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-5">
            <div class="x_panel">
                <div class="x_title">
                    <h4><?= \Yii::t("system_menu", 'Daftar Menu Tersedia') ?></h4>
                </div>
                <div class="x_content">
                    <?php
                        $table .= Html::beginTag("table", ["class" => "table no-border"]);
                        foreach ($menu as $p){
                            $table .= Html::beginTag("tr");
                            $table .= Html::beginTag("td");
                            $table .= Html::tag("i", '', ["class" => "fa fa-".$p->icon, "style" => "margin-right: 10px"]);
                            $table .= $p->label;
                            $table .= Html::endTag("td");
                            $table .= Html::beginTag("td", ["style" => "min-width: 10px", "class" => "text-right"]);
                            
                            if ($p->ordernumber > 1){
                                $table .= Html::a("<i class='fa fa-arrow-up'></i>", [], [
                                    'class' => 'btn btn-sm btn-default text-center',
                                    'title' => \Yii::t("system_menu", 'Geser Ke Atas')
                                ]);
                            }
    
                            if ($p->ordernumber < count($menu)){
                                $table .= Html::a("<i class='fa fa-arrow-down'></i>", [], [
                                    'class' => 'btn btn-sm btn-default text-center',
                                    'title' => \Yii::t("system_menu", 'Geser Ke Bawah')
                                ]);
                            }
                            
                            $table .= Html::a("<i class='fa fa-edit'></i>", ['.', 'id' => $p->id], [
                                'class' => 'btn btn-sm btn-warning text-center',
                                'title' => \Yii::t("akhdanihr", 'Edit')
                            ]);
                            
                            $table .= Html::endTag("td");
                            $table .= Html::endTag("tr");
                            
                            foreach ($p->children as $c){
                                $table .= Html::beginTag("tr");
                                $table .= Html::beginTag("td", ["style" => "padding-left: 3em"]);
                                $table .= $c->label;
                                $table .= Html::endTag("td");
                                $table .= Html::beginTag("td", ["style" => "min-width: 10px", "class" => "text-right"]);
    
                                if ($c->ordernumber > 1){
                                    $table .= Html::a("<i class='fa fa-arrow-up'></i>", [], [
                                        'class' => 'btn btn-sm btn-default text-center',
                                        'title' => \Yii::t("system_menu", 'Geser Ke Atas')
                                    ]);
                                }
    
                                if ($c->ordernumber < count($p->children)){
                                    $table .= Html::a("<i class='fa fa-arrow-down'></i>", [], [
                                        'class' => 'btn btn-sm btn-default text-center',
                                        'title' => \Yii::t("system_menu", 'Geser Ke Bawah')
                                    ]);
                                }
    
                                $table .= Html::a("<i class='fa fa-edit'></i>", ['.', 'id' => $c->id], [
                                    'class' => 'btn btn-sm btn-warning text-center',
                                    'title' => \Yii::t("akhdanihr", 'Edit')
                                ]);
                                
                                $table .= Html::endTag("td");
                                $table .= Html::endTag("tr");
                            }
                        }
                        $table .= Html::endTag("table");
                        
                        echo $table;
                    ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-7">
            <div class="x_panel">
                <?php
                    $form = ActiveForm::begin([
                                                  'options' => [
                                                      'class' => 'form-horizontal form-label-left'
                                                  ]
                                              ]);
                ?>
                <div class="x_title">
                    <h4><?php
                            if ($action == 'update') {
                                echo \Yii::t('akhdanihr', 'Ubah {data}', [
                                    'data' => \Yii::t('system_menu', 'Menu')
                                ]);
                            } else {
                                echo \Yii::t('akhdanihr', 'Tambah {data}', [
                                    'data' => \Yii::t('system_menu', 'Menu')
                                ]);
                            }
                        ?></h4>
                </div>
                <div class="x_content menu-form">
                    <div class="form-group text-right">
                        <?= $action == 'update' ? Html::a("<i class='fa fa-times'></i> " . \Yii::t('akhdanihr', 'Batal'),
                                                          ['.'], ['class' => 'btn btn-danger']) : '' ?>
                        <?= Html::submitButton("<i class='fa fa-save'></i> " . \Yii::t('akhdanihr', 'Simpan'), ['class' => 'btn btn-success']) ?>
                    </div>
                    
                    <?=
                        $form->field($model, 'parentid', [
                            'labelOptions' => [
                                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
                            ],
                            'options'      => [
                                'class' => 'form-group col-xs-12',
                            ],
                            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-8'>{input}\n{hint}{error}</div>"
                        ])->widget(Select2::className(), [
                            'data'          => $parentOptionsData,
                            'options'       => ['prompt' => ''],
                            'theme'         => Select2::THEME_BOOTSTRAP,
                            'pluginOptions' => [
                                'allowClear' => TRUE
                            ],
                        ]);
                    ?>
                    
                    <?=
                        $form->field($model, 'label', [
                            'labelOptions' => [
                                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
                            ],
                            'options'      => [
                                'class' => 'form-group col-xs-12'
                            ],
                            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-8'>{input}\n{hint}{error}</div>"
                        ])->textInput(['maxlength' => TRUE])
                    ?>
                    
                    <?=
                        $form->field($model, 'icon', [
                            'labelOptions' => [
                                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
                            ],
                            'options'      => [
                                'class' => 'form-group col-xs-12'
                            ],
                            'template'     => "{label}<div class='col-xs-6 col-sm-6 col-md-3'>{input}{hint}\n{error}</div>"
                        ])->hint("<a href='https://fontawesome.com/v4.7.0/icons/' target='_blank' title='Referensi Icon'><span class='fa-stack'><i class='fa fa-circle fa-stack-2x'></i><i class='fa fa-question fa-stack-1x fa-inverse'></i></span></a>")
                            ->textInput(['maxlength' => TRUE])
                    ?>
                    
                    <?=
                        $form->field($model, 'url', [
                            'labelOptions' => [
                                'class' => 'control-label col-xs-6 col-sm-3 col-md-2'
                            ],
                            'options'      => [
                                'class' => 'form-group col-xs-12',
                            ],
                            'template'     => "{label}<div class='col-xs-6 col-sm-8 col-md-8'>{input}\n{hint}{error}</div>"
                        ])->widget(Select2::className(), [
                            'data'          => $routeOptionsData,
                            'options'       => ['prompt' => ''],
                            'theme'         => Select2::THEME_BOOTSTRAP,
                            'pluginOptions' => [
                                'allowClear' => TRUE
                            ],
                        ]);
                    ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>
</div>