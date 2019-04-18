<?php
use yii\helpers\Html;
use hscstudio\mimin\components\Mimin;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- /.search form -->
        <?php
        [
            ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
            ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
            [
                'label' => 'Same tools',
                'icon' => 'share',
                'url' => '#',
                'items' => [
                    ['label' => 'Gii', 'ic  on' => 'file-code-o', 'url' => ['/gii'],],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    [
                        'label' => 'Level One',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                            [
                                'label' => 'Level Two',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                    ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $menuItems = [
            ['label' => 'Home', 'url' => ['/admin']],
            ['label' => 'User', 'url' => ['/admin/rbac/user']],
            [       
                'label' => Yii::t('app','Akses Kontrol'),
                'url' => ['/admin/rbac/route'],
                'items' => [
                    ['label' => 'Route', 'url' => ['/admin/rbac/route']],
                    ['label' => 'Roles', 'url' => ['/admin/rbac/role']],
                    ['label' => 'User', 'url' => ['/admin/rbac/user']],
                ]
            ],
            [
                'label' => Yii::t('app', 'Setting Prodi'),
                'url' => ['#'],
                'items' => [
                    ['label' => 'Prodi', 'url' => ['/admin/setprodi']]
                ]
            ],
            [       
                'label' => Yii::t('app','Cetak Absen'),
                'url' => ['/admin/rbac/route'],
                'items' => [
                    ['label' => 'UTS', 'url' => ['/admin/krsmatkul']],
                    ['label' => 'UAS', 'url' => ['/admin/krsmatkul']],
                     
                ]
            ],
        ];
        $items =  Mimin::filterMenu($menuItems);
        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
