<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <!--titulo que aparece en la pestaña del navegador, se puede personalizar dependiendo de lo que se este realizando en cada ventana, como esta en showSucces de Job-->
    <title>
        <?php if (!include_slot('title')): ?>
            Jobeet - Tu Mejor Bolsa De Trabajo
        <?php endif; ?>
    </title>

    <link rel="icon" href="https://img.icons8.com/color/48/000000/symfony.png">
    <?php use_javascript('jquery-1.9.1.min.js') ?>
    <?php include_stylesheets() ?>
    <?php use_javascript('search.js') ?>

    <link rel="alternate" type="application/atom+xml" title="Latest Jobs"
          href="<?php echo url_for('job', array('sf_format' => 'atom'), true) ?>" />

</head>
<body>
<div id="container">
    <div id="header">
        <div class="content">
            <h1><a href="<?php echo url_for('@homepage') ?>">
                    <img src="/legacy/images/jobeet.gif" alt="Jobeet Job Board" />
                </a></h1>

            <div id="sub_header">
                <div class="post">
                    <h2>Pregunta Por Personas</h2>
                    <div>
                        <a href="<?php echo url_for('@job_new') ?>">Publica un Trabajo</a>
                    </div>
                </div>

                <div class="search">
                    <h2>Pregunta por un Trabajo</h2>
                    <form action="<?php echo url_for('job_search') ?>" method="get">
                        <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
                        <img id="loader" src="/legacy/images/loader.gif" style="vertical-align: middle; display: none" />
                        <div class="help">
                            Ingresa Algunas Palabras Clave (ciudad, pais, posicion, ...)
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <?php if ($sf_user->hasFlash('notice')): ?>
            <div class="flash_notice">
                <?php echo $sf_user->getFlash('notice') ?>
            </div>
        <?php endif; ?>

        <?php if ($sf_user->hasFlash('error')): ?>
            <div class="flash_error">
                <?php echo $sf_user->getFlash('error') ?>
            </div>
        <?php endif; ?>


        <div id="job_history">
            Historial de trabajos vistos:
            <ul>
                <?php foreach ($sf_user->getJobHistory() as $job): ?>
                    <li>
                        <?php echo link_to($job->getPosition().' - '.$job->getCompany(), 'job_show_user', $job) ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>

        <div class="content">
            <?php echo $sf_content ?>
        </div>
    </div>

    <div id="footer">
        <div class="content">
          <span class="symfony">
            <img src="/legacy/images/jobeet-mini.png" />
            powered by <a href="/">
            <img src="/legacy/images/symfony.gif" alt="symfony framework" />
            </a>
          </span>
            <ul>
                <li><a href=""><?php echo __('Acerca de Jobeet')?></a></li>
                <li class="feed">
                    <?php echo link_to(__('Full feed'), 'job', array('sf_format' => 'atom')) ?>
                </li>
                <li><a href=""><?php echo __('Jobeet API') ?></a></li>
                <li class="last">
                    <?php echo link_to(__('Conviertete en un afiliado'), 'affiliate_new') ?>
                </li>
            </ul>

            <?php include_component('sfJobeetLanguage', 'sfJobeetLanguage') ?>

        </div>
    </div>
</div>

<?php include_javascripts() ?>
</body>
</html>
