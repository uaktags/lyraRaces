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
		//return array('Endurance' => 32, 'Speed'=>31, 'Dexterity'=>11); TEST
	}
}
