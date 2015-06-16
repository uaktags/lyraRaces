<?php

namespace Module\Races\Hooks;

/**
 * Example plugin
 */
class Example extends \Lyra\Abstracts\Hook
{
	/**
	 * Implementation of the playerStats hook..called in the main PlayerStats hook.
	 */
	public function playerStats()
	{
        $module = \App::getModel('Module');
        if($module->isActive('Races')) {
            $race = \App::getModel("racePlayers");
            //$player = \App::getModel('Session')->getPlayerId();
            $raceAttrs = \App::getModel("raceAttrs");
            $playerAttrs = \App::getModel('racePlayerAttrs');
            //$raceid = $race->getPlayer($player);
            $raceid = $race->getPlayerLoggedIn();
            $Attrs = $raceAttrs->getByRace($raceid);
            $result = array();
            foreach ($Attrs as $key => $Attr) {
                $val = $playerAttrs->getByID((integer)$Attr['attribute_id']);
                $result = array_merge($result, array($val => $Attr['value']));
            }

            return $result;
        }
	}
}
