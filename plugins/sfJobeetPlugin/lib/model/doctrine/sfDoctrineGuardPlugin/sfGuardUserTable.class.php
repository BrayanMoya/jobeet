<?php

/**
 * sfGuardUserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfGuardUserTable extends PluginsfGuardUserTable
{
    /**
     * Returns an instance of this class.
     *
     * @return sfGuardUserTable The table instance
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardUser');
    }
}