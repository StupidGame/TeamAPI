<?php

namespace matsuo\TeamAPI;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerChatEvent;

class main extends PluginBase implements Listener{

 

  public function jointeam($teamname, $player){  
    $playername = $player->getname();
    ${$teamname} = [];
    $$teamname = "$playername";
    $teams = [];
    $teams = "${$teamname}";
  }
  public function leaveteam($teamname, $player){
    $playername = $player->getname();
    foreach($$teamname as $value){
      if(($key = array_search($playername, $$teamname)) !== false) {
        unset($$teamname[$key]);
    } 
    }
    unset($key);
  }
  
  
  public function onDamage(EntityDamageByEntityEvent $eventa)
  {
    $atker = $eventa->getDamager();
    $hiter = $eventa->getEntity();
    if($atker instanceof Player && $hiter instanceof Player) {
      foreach($teams as $team) {
        if (in_array([$atker->getName(),$hiter->getName()],$team) {
          $event->setCancelled();
        }
      }
    }
  }

public function onchat(PlayerChatEvent $eventb){
  $recipients = [];
  /** @var PlayerChatEvent $event */
  foreach($eventb->getRecipients() as $recipient){
    if(!$recipient instanceof Player) continue;
    if(/** code... */){ //チャットの送信者と同じチームか確認
      $recipients[] = $recipient;
    }
  }
  $event->setRecipients($recipients);
  
}
  
  
}


?>  
