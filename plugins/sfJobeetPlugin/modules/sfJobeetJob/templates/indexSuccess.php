<?php use_stylesheet('jobs.css') ?>

<h1>Lista De Trabajos Activos</h1>

<!-- Mostrar items en tabla separa por categoria -->

<div id="jobs">
    <?php foreach ($categories as $category): ?>

        <div class="category_<?php echo Jobeet::slugify($category->getName()) ?>">  <!-- Slugify no es entendible -->

            <div class="category">
                <div class="feed">
                    <a href="<?php echo url_for('category', array('sf_subject' => $category, 'sf_format' => 'atom')) ?>">Feed</a>
                </div>
                <h1>
                    <?php echo link_to($category, 'category', $category) ?>
<!--                    --><?php //$link =  "echo link_to($category, 'category', $category)" ?>
<!--                    --><?php //printf($link); exit;?>
                </h1>
            </div>



            <?php include_partial('sfJobeetJob/list', array('jobs' => $category->getActiveJobs(sfConfig::get('app_max_jobs_on_homepage')))) ?>

            <?php if (($count = $category->countActiveJobs() -
                    sfConfig::get('app_max_jobs_on_homepage')) > 0): ?>
                <div class="more_jobs">
                    <?php echo __('%count% mas...', array('%count%' => link_to($count, 'category', $category))) ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>



<a href="<?php echo url_for('sfJobeetJob/new') ?>">Nuevo</a>

<!-- Mostrar todos los items sin clasificacion-->

<!--<div id="jobs">-->
<!--    <table class="jobs">-->
<!--        <tbody>-->
<!--            --><?php //foreach ($jobeet_jobs as $i => $sfJobeetJob): ?>
<!--                <tr class="--><?php //echo fmod($i, 2) ? 'even' : 'odd' ?><!--">-->
<!--                    <td class="location">--><?php //echo $sfJobeetJob->getLocation() ?><!--</td>-->
<!--                    <td class="position">-->
<!--                        <a href="--><?php //echo url_for('job_show_user', $sfJobeetJob) ?><!--">-->
<!--                            --><?php //echo $sfJobeetJob->getPosition() ?>
<!--                        </a>-->
<!--                    </td>-->
<!--                    <td class="company">--><?php //echo $sfJobeetJob->getCompany() ?><!--</td>-->
<!--                </tr>-->
<!---->
<!--            --><?php //endforeach; ?>
<!--        </tbody>-->
<!--    </table>-->
<!--</div>-->


<!--Por defecto con la tabla-->

<!--<table>-->
<!--  <thead>-->
<!--    <tr>-->
<!--      <th>Id</th>-->
<!--      <th>Category</th>-->
<!--      <th>Type</th>-->
<!--      <th>Company</th>-->
<!--      <th>Logo</th>-->
<!--      <th>Url</th>-->
<!--      <th>Position</th>-->
<!--      <th>Location</th>-->
<!--      <th>Description</th>-->
<!--      <th>How to apply</th>-->
<!--      <th>Token</th>-->
<!--      <th>Is public</th>-->
<!--      <th>Is activated</th>-->
<!--      <th>Email</th>-->
<!--      <th>Expires at</th>-->
<!--      <th>Created at</th>-->
<!--      <th>Updated at</th>-->
<!--    </tr>-->
<!--  </thead>-->
<!--  <tbody>-->
<!--    --><?php //foreach ($jobeet_jobs as $jobeet_job): ?>
<!--    <tr>-->
<!--      <td><a href="--><?php //echo url_for('sfJobeetJob/show?id='.$jobeet_job->getId()) ?><!--">--><?php //echo $jobeet_job->getId() ?><!--</a></td>-->
<!--      <td>--><?php //echo $jobeet_job->getCategoryId() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getType() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getCompany() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getLogo() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getUrl() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getPosition() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getLocation() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getDescription() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getHowToApply() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getToken() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getIsPublic() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getIsActivated() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getEmail() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getExpiresAt() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getCreatedAt() ?><!--</td>-->
<!--      <td>--><?php //echo $jobeet_job->getUpdatedAt() ?><!--</td>-->
<!--    </tr>-->
<!--    --><?php //endforeach; ?>
<!--  </tbody>-->
<!--</table>-->
