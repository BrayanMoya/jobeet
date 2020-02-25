<?php use_stylesheet('job.css') ?>

<?php use_helper('Text') ?>

<!--titulo que aparece en la pestaña del navegador, personalizable-->
<?php slot(
    'title',
    sprintf('%s Esta buscando un %s', $job->getCompany(), $job->getPosition()))   //INTERESANTE
?>
<!--
<?php echo get_slot('title') ?>  HELPER get_ sirve para obtener lo que se este enviando en los helpers
-->
<div id="job">
    <h1><?php echo $job->getCompany() ?></h1>
    <h2><?php echo $job->getLocation() ?></h2>
    <h3>
        <?php echo $job->getPosition() ?>
        <small> - <?php echo $job->getType() ?></small>
    </h3>

    <?php if ($job->getLogo()): ?>
        <div class="logo">
            <a href="<?php echo $job->getUrl() ?>">
                <img src="/uploads/jobs/<?php echo $job->getLogo() ?>"
                     alt="<?php echo $job->getCompany() ?> logo" />
            </a>
        </div>
    <?php endif; ?>

    <div class="description">
        <?php echo $job->getDescription() ?>
    </div>

    <h4>Como Aplicar?</h4>

    <p class="how_to_apply"><?php echo $job->getHowToApply() ?></p>

    <div class="meta">
        <small>Publicado el <?php echo $job->getDateTimeObject('created_at')->format('m/d/Y') ?></small>
    </div>

    <div style="padding: 20px 0" id="job">
        <a href="<?php echo url_for('job/edit?id='.$job->getId()) ?>" style="text-decoration: none">
            Editar
        </a>
        <br>
        <a href="<?php echo url_for('job/index') ?>"  style="text-decoration: none" >Listar Trabajos</a>
    </div>
</div>

<!--<table>-->
<!--  <tbody>-->
<!--    <tr>-->
<!--      <th>Id:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getId() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Category:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getCategoryId() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Type:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getType() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Company:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getCompany() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Logo:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getLogo() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Url:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getUrl() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Position:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getPosition() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Location:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getLocation() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Description:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getDescription() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>How to apply:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getHowToApply() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Token:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getToken() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Is public:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getIsPublic() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Is activated:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getIsActivated() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Email:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getEmail() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Expires at:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getExpiresAt() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Created at:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getCreatedAt() ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <th>Updated at:</th>-->
<!--      <td>--><?php //echo $jobeet_job->getUpdatedAt() ?><!--</td>-->
<!--    </tr>-->
<!--  </tbody>-->
<!--</table>-->
<!---->
<!--<hr />-->
<!---->
<!--<a href="--><?php //echo url_for('job/edit?id='.$jobeet_job->getId()) ?><!--">Edit</a>-->
&nbsp;

