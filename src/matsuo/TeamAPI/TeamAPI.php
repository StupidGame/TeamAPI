<?php
namespace matsuo\TeamAPI;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;

class TeamAPI extends PluginBase implements Listener {
  
  private static $instance = null;
  
  public static function getInstance(){
   return self::$instance;
}

  public function onLoad(){
   self::$instance = $this;
}

  private $teams = [];

  public function joinTeam(string $teamName, Player $player) {
    $playerName = $player->getName();
    $members = [];
    $members[] = $playerName;
    $this->teams[$teamName] = $members;
  }

  public function leaveTeam(string $teamName, Player $player) {
    $playerName = $player->getName();
    if(($key = array_search($playerName, $this->teams[$teamName])) !== false) {
      unset($this->teams[$teamName][$key]);
    }
  }

  public function getTeam(Player $player) {
    $name = $player->getName();
    foreach($this->teams as $teamName => $members) {
      if(in_array($name, $members)) {
        return ["team" => $teamName, "members" => $members];
      }
    }
    return false;
  }

  public function sameTeam($playerA, $playerB): bool {
    $nameA = $playerA->getName();
    $nameB = $playerB->getName();
    foreach($this->teams as $teamName => $members) {
      if(in_array($nameA, $members) && in_array($nameB, $members)) {
        return true;
      }
    }
    return false;
  }

  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }

  public function onDamage(EntityDamageByEntityEvent $event) {
    $atker = $event->getDamager();
    $hiter = $event->getEntity();
    if($atker instanceof Player && $hiter instanceof Player && $this->sameTeam($atker, $hiter)) {
      $event->setCancelled();
    }
  }

  public function onQuit(PlayerQuitEvent $event) {
    $player = $event -> getPlayer();
    $teamname = $this->getTeam($event->getName());
    $this -> leaveTeam($teamname["team"], $player->getname());
  }

  public function onChat(PlayerChatEvent $event) {
    $sender = $event->getPlayer();
    $recipients = [];
    $teamInfo = $this->getTeam($sender);
    if($teamInfo !== false) {
      foreach($event->getRecipients() as $player) {
        if(in_array($player->getName(), $teamInfo["members"])) {
          $recipients[] = $player;
        }
      }
      $event->setRecipients($recipients);//チームに所属してなかったらここはスルーされて全員に送信されちゃうから、仕様にあわせて変更して
    }
  }
}

