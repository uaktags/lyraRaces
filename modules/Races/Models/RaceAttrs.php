<?php

namespace Module\Races\Models;

use Lyra\Abstracts\Model;
use \Exception;
use	\InvalidArgumentException;

/**
 * Player
 * @see Library\Model
 */
class raceAttrs extends Model
{
	/**
	 * Random state
	 * @var string
	 */
	private $randomState;
	
	protected $useCaching = false;

    protected $tableName = 'race_attributes';
	
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

    public function getByRace($data)
    {
        if(is_int($data))
        {
            return parent::findall($data, 'race_id');
        }elseif(is_string($data)){
            die('Search By RaceTitle not set yet');
        }elseif(is_array($data))
        {
            if(array_key_exists('race_id', $data)){
                return $this->getByRace((integer)$data['race_id']);
            }
        }
    }

	public function getAllAssigned()
	{
		return parent::findAll();
	}
}