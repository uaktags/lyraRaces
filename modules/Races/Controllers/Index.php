<?php

namespace Module\Races\Controllers;

use Lyra\Abstracts\Controller,
    \Module\Races\Models\Installer;
/**
 * Installer Index
 * @see Library\Module
 */
class Index extends Controller
{
    /**
     * Page title
     * @var string
     */
    protected $title = 'Welcome to lyraEngine | Installer!';

	/**
	 * Default Action
	 */
	public function index()
	{
       $this->install();
    }

    /**
     * @param array $args
     */
    public function install (array $args = array())
    {
        $this->validate();
        $prefix = \Config::get('db.prefix');
            try {
                $installer = new Installer($this->container);
                foreach ( glob(__DIR__.'/Config/Sql/*.sql') as $query ) {
                    $installer->runSqlFile($query, $prefix);
                }
                $settings = \App::getModel('setting');
                $base = array('title'=>'races'); //Create a new Parent Setting
                $parent = $settings->create($base);
                $default = array('parent_id'=>$parent, 'title'=>'default', 'value'=>1); //Add to parent
                $settings->create($default);
                $settings->buildCache();
                $settings->updateConfig();
            } catch(\Exception  $e) {
                die($e->getMessage());
                \View::setMessage('Please check your database configurations', 'fail');
                \View::setTemplate("Error");
            }
                header("location: " . \Config::get('site.url'));
                exit;
    }

    public function validate()
    {
        if(\Acl::verify('canAdminModules')){
            $installer = new Installer($this->container);
            if($installer->isInstalled()) {
                $installer->checkUsers();
                header("Location: " . \Config::get('site.url'));
                exit;
            }
        }else{
            header("Location: " . \Config::get('site.url'));
            exit;
        }
    }


}