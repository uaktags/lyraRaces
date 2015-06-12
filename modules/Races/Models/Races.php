<?php

namespace Module\Races\Models;

use Lyra\Abstracts\Model;
use \Exception;
use	\InvalidArgumentException;

/**
 * Races
 * @see Library\Model
 */
class Races extends Model
{
	/**
	 * Random state
	 * @var string
	 */
	private $randomState;
	
	protected $useCaching = false;

    protected $tableName = 'races';
	
	/**
	 * create
	 * Creates a new race
	 * Exception codes
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
		

        /* Create the actual record */
		//$data['player_id'] = parent::add($data);

		
		return $data;
	}
	
	public function getRaces()
	{
		return parent::findAll();
	}
}