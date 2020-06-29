<?php
declare(strict_types=1);
namespace com\MCBE\Commands;

/**************************************************************************************
the code is working however it is messy,don't worry it wll be clean in the full version - STILL ALPHA1!
also i wanna give credits for: https://github.com/sstur/js2php
**************************************************************************************/

//pmmp libs!
use pocketmine\plugin\Plugin;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\{Command, CommandSender, defaults\VanillaCommand};
use pocketmine\command\CommandMap;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\utils\TextFormat as C;
use pocketmine\lang\TranslationContainer;
use ZipArchive;

//needed functions!
use function is_file;
use function strlen;
use function substr;

//mine libs!
use com\MCBE\Main\Setup;
use com\MCBE\php\classes\Array;
use com\MCBE\php\classes\Boolean;
use com\MCBE\php\classes\Buffer;
use com\MCBE\php\classes\Date;
use com\MCBE\php\classes\Error;
use com\MCBE\php\classes\Exception;
use com\MCBE\php\classes\Function;
use com\MCBE\php\classes\Global;
use com\MCBE\php\classes\Number;
use com\MCBE\php\classes\Object;
use com\MCBE\php\classes\RegExp;
use com\MCBE\php\classes\String;

class ScriptsCommand {

    private $command;

    private $plugin;

    public function __construct(Setup $plugin)
      {
        $this->command = $plugin;
        $this->plugin = $plugin;
      }

    /////////////////////////////////////////////////////
    /*this method can be used in addons of this project...*/
    public function canLoadScript(string $path) : bool
      {
        $ext =".js";
        return is_file($path) and substr($path, -strlen($ext)) === $ext;
      }
    /////////////////////////////////////////////////////

    public function countScripts() : int
      {
        $dir = $this->plugin->getServer()->getDataPath() . "/Scripts/*.js";
        $x = glob($dir);
        return count($x);
      }

    public function onCommand(CommandSender $sender, Command $cmd, array $args) : bool
      {
        switch($cmd->getName())
          {
            case "scripts":
            $LoadedScripts = $this->countScripts();
            $sender->sendMessage(C::GREEN . 'The number of the loaded js scripts is : (' . $LoadedScripts . ')');
          }
        return true;
      }
}
