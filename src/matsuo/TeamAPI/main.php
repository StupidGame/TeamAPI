<?php
namespace matsuo\TeamAPI

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\EntityDamageByEntityEvent;

$red = ["player1","player2","player3"];
$green = ["player4","player5","player6"];
$yellow = ["player4","player5","player6"];

$teams = [$red,$green,$yellow];

public function onDamage(EntityDamageByEntityEvent $event)
{
  $atker = $event->getDamager();
  $hiter = $event->getEntity();
  if($atker instanceof Player && $hiter instanceof Player) {
    foreach($teams as $team) {
      if (in_array([$atker->getName(),$hiter->getName()],$team) {
        $event->setCancelled();
      }
    }
  }
}
?>