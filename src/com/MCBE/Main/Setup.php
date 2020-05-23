<?php
declare(strict_types=1);
namespace com\MCBE\Main;

/**************************************************************************************
the code is working however it is messy,don't worry it wll be clean in the full version - STILL ALPHA1!
**************************************************************************************/

//pmmp libs!
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\utils\TextFormat as C;
use pocketmine\utils\Config;
use pocketmine\lang\TranslationContainer;
use ZipArchive;


class Setup extends PluginBase implements Listener {

    public function IsFolderExist($folder)
      {
        $path = realpath($folder);
        return ($path !== false AND is_dir($path)) ? $path : false;
      }

    public function onEnable(): void
      {
         $this->getServer()->getPluginManager()->registerEvents($this, $this);
         $this->getServer()->getLogger()->info("Enabled By 7Wdev \nPMMP-JS loading js scripts ...");

         //setup the Scripts dir!
         $server_path = $this->getServer()->getDataPath();
         $js_stations = "/Scripts";
         $fucking_extra_var = $server_path . $js_stations;
         if(!$this->IsFolderExist($fucking_extra_var))
          {
            mkdir($server_path . $js_stations, 0700);
            $this->getServer()->getLogger()->info("Creating Scripts folder...");
          } else
              {
                $this->getServer()->getLogger()->info("Scripts folder already created!");
              }
      }
}
