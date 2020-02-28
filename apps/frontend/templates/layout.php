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
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
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
                    <form action="" method="get">
                        <input type="text" name="keywords"
                               id="search_keywords" />
                        <input type="submit" value="Buscar" />
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
                <li><a href="">Acerca de Jobeet</a></li>
                <li class="feed"><a href="">Full feed</a></li>
                <li><a href="">Jobeet API</a></li>
                <li class="last"><a href="">Afiliados</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
