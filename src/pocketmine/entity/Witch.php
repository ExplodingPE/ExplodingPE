<?php
<<<<<<< HEAD
=======

/*
 *
 *  _____   _____   __   _   _   _____  __    __  _____
 * /  ___| | ____| |  \ | | | | /  ___/ \ \  / / /  ___/
 * | |     | |__   |   \| | | | | |___   \ \/ /  | |___
 * | |  _  |  __|  | |\   | | | \___  \   \  /   \___  \
 * | |_| | | |___  | | \  | | |  ___| |   / /     ___| |
 * \_____/ |_____| |_|  \_| |_| /_____/  /_/     /_____/
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author iTX Technologies
 * @link https://itxtech.org
 *
 */

>>>>>>> master
namespace pocketmine\entity;

use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\Player;

<<<<<<< HEAD
class Witch extends Monster implements ProjectileSource{
    const NETWORK_ID = 45;

    public $width = 0.938;
    public $length = 0.609;
    public $height = 2;
	
	protected $exp_min = 5;
	protected $exp_max = 5;
	protected $maxHealth = 20;

    public function initEntity(){
        parent::initEntity();
    }

 	public function getName(){
        return "Witch";
    }

	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->type = self::NETWORK_ID;
		$pk->entityRuntimeId = $this->getId();
=======
class Witch extends Monster{
	const NETWORK_ID = 45;
	
	public $dropExp = [5, 5];
	
	public function getName() : string{
		return "Witch";
	}
	
	public function initEntity(){
		$this->setMaxHealth(26);
		parent::initEntity();
	}
	
	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->eid = $this->getId();
		$pk->type = Witch::NETWORK_ID;
>>>>>>> master
		$pk->x = $this->x;
		$pk->y = $this->y;
		$pk->z = $this->z;
		$pk->speedX = $this->motionX;
		$pk->speedY = $this->motionY;
		$pk->speedZ = $this->motionZ;
		$pk->yaw = $this->yaw;
		$pk->pitch = $this->pitch;
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);
<<<<<<< HEAD

		parent::spawnTo($player);
	}

    public function getDrops(){
        $drops = []; //TODO: Drops
        return $drops;
    }
}
=======
		parent::spawnTo($player);
	}
	
	public function getDrops(){
		//TODO
		return [];
	}
}
>>>>>>> master
