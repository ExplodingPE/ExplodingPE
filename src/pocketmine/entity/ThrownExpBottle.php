<?php
<<<<<<< HEAD
namespace pocketmine\entity;

use pocketmine\level\Level;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\ShortTag;
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

use pocketmine\level\Level;
use pocketmine\level\particle\SpellParticle;
use pocketmine\nbt\tag\CompoundTag;
>>>>>>> master
use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\Player;

class ThrownExpBottle extends Projectile{
	const NETWORK_ID = 68;

	public $width = 0.25;
	public $length = 0.25;
	public $height = 0.25;
<<<<<<< HEAD
	
	protected $gravity = 0.1;
	protected $drag = 0.05;
=======

	protected $gravity = 0.1;
	protected $drag = 0.15;

	private $hasSplashed = false;
>>>>>>> master

	public function __construct(Level $level, CompoundTag $nbt, Entity $shootingEntity = null){
		parent::__construct($level, $nbt, $shootingEntity);
	}

<<<<<<< HEAD
	public function getName(){
		return "Thrown Exp Bottle";
=======
	public function splash(){
		if(!$this->hasSplashed){
			$this->hasSplashed = true;
			$this->getLevel()->addParticle(new SpellParticle($this, 46, 82, 153));
			if($this->getLevel()->getServer()->expEnabled){
				$this->getLevel()->spawnXPOrb($this->add(0, -0.2, 0), mt_rand(1, 4));
				$this->getLevel()->spawnXPOrb($this->add(-0.1, -0.2, 0), mt_rand(1, 4));
				$this->getLevel()->spawnXPOrb($this->add(0, -0.2, -0.1), mt_rand(1, 4));
			}

			$this->kill();
		}
>>>>>>> master
	}

	public function onUpdate($currentTick){
		if($this->closed){
			return false;
		}

		$this->timings->startTiming();

		$hasUpdate = parent::onUpdate($currentTick);

<<<<<<< HEAD
		if($this->age > 1200 or $this->isCollided){
			$this->kill();
			$this->close();
			$hasUpdate = true;
		}
		
		if($this->onGround){
			$this->kill();
			$this->close();
			$nbt = new CompoundTag("", [
				new ListTag("Pos", [
					new DoubleTag("", $this->getX()),
					new DoubleTag("", $this->getY() + 1),
					new DoubleTag("", $this->getZ())
				]),
				new ListTag("Motion", [
					new DoubleTag("", 0),
					new DoubleTag("", 0),
					new DoubleTag("", 0)
				]),
				new ListTag("Rotation", [
					new FloatTag("", lcg_value() * 360),
					new FloatTag("", 0)
				]),
				new ShortTag("Experience", mt_rand(3,11)),
			]);
			$exp = Entity::createEntity(ExperienceOrb::NETWORK_ID, $this->getLevel(), $nbt);
			$this->getLevel()->addEntity($exp);
		}
=======
		$this->age++;

		if($this->age > 1200 or $this->isCollided){
			$this->splash();
			$hasUpdate = true;
		}
>>>>>>> master

		$this->timings->stopTiming();

		return $hasUpdate;
	}

	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
<<<<<<< HEAD
		$pk->type = self::NETWORK_ID;
		$pk->entityRuntimeId = $this->getId();
=======
		$pk->type = ThrownExpBottle::NETWORK_ID;
		$pk->eid = $this->getId();
>>>>>>> master
		$pk->x = $this->x;
		$pk->y = $this->y;
		$pk->z = $this->z;
		$pk->speedX = $this->motionX;
		$pk->speedY = $this->motionY;
		$pk->speedZ = $this->motionZ;
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);

		parent::spawnTo($player);
	}
}