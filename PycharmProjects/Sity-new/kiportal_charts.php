<?php
/**
 * Created by PhpStorm.
 * User: Aleksandrs
 * Date: 24.03.2019
 * Time: 5:34
 */

$active_nav = 4;
include_once 'modules/head.php';
?>
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Переключение навигации</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">KIPORTAL.RU</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="">
                            <i class="fa fa-search"></i>
                            <p class="hidden-lg hidden-md">Поиск</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>
                                FAQ
                                <b class="caret"></b>
                            </p>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="kiportal_charts.php">Где графики?</a></li>
                            <li><a href="kiportal.php">Таблица данных</a></li>
                            <li><a href="user.php">О нас</a></li>
                            <li class="divider"></li>
                            <li><a href="https://vk.com/talgatv">Мы в "Вконтакте"</a></li>
                        </ul>
                    </li>

                    <li class="separator hidden-lg"></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <iframe style="width: 100%; overflow: hidden; height: 400px; border: none;"
                    src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSp-ui4tzGc-BfNzfB6U9qC3MzoHqCLj2QCnGhSTwnKTHZn7wVWdL5thwnMhxXdCs4dNKPdFNSEb8A4/pubchart?oid=611958800&format=interactive">

                </iframe>
            </div>
        </div>
    </div>
<?php
include_once 'modules/footer.php';

