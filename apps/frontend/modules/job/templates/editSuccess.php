<?php use_stylesheet('job.css') ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<h1>Editar Trabajo</h1>

<?php echo form_tag_for($form, '@job') ?>
<table id="job_form">
    <tfoot>
    <tr>
        <td colspan="2">
            <input type="submit" value="Edit Job" />
        </td>
    </tr>
    </tfoot>
    <tbody>
    <?php echo $form ?>
    </tbody>
</table>
</form>