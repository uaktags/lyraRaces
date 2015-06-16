<?php

namespace Module\Races\Hooks;
use \Lyra\Abstracts\Hook;
use Lyra\Container;

/**
 * PlayerRegistration
 * @see Library\Hook
 */
class raceRegistration extends Hook
{

	/**
	 * playerRegistration
	 * @param array $data
	 * @todo Isnt implemented yet
	*/
	public function playerRegistration($data) 
	{
        $raceAtts = \Config::get('races.' . $data['race']);
        foreach($raceAtts as $key=>$val)
        {
            $sql = "";
        }
		return;
	}

    public function getRaces()
    {
        $races = \App::getModel('Races');
		return $races->getRaces();
    }
	
	
}
