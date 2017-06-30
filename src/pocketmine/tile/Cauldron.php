<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace pocketmine\tile;

use pocketmine\level\Level;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\LongTag;
use pocketmine\nbt\tag\ShortTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\utils\Color;

class Cauldron extends Spawnable{

	public function __construct(Level $level, CompoundTag $nbt){
		if(!isset($nbt->PotionId)){
			$nbt->PotionId = new ShortTag("PotionId", -1);
		}
		if(!isset($nbt->SplashPotion)){
			$nbt->SplashPotion = new ByteTag("SplashPotion", 0);
		}
		if(!isset($nbt->PotionType)){
			$nbt->PotionType = new ShortTag("PotionType", 1);
		}
		parent::__construct($level, $nbt);
	}

	/**
	 * @return int
	 */
	public function getPotionId(){
		return $this->namedtag["PotionId"];
	}

	/**
	 * @return int
	 */
	public function getPotionType(){
		return $this->namedtag["PotionType"];
	}

	public function setPotionId($potionId){
		$this->namedtag->PotionId = new ShortTag("PotionId", $potionId);
		$this->namedtag->PotionType = new ShortTag("PotionType", -1);
	}

	public function hasPotion(){
		return $this->namedtag["PotionType"] !== -1;//TODO: fix by type and filled
	}

	/**
	 * @return bool
	 */
	public function getSplashPotion(){
		return ($this->namedtag["SplashPotion"] == true);
	}

	public function setSplashPotion($bool){
		$this->namedtag->SplashPotion = new ByteTag("SplashPotion", ($bool == true) ? 1 : 0);
	}

	/**
	 * @return null|Color
	 */
	public function getCustomColor(){
		if($this->hasCustomColor()){
			return Color::fromRGB((int) $this->namedtag["CustomColor"]);
		}
		return null;
	}

	public function hasCustomColor(){
		return isset($this->namedtag->CustomColor);
	}

	public function setCustomColor(Color $color){
		$this->namedtag->CustomColor = new IntTag("CustomColor", $color->toRGB());
		$this->namedtag->PotionType = new ShortTag("PotionType", 1);
		$this->onChanged();
	}

	public function clearCustomColor(){
		if(isset($this->namedtag->CustomColor)){
			unset($this->namedtag->CustomColor);
		}
		$this->namedtag->PotionType = new ShortTag("PotionType", -1);
		$this->onChanged();
	}

	public function getSpawnCompound(){
		$nbt = new CompoundTag("", [
			new StringTag("id", Tile::CAULDRON),
			new IntTag("x", (int) $this->x),
			new IntTag("y", (int) $this->y),
			new IntTag("z", (int) $this->z),
			new ShortTag("PotionId", (int) ($this->namedtag["PotionId"] >= (2 ** 15)?$this->namedtag["PotionId"]-=(2 ** 16):$this->namedtag["PotionId"])),
			new ShortTag("PotionType", (int) ($this->namedtag["PotionType"] >= (2 ** 15)?$this->namedtag["PotionType"]-=(2 ** 16):$this->namedtag["PotionType"])),//-1 = 65535
			new ByteTag("SplashPotion", (int) $this->namedtag["SplashPotion"]),
		]);

		if($this->hasCustomColor()){
			$nbt->CustomColor = $this->namedtag->CustomColor;
		}
		return $nbt;
	}
}