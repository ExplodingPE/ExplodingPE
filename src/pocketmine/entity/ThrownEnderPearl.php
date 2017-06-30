<?php
namespace pocketmine\entity;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityTeleportEvent;
use pocketmine\level\particle\GenericParticle;
use pocketmine\level\particle\Particle;
use pocketmine\level\sound\GenericSound;
use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\Player;

class ThrownEnderPearl extends Projectile {
	const NETWORK_ID = 87;

	public $width = 0.25;
	public $length = 0.25;
	public $height = 0.25;

	protected $gravity = 0.03;
	protected $drag = 0.01;

	public function onUpdate($currentTick) {
		if ($this->closed) {
			return false;
		}

		$this->timings->startTiming();

		$hasUpdate = parent::onUpdate($currentTick);

		if ($this->isCollided && $this->getOwningEntity() !== null && $this->getOwningEntity() instanceof Player) {
			$this->getLevel()->getServer()->getPluginManager()->callEvent($ev = new EntityTeleportEvent($this->getOwningEntity(), $this->getOwningEntity()->getPosition(), $this->getPosition()));
			if (!$ev->isCancelled()) {
				$this->getLevel()->getServer()->getPluginManager()->callEvent($dev = new EntityDamageEvent($this->getOwningEntity(), EntityDamageEvent::CAUSE_FALL, 5));
				if (!$dev->isCancelled()) {
					$this->getOwningEntity()->attack($dev->getFinalDamage(), $dev);
				}
				$this->getOwningEntity()->teleport($ev->getTo(), $this->getOwningEntity()->getYaw(), $this->getOwningEntity()->getPitch());
				$this->getLevel()->addSound(new GenericSound($ev->getFrom(), LevelEventPacket::EVENT_SOUND_ENDERMAN_TELEPORT));
				$this->getLevel()->addSound(new GenericSound($ev->getTo(), LevelEventPacket::EVENT_SOUND_ENDERMAN_TELEPORT));
				$this->getLevel()->addParticle(new GenericParticle($ev->getFrom(), Particle::TYPE_PORTAL));
				$this->getLevel()->addParticle(new GenericParticle($ev->getTo(), Particle::TYPE_PORTAL));
			}
		}
		if ($this->age > 1200 || $this->isCollided) {
			$this->close();
			$hasUpdate = true;
		}

		$this->timings->stopTiming();

		return $hasUpdate;
	}

	public function spawnTo(Player $player) {
		$pk = new AddEntityPacket();
		$pk->type = self::NETWORK_ID;
		$pk->entityRuntimeId = $this->getId();
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