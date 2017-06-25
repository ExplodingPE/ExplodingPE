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

class Enderman extends Monster{
	const NETWORK_ID = 38;

<<<<<<< HEAD
	public $height = 2.875;
	public $width = 1.094;
	public $lenght = 0.5;
	
	protected $exp_min = 5;
	protected $exp_max = 5;
	protected $maxHealth = 40;

	public function initEntity(){
		parent::initEntity();
		#for($i = 10; $i < 25; $i++){
		#	$this->setDataProperty($i, self::DATA_TYPE_BYTE, 1);
		#}
		if(!isset($this->namedtag->Angry)){
			$this->setAngry(false);
		}
	}

	public function getName(){
		return "Enderman";
	}

	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->type = self::NETWORK_ID;
		$pk->entityRuntimeId = $this->getId();
=======
	public $width = 0.3;
	public $length = 0.9;
	public $height = 1.8;

	public $dropExp = [5, 5];
	
	public function getName() : string{
		return "Enderman";
	}
	
	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->eid = $this->getId();
		$pk->type = Enderman::NETWORK_ID;
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

		parent::spawnTo($player);
	}
<<<<<<< HEAD

	/*public function getDrops(){
		return [
			ItemItem::get(ItemItem::ENDERPEARL, 0, mt_rand(0, 1))
			// holding Block
		];
	}*/
	
	public function setAngry($angry = true){
		$this->namedtag->Angry = new IntTag("Angry", $angry);
		$this->setDataProperty(18, self::DATA_TYPE_BYTE, $angry);
	}

	public function getAngry(){
		return $this->namedtag["Angry"];
	}

}
=======
}
>>>>>>> master
