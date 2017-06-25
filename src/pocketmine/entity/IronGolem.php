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
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author iTX Technologies
 * @link https://itxtech.org
 *
 */

>>>>>>> master
namespace pocketmine\entity;

use pocketmine\item\Item as ItemItem;
use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\Player;

class IronGolem extends Animal{
<<<<<<< HEAD
    const NETWORK_ID = 20;

    public $height = 2.688;
    public $width = 1.625;
    public $lenght = 0.906;
	protected $maxHealth = 100;

    public function initEntity(){
        parent::initEntity();
    }

    public function getName(){
        return "Iron Golem";
    }

	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->type = self::NETWORK_ID;
		$pk->entityRuntimeId = $this->getId();
=======
	const NETWORK_ID = 20;

	public $width = 0.3;
	public $length = 0.9;
	public $height = 2.8;
	
	public function initEntity(){
		$this->setMaxHealth(100);
		parent::initEntity();
	}
	
	public function getName() {
		return "Iron Golem";
	}
	
	public function spawnTo(Player $player) {
		$pk = new AddEntityPacket();
		$pk->eid = $this->getId();
		$pk->type = self::NETWORK_ID;
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
    public function getDrops(){
        return [
            ItemItem::get(ItemItem::IRON_INGOT, 0, mt_rand(3, 5)),
            ItemItem::get(ItemItem::POPPY, 0, mt_rand(0, 2))
        ];
    }

	public function isLeashableType(){
		return false;
=======
	public function getDrops(){
		//Not affected by Looting.
		$drops = array(ItemItem::get(ItemItem::IRON_INGOT, 0, mt_rand(3, 5)));
		$drops[] = ItemItem::get(ItemItem::POPPY, 0, mt_rand(0, 2));
		return $drops;
>>>>>>> master
	}
}