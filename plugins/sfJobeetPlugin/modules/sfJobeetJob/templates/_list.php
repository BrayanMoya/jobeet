<table class="jobs">
    <thead>
    <tr>
        <th>Ubicacion</th>
        <th>Cargo</th>
        <th>Compañia</th>
    </tr>
    </thead>
        <?php foreach ($jobs as $i => $job): ?>
            <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">    <!--No entendible el fmod-->
                <td class="location">
                    <?php echo $job->getLocation() ?>
                </td>
                <td class="position">
                    <?php echo link_to($job->getPosition(), 'job_show_user', $job) ?>
                </td>
                <td class="company">
                    <?php echo $job->getCompany() ?>
                </td>
            </tr>
        <?php endforeach; ?>
</table>