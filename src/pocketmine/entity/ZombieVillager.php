<?php
<<<<<<< HEAD
namespace pocketmine\entity;

use pocketmine\nbt\tag\IntTag;
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

namespace pocketmine\entity;

>>>>>>> master
use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\Player;

class ZombieVillager extends Zombie{
	const NETWORK_ID = 44;
<<<<<<< HEAD
	
	public $width = 1.031;
	public $length = 0.891;
	public $height = 2.125;
	protected $maxHealth = 20;

	public function initEntity(){
		parent::initEntity();
		if(!isset($this->namedtag->Profession) || $this->getVariant() > 4){
			$this->setVariant(mt_rand(0, 4));
		}
		$this->setDataProperty(16, self::DATA_TYPE_BYTE, $this->getVariant());
	}

	public function getName(){
=======

	public $width = 1.031;
	public $length = 0.891;
	public $height = 2.125;

	public function initEntity(){
		$this->setMaxHealth(20);
		parent::initEntity();
	}

	public function getName() : string{
>>>>>>> master
		return "Zombie Villager";
	}

	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
<<<<<<< HEAD
		$pk->type = self::NETWORK_ID;
		$pk->entityRuntimeId = $this->getId();
=======
		$pk->type = ZombieVillager::NETWORK_ID;
		$pk->eid = $this->getId();
>>>>>>> master
		$pk->x = $this->x;
		$pk->y = $this->y;
		$pk->z = $this->z;
		$pk->speedX = $this->motionX;
		$pk->speedY = $this->motionY;
		$pk->speedZ = $this->motionZ;
<<<<<<< HEAD
		$pk->yaw = $this->yaw;
		$pk->pitch = $this->pitch;
=======
>>>>>>> master
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);

		parent::spawnTo($player);
	}
<<<<<<< HEAD
	

	/**
	 * Sets the Zombie Villager's profession
	 *
	 * @param $type
	 */
	public function setVariant($type){
		$this->namedtag->Profession = new IntTag("Profession", $type);
		$this->setDataProperty(16, self::DATA_TYPE_BYTE, $type);
	}

	public function getVariant(){
		return $this->namedtag["Profession"];
	}

}
=======
}
>>>>>>> master
