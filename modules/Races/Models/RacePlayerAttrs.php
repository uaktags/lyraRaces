<?php

namespace Module\Races\Models;

use Lyra\Abstracts\Model;
use \Exception;
use	\InvalidArgumentException;

/**
 * Player
 * @see Library\Model
 */
class racePlayerAttrs extends Model
{
	/**
	 * Random state
	 * @var string
	 */
	private $randomState;
	
	protected $useCaching = false;

    protected $tableName = 'attributes';
	
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

    public function getByID($data)
    {
        if(is_int($data))
        {
            $array = parent::find($data, 'attribute_id', 'title');
            foreach($array as $key=>$val)
            {
                return $val;
            }
        }elseif(is_string($data)){
            die('Search By RaceTitle not set yet');
        }elseif(is_array($data))
        {
            if (array_key_exists('attribute_id', $data)) {
                return $this->getByID((integer)$data['attribute_id']);
            }
        }
    }

	public function getAllAssigned()
	{
		return parent::findAll();
	}
}