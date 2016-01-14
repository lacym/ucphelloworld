<?php
/**
 * This is the User Control Panel Object.
 *
 * Copyright (C) 2016 Sangoma Communications
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package   FreePBX UCP BMO
 * @author   James Finstrom <jfinstrom@sangoma.com>
 * @license   AGPL v3
 */
namespace UCP\Modules;
use \UCP\Modules as Modules;

class Ucphelloworld extends Modules{
	protected $module = 'Ucphelloworld';

	function __construct($Modules) {
		$this->Modules = $Modules;
		$this->enabled = $this->UCP->getCombinedSettingByID($user['id'],$this->module,'enabled');
	}
	function getDisplay() {
		return '<h1>Hello World</h1>';
	}
  public function getSettingsDisplay($ext) {
    $out = array(
      array(
        "title" => _('Hello UCP'),
        "content" => $this->load_view(__DIR__.'/views/settings.php',array('enabled' => true)),
        "size" => 6
      )
    );
    return $out;
  }
	//Left Menu
	public function getMenuItems() {
		$menu = array();
		$menu = array(
			"rawname" => "ucphelloworld",
			"name" => _("Hello World"),
			"badge" => true
		);
		return $menu;
	}
	//top bar
	public function getNavItems() {
		$out[] = array(
			"rawname" => "ucphelloworld",
			"badge" => true,
			"icon" => "fa-hand-spock-o",
			"menu" => array(
				"html" => '<li><a class="hello">'._("HELLO").'</a></li><li><hr></li><li><a class="world">'._("WORLD").'</a></li><li><hr></li>'
			)
		);
		return $out;
	}
	public function poll(){
		$count = mt_rand(1,42);
		return array("status" => true, "total" => $count);
	}
	public function getHomeWidgets() {
		$out[] = array(
			"id" => 'hello',
			"title" => 'Hello World',
			"content" => '<h3>Hello World</h3>',
			"size" => '33.33%'
		);
		return $out;
	}
  public function ajaxRequest($command,$settings){
    switch($command) {
      case 'hello':
        return true;
      default:
        return false;
      break;
    }
  }
  public function ajaxHandler(){
    switch($_REQUEST['command']){
      case 'hello':
        return array("status" => true, "alert" => "success", "message" => _('HELLO UCP'));
      break;
      default:
        return array("status" => false, "message" => "");
      break;
    }
  }

}
