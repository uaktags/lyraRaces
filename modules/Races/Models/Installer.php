<?php

namespace Module\Races\Models;

use Lyra\Abstracts\Model;

/**
 * Installer
 * @see \Lyra\Abstracts\Model
 */
class Installer extends Model
{
	/**
	 * runSqlFile
	 * @param string $file
	 * @param string $prefix
	 */
	public function runSqlFile($file, $prefix)
	{
		$sql = file_get_contents($file);
		$sql = str_ireplace("<pre>", $prefix, $sql);
		$query = $this->query($sql);
		return $query;
	}

    public function isInstalled()
    {
        $prefix = \Config::get('db.prefix');
        $sql = "SHOW TABLES LIKE '" . $prefix . "races'";
        $query = $this->query($sql);
        if($query->rowCount()>0)
            return true;
        else
            return false;
    }

    public function checkUsers()
    {
        $pre = \Config::get('db.prefix');
        $sql = "select player_id from ". $pre ."players where player_id not in (select rp.player_id FROM ". $pre . "race_players rp INNER JOIN ". $pre ."players p ON ( INSTR(rp.player_id, p.player_id ) ) ORDER BY p.player_id );";
        $query = $this->query($sql);
        $res = $query->fetchAll(\Pdo::FETCH_ASSOC);
        $racePlayer = new racePlayers($this->container);
        foreach($res as $key)
        {
            $racePlayer->create($key);
        }
    }
}