<div id="job_actions">
    <h3>Admin</h3>
    <ul>
        <?php if (!$job->getIsActivated()): ?>
            <li><?php echo link_to('Editar', 'job_edit', $job) ?></li>
            <li><?php echo link_to('Publicar', 'job_publish', $job, array('method' => 'put')) ?></li>
        <?php endif ?>
        <li><?php echo link_to('Eliminar', 'job_delete', $job, array('method' => 'delete', 'confirm' => 'Estas Seguro?')) ?></li>
        <?php if ($job->getIsActivated()): ?>
            <li<?php $job->expiresSoon() and print ' class="expires_soon"' ?>>
                <?php if ($job->isExpired()): ?>
                    Expirado
                <?php else: ?>
                    Expira en <strong><?php echo $job->getDaysBeforeExpires() ?></strong> dias
                <?php endif ?>

                <?php if ($job->expiresSoon()): ?>
                    - <a href="">Extender</a> por otros <?php echo sfConfig::get('app_active_days') ?> dias
                <?php endif ?>
            </li>
        <?php else: ?>
            <li>
                [Marcar esta <?php echo link_to('URL', 'job_show', $job, true) ?> para administrar este trabajo en el futuro.]
            </li>
        <?php endif ?>
    </ul>
</div>