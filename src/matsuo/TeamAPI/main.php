<?php
namespace matsuo\TeamAPI

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerChatEvent;

class main extends PluginBase implements Listener{

 

  public function jointeam($teamname, $player){
    $playername = $player->getname()
    $$teamname = [];
    $$teamname = "$playername"
    $teams = [];
    $teams = "$$teamname"
  }
  public function jointeam($player){ 
  
  }
  
  
  
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

  $recipients = [];
/** @var PlayerChatEvent $event */
foreach($event->getRecipients() as $recipient){
  if(!$recipient instanceof Player) continue;
  if(/** code... */){ //チャットの送信者と同じチームか確認
    $recipients[] = $recipient;
  }
}
$event->setRecipients($recipients);
}

?>