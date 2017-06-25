<?php
<<<<<<< HEAD
namespace pocketmine\entity;

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

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\item\enchantment\Enchantment;
>>>>>>> master
use pocketmine\item\Item as ItemItem;
use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\Player;

class Blaze extends Monster{
	const NETWORK_ID = 43;

<<<<<<< HEAD
	public $height = 1.5;
	public $width = 1.25;
	public $lenght = 0.906;
	
	protected $exp_min = 10;
	protected $exp_max = 10;
	protected $maxHealth = 20;

	public function initEntity(){
		parent::initEntity();
	}

	public function getName(){
		return "Blaze";
 	}

	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->type = self::NETWORK_ID;
		$pk->entityRuntimeId = $this->getId();
=======
	public $width = 0.3;
	public $length = 0.9;
	public $height = 1.8;

	public $dropExp = [10, 10];
	
	public function getName() : string{
		return "Blaze";
	}
	
	public function spawnTo(Player $player){
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
<<<<<<< HEAD

=======
>>>>>>> master
		parent::spawnTo($player);
	}

	public function getDrops(){
<<<<<<< HEAD
		return [
			ItemItem::get(ItemItem::BLAZE_ROD, 0, mt_rand(0, 1))
		];
=======
		$cause = $this->lastDamageCause;
		//Only drop when kill by player or dog(No add now.)
		if($cause instanceof EntityDamageByEntityEvent and $cause->getDamager() instanceof Player){
			$lootingL = $cause->getDamager()->getItemInHand()->getEnchantmentLevel(Enchantment::TYPE_WEAPON_LOOTING);
			$drops = array(ItemItem::get(ItemItem::BLAZE_ROD, 0, mt_rand(0, 1 + $lootingL)));
			return $drops;
		}
		return [];
>>>>>>> master
	}
}