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

namespace pocketmine\nbt\tag;

use pocketmine\nbt\NBT;

#include <rules/NBT.h>

class ByteTag extends NamedTag{

	/**
	 * ByteTag constructor.
	 *
	 * @param string $name
	 * @param int    $value
	 */
	public function __construct($name = "", $value = 0){
		parent::__construct($name, $value);
	}

	public function getType(){
		return NBT::TAG_Byte;
	}

	public function read(NBT $nbt, $network = false){
		$this->value = $nbt->getSignedByte();
	}

	public function write(NBT $nbt, $network = false){
		$nbt->putByte($this->value);
	}

	/**
	 * @return int
	 */
	public function &getValue(){
		return parent::getValue();
	}
}
