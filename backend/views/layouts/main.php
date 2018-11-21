<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItems = [];

    if (Yii::$app->user->isGuest) {

        $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];

    } else { ?>
        <div id="menu_puncts">
            <div class="menu_puncts_title">Разделы</div>
            <ul>
                <li class="menu-block">Главная</li>
                <li url="views/slider.php" class="menu_punct"><a href="#">Слайдер на главной</a></li>
                <li url="views/video.php" class="menu_punct"><a href="/video/index">Раздел с видео</a></li>
                <li class="menu-block">Коллекция</li>
                <li url="views/coffee_text.php" class="menu_punct"><a href="/coffee-text/update?id=1">Описание коллекций</a></li>
                <li url="views/coffee.php" class="menu_punct"><a href="/coffee/root">Кофе</a></li>
                <li class="menu-block">Впечатления</li>
                <li url="views/radio.php" class="menu_punct"><a href="/radio/index">Музыка настоящего</a></li>
                <li class="menu-block">Знания о кофе</li>
                <li url="views/abc.php" class="menu_punct"><a href="/abc/root">Азбука вкуса</a></li>
                <li class="menu-block">События</li>
                <li url="views/news.php" class="menu_punct"><a href="/news/index">Список событий</a></li>
                <li class="menu-block">Разделы</li>
                <li url="views/titles.php" class="menu_punct"><a href="/titles/index">Управление разделами</a></li>
            </ul>
        </div>

        <?php
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выйти (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
