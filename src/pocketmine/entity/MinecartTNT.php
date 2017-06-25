<?php

<<<<<<< HEAD
namespace pocketmine\entity;

use pocketmine\item\Item as ItemItem;
use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\Player;

class MinecartTNT extends Snake{
	const NETWORK_ID = 97;
	public $height = 0.9;
	public $width = 1.1;
	protected $maxHealth = 4;
	public $drag = 0.1;
	public $gravity = 0.5;
	public $isMoving = false;
	public $moveSpeed = 0.4;
	public $isFreeMoving = false;
	public $isLinked = false;

	public function initEntity(){
		parent::initEntity();
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
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author iTX Technologies
 * @link https://itxtech.org
 *
 */

namespace pocketmine\entity;

use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\Player;

class MinecartTNT extends Minecart{
	const NETWORK_ID = 97;

	public function getName() : string{
		return "Minecart TNT";
	}

	public function getType() : int{
		return self::TYPE_TNT;
>>>>>>> master
	}

	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
<<<<<<< HEAD
		$pk->type = self::NETWORK_ID;
		$pk->entityRuntimeId = $this->getId();
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

	public function getName(){
		return "Minecart TNT";
	}

	public function getDrops(){
		return [ItemItem::get(ItemItem::MINECART, 0, 1),ItemItem::get(ItemItem::TNT, 0, 1)];
	}
}
=======
		$pk->eid = $this->getId();
		$pk->type = MinecartTNT::NETWORK_ID;
		$pk->x = $this->x;
		$pk->y = $this->y;
		$pk->z = $this->z;
		$pk->speedX = 0;
		$pk->speedY = 0;
		$pk->speedZ = 0;
		$pk->yaw = 0;
		$pk->pitch = 0;
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);

		Entity::spawnTo($player);
	}
}
>>>>>>> master
