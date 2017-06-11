<?php

/*
 *
 *   _____       _             _   _____  ______      ____       _        
 *  / ____|     (_)           | | |  __ \|  ____|    |  _ \     | |       
 * | (___  _ __  _  __ _  ___ | |_| |__) | |__ ______| |_) | ___| |_ __ _ 
 *  \___ \| '_ \| |/ _` |/ _ \| __|  ___/|  __|______|  _ < / _ \ __/ _` |
 *  ____) | |_) | | (_| | (_) | |_| |    | |____     | |_) |  __/ || (_| |
 * |_____/| .__/|_|\__, |\___/ \__|_|    |______|    |____/ \___|\__\__,_|
 *        | |       __/ |                                                 
 *        |_|      |___/      
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author SpigotPE-Beta Team
 * @link http://github.com/SpigotPE-Beta
 *
 *
*/

namespace pocketmine\tile;

use pocketmine\inventory\ChestInventory;
use pocketmine\inventory\DoubleChestInventory;
use pocketmine\inventory\EnderChestInventory;
use pocketmine\inventory\DoubleEnderChestInventory;
use pocketmine\inventory\InventoryHolder;
use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\Server;

class EnderChest extends Spawnable implements Nameable{

	public function __construct(Level $level, CompoundTag $nbt){
		parent::__construct($level, $nbt);
	}

	public function getName() : string{
		return $this->hasName() ? $this->namedtag->CustomName->getValue() : "Beacon";
	}

	public function hasName() : bool{
		return isset($this->namedtag->CustomName);
	}

	public function setName(string $str) {
		if ($str === "") {
			unset($this->namedtag->CustomName);
			return;
		}

		$this->namedtag->CustomName = new StringTag("CustomName", $str);
	}

	public function getSpawnCompound(){
        $c = new CompoundTag("", [
            new StringTag("id", Tile::ENDER_CHEST),
            new IntTag("x", (int) $this->x),
            new IntTag("y", (int) $this->y),
            new IntTag("z", (int) $this->z)
        ]);

		if($this->hasName()){
			$c->CustomName = $this->namedtag->CustomName;
		}

		return $c;
	}
}
