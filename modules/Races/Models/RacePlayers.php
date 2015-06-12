<?php

namespace Module\Races\Models;

use Lyra\Abstracts\Model;
use \Exception;
use	\InvalidArgumentException;

/**
 * Player
 * @see Library\Model
 */
class racePlayers extends Model
{
	/**
	 * Random state
	 * @var string
	 */
	private $randomState;
	
	protected $useCaching = false;

    protected $tableName = 'race_players';
	
	/**
	 * create
	 * Creates a new race
	 * Exception codes
	 * 1 - Invalid email
	 * 2 - Invalid username
	 * 4 - Username in use
	 * 8 - Email in use
	 * 16 - Invalid confirm password
	 * 32 - Invalid password
	 * 
	 * @param array $data
	 * @throws Exception
	 * @throws InvalidArgumentException
	 * @return unknown
	 */
	public function create($data)
	{
		/* It's good for UI to produce a list of invalid input */
		$errors = array();
		
        if(!isset($data['race_id'])) {
            $default = \Config::get('races.default');

            if ($default === false) {
                $default = 1;
            }
            $data['race_id'] = $default;
        }

		return parent::add($data);

	}
	
	public function getAllAssigned()
	{
		return parent::findAll();
	}
}