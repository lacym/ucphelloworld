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
//Namespace needs to always be this
namespace UCP\Modules;
//Use UCP\Modules as Modules for simplicity
use \UCP\Modules as Modules;
//Module class should always extend Modules
class Ucphelloworld extends Modules {
	//Always declare the module name here
	protected $module = 'Ucphelloworld';

	public function __construct($Modules) {
		//User information. Returned as an array. See:
		$this->user = $this->UCP->User->getUser();
		//Access any FreePBX enabled module or BMO object
		$core = $this->UCP->FreePBX->Core;
		//Access any UCP Function.
		$ucp = $this->UCP;
		//Access any UCP module
		$modules = $this->Modules = $Modules;
		//Asterisk Manager. See: https://wiki.freepbx.org/display/FOP/Asterisk+Manager+Class
		$this->astman = $this->UCP->FreePBX->astman;
		//Setting retrieved from the UCP Interface in User Manager in Admin
		$this->enabled = $this->UCP->getCombinedSettingByID($this->user['id'],$this->module,'enabled');
	}

	/**
	* Get Simple Widget List
	* @method getSimpleWidgetList
	* @link https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-getSimpleWidgetList
	* @return array               Array of information
	*/
	public function getSimpleWidgetList() {
		//Category for the widgets
		$widget = array(
			"rawname" => "ucphelloworld", //Module Rawname
			"display" => _("Hello World!"), //The Widget Main Title
			"icon" => "fa fa-globe", //The Widget Icon from http://fontawesome.io/icons/
			"list" => array() //List of Widgets this module provides
		);
		//Individual Widgets
		$widget['list']["willy"] = array(
			"display" => _("Willy the Widget"), //Widget Subtitle
			"description" => _("Willy dreamed of being a widget all of his life"), //Widget description
			"hasSettings" => true, //Set to true if this widget has settings. This will make the cog (gear) icon display on the widget display
			"icon" => "fa fa-male", //If set the widget in on the side bar will use this icon instead of the category icon,
			"dynamic" => true //If set to true then this widget can be added multiple times, if false then this widget can only be added once per dashboard!
		);
		$widget['list']["whilma"] = array(
			"display" => _("Whilma  the Widget"), //Widget Subtitle
			"description" => _("Whilma dreamed of being a widget all of her life"), //Widget description
			"hasSettings" => true, //Set to true if this widget has settings. This will make the cog (gear) icon display on the widget display
			"icon" => "fa fa-female", //If set the widget in on the side bar will use this icon instead of the category icon,
			"dynamic" => true //If set to true then this widget can be added multiple times, if false then this widget can only be added once per dashboard!
		);
		return $widget;
	}


	/**
	* Get Widget List
	* @method getWidgetList
	* @link https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-getWidgetList
	* @return array               Array of information
	*/
	public function getWidgetList() {
		$widget = array(
			"rawname" => "ucphelloworld", //Module Rawname
			"display" => _("Hello World!"), //The Widget Main Title
			"icon" => "fa fa-globe", //The Widget Icon from http://fontawesome.io/icons/
			"list" => array() //List of Widgets this module provides
		);
		//Individual Widgets
		$widget['list']["willy"] = array(
			"display" => _("Willy the Widget"), //Widget Subtitle
			"description" => _("Willy dreamed of being a widget all of his life"), //Widget description
			"hasSettings" => true, //Set to true if this widget has settings. This will make the cog (gear) icon display on the widget display
			"icon" => "fa fa-male", //If set the widget in on the side bar will use this icon instead of the category icon,
			"dynamic" => true, //If set to true then this widget can be added multiple times, if false then this widget can only be added once per dashboard!,
			"defaultsize" => array("height" => 3, "width" => 3), //The default size of the widget when placed in the dashboard
			"minsize" => array("height" => 2, "width" => 2), //The minimum size a widget can be when resized on the dashboard
			"maxsize" => array("height" => 4, "width" => 4), //The max size a widget can be when resized on the dashboard
			"noresize" => false //If set to true the widget will not be allowed to be resized
		);
		//Individual Widgets
		$widget['list']["whilma"] = array(
			"display" => _("Whilma the Widget"), //Widget Subtitle
			"description" => _("Whilma dreamed of being a widget all of her life"), //Widget description
			"hasSettings" => true, //Set to true if this widget has settings. This will make the cog (gear) icon display on the widget display
			"icon" => "fa fa-female", //If set the widget in on the side bar will use this icon instead of the category icon,
			"dynamic" => true, //If set to true then this widget can be added multiple times, if false then this widget can only be added once per dashboard!,
			"defaultsize" => array("height" => 3, "width" => 3), //The default size of the widget when placed in the dashboard
			"minsize" => array("height" => 2, "width" => 2), //The minimum size a widget can be when resized on the dashboard
			"maxsize" => array("height" => 4, "width" => 4), //The max size a widget can be when resized on the dashboard
			"noresize" => false //If set to true the widget will not be allowed to be resized
		);
		//Individual Widgets
		$widget['list']["table"] = array(
			"display" => _("Bootstrap Table"), //Widget Subtitle
			"description" => _("Bootstrap Table Example"), //Widget description
			"hasSettings" => true, //Set to true if this widget has settings. This will make the cog (gear) icon display on the widget display
			"icon" => "fa fa-table", //If set the widget in on the side bar will use this icon instead of the category icon,
			"dynamic" => true, //If set to true then this widget can be added multiple times, if false then this widget can only be added once per dashboard!,
			"defaultsize" => array("height" => 3, "width" => 3), //The default size of the widget when placed in the dashboard
			"minsize" => array("height" => 2, "width" => 2), //The minimum size a widget can be when resized on the dashboard
			"maxsize" => array("height" => 4, "width" => 4), //The max size a widget can be when resized on the dashboard
			"noresize" => false //If set to true the widget will not be allowed to be resized
		);
		//Individual Widgets
		$widget['list']["toggle"] = array(
			"display" => _("Bootstrap Toggle"), //Widget Subtitle
			"description" => _("Boostrap Toggle Example"), //Widget description
			"hasSettings" => true, //Set to true if this widget has settings. This will make the cog (gear) icon display on the widget display
			"icon" => "fa fa-toggle-on", //If set the widget in on the side bar will use this icon instead of the category icon,
			"dynamic" => true, //If set to true then this widget can be added multiple times, if false then this widget can only be added once per dashboard!,
			"defaultsize" => array("height" => 3, "width" => 3), //The default size of the widget when placed in the dashboard
			"minsize" => array("height" => 2, "width" => 2), //The minimum size a widget can be when resized on the dashboard
			"maxsize" => array("height" => 4, "width" => 4), //The max size a widget can be when resized on the dashboard
			"noresize" => false //If set to true the widget will not be allowed to be resized
		);
		//Individual Widgets
		$widget['list']["select"] = array(
			"display" => _("Bootstrap Select"), //Widget Subtitle
			"description" => _("Bootstrap Select Example"), //Widget description
			"hasSettings" => true, //Set to true if this widget has settings. This will make the cog (gear) icon display on the widget display
			"icon" => "fa fa-crosshairs", //If set the widget in on the side bar will use this icon instead of the category icon,
			"dynamic" => true, //If set to true then this widget can be added multiple times, if false then this widget can only be added once per dashboard!,
			"defaultsize" => array("height" => 3, "width" => 3), //The default size of the widget when placed in the dashboard
			"minsize" => array("height" => 2, "width" => 2), //The minimum size a widget can be when resized on the dashboard
			"maxsize" => array("height" => 4, "width" => 4), //The max size a widget can be when resized on the dashboard
			"noresize" => false //If set to true the widget will not be allowed to be resized
		);
		return $widget;
	}


	/**
	* Get Simple Widget Display
	* @method getWidgetDisplay
	* @link https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-getSimpleWidgetDisplay
	* @param  string           $id The widget id. This is the key of the 'list' array in getSimpleWidgetList
	* @param  string           $uuid The generated UUID of the widget on this dashboard
	* @return array               Array of information
	*/
	public function getSimpleWidgetDisplay($id,$uuid) {
		$widget = array();
		switch($id) {
			case "whilma":
				$displayvars = array(
					"name" => "Whilma",
					"timezone" => $this->UCP->View->getTimezone(),
					"locale" => $this->UCP->View->getLocale(),
					"date" => $this->UCP->View->getDate(time()),
					"time" => $this->UCP->View->getTime(time()),
					"datetime" => $this->UCP->View->getDateTime(time())
				);
				$widget = array(
					'title' => _("Follow Me"),
					'html' => $this->load_view(__DIR__.'/views/whilma.php',$displayvars)
				);
			break;
			case "willy":
				$displayvars = array(
					"name" => "Whilly",
					"timezone" => $this->UCP->View->getTimezone(),
					"locale" => $this->UCP->View->getLocale(),
					"date" => $this->UCP->View->getDate(time()),
					"time" => $this->UCP->View->getTime(time()),
					"datetime" => $this->UCP->View->getDateTime(time())
				);
				$widget = array(
					'title' => _("Follow Me"),
					'html' => $this->load_view(__DIR__.'/views/willy.php',$displayvars)
				);
			break;
		}
		return $widget;
	}

	/**
	* Get Widget Display
	* @method getWidgetDisplay
	* @link https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-getSimpleWidgetDisplay
	* @param  string           $id The widget id. This is the key of the 'list' array in getWidgetList
	* @param  string           $uuid The UUID of the widget
	* @return array               Array of information
	*/
	public function getWidgetDisplay($id, $uuid) {
		$widget = array();
		switch($id) {
			case "whilma":
				$displayvars = array(
					"name" => "Whilma",
					"timezone" => $this->UCP->View->getTimezone(),
					"locale" => $this->UCP->View->getLocale(),
					"date" => $this->UCP->View->getDate(time()),
					"time" => $this->UCP->View->getTime(time()),
					"datetime" => $this->UCP->View->getDateTime(time())
				);
				$widget = array(
					'title' => _("Follow Me"),
					'html' => $this->load_view(__DIR__.'/views/whilma.php',$displayvars)
				);
			break;
			case "willy":
				$displayvars = array(
					"name" => "Whilly",
					"timezone" => $this->UCP->View->getTimezone(),
					"locale" => $this->UCP->View->getLocale(),
					"date" => $this->UCP->View->getDate(time()),
					"time" => $this->UCP->View->getTime(time()),
					"datetime" => $this->UCP->View->getDateTime(time())
				);
				$widget = array(
					'title' => _("Follow Me"),
					'html' => $this->load_view(__DIR__.'/views/willy.php',$displayvars)
				);
			break;
			case "table":
				$displayvars = array();
				$widget = array(
					'title' => _("Table"),
					'html' => $this->load_view(__DIR__.'/views/table.php',$displayvars)
				);
			break;
			case "toggle":
				$displayvars = array();
				$widget = array(
					'title' => _("Toggle"),
					'html' => $this->load_view(__DIR__.'/views/toggle.php',$displayvars)
				);
			break;
			case "select":
				$displayvars = array();
				$widget = array(
					'title' => _("Select"),
					'html' => $this->load_view(__DIR__.'/views/select.php',$displayvars)
				);
			break;
		}
		return $widget;
	}

	/**
	* Get Widget Settings Display
	* @method getWidgetDisplay
	* @link https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-getWidgetSettingsDisplay
	* @param  string           $id The widget id. This is the key of the 'list' array in getWidgetList
	* @param  string           $uuid The UUID of the widget
	* @return array               Array of information
	*/
	public function getWidgetSettingsDisplay($id, $uuid) {
		$displayvars = array();
		$widget = array();
		switch($id) {
			case "whilma":
				$displayvars = array(
					"name" => "Whilma",
					"timezone" => $this->UCP->View->getTimezone(),
					"locale" => $this->UCP->View->getLocale(),
					"date" => $this->UCP->View->getDate(time()),
					"time" => $this->UCP->View->getTime(time()),
					"datetime" => $this->UCP->View->getDateTime(time())
				);
				$widget = array(
					'title' => _("Follow Me"),
					'html' => $this->load_view(__DIR__.'/views/whilma.php',$displayvars)
				);
			break;
			case "willy":
				$displayvars = array(
					"name" => "Whilly",
					"timezone" => $this->UCP->View->getTimezone(),
					"locale" => $this->UCP->View->getLocale(),
					"date" => $this->UCP->View->getDate(time()),
					"time" => $this->UCP->View->getTime(time()),
					"datetime" => $this->UCP->View->getDateTime(time())
				);
				$widget = array(
					'title' => _("Follow Me"),
					'html' => $this->load_view(__DIR__.'/views/willy.php',$displayvars)
				);
			break;
			case "table":
				$displayvars = array();
				$widget = array(
					'title' => _("Table"),
					'html' => $this->load_view(__DIR__.'/views/table.php',$displayvars)
				);
			break;
			case "toggle":
				$displayvars = array();
				$widget = array(
					'title' => _("Toggle"),
					'html' => $this->load_view(__DIR__.'/views/toggle.php',$displayvars)
				);
			break;
			case "select":
				$displayvars = array();
				$widget = array(
					'title' => _("Select"),
					'html' => $this->load_view(__DIR__.'/views/select.php',$displayvars)
				);
			break;
		}
		return $widget;
	}

	/**
	* Get Simple Widget Settings Display
	* @method getSimpleWidgetDisplay
	* @link https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-getSimpleWidgetSettingsDisplay
	* @param  string           $id The widget id. This is the key of the 'list' array in getWidgetList
	* @param  string           $uuid The UUID of the widget
	* @return array               Array of information
	*/
	public function getSimpleWidgetSettingsDisplay($id, $uuid) {
		$displayvars = array();
		$widget = array();
		switch($id) {
			case "whilma":
				$displayvars = array(
					"name" => "Whilma",
					"timezone" => $this->UCP->View->getTimezone(),
					"locale" => $this->UCP->View->getLocale(),
					"date" => $this->UCP->View->getDate(time()),
					"time" => $this->UCP->View->getTime(time()),
					"datetime" => $this->UCP->View->getDateTime(time())
				);
				$widget = array(
					'title' => _("Follow Me"),
					'html' => $this->load_view(__DIR__.'/views/whilma.php',$displayvars)
				);
			break;
			case "willy":
				$displayvars = array(
					"name" => "Whilly",
					"timezone" => $this->UCP->View->getTimezone(),
					"locale" => $this->UCP->View->getLocale(),
					"date" => $this->UCP->View->getDate(time()),
					"time" => $this->UCP->View->getTime(time()),
					"datetime" => $this->UCP->View->getDateTime(time())
				);
				$widget = array(
					'title' => _("Follow Me"),
					'html' => $this->load_view(__DIR__.'/views/willy.php',$displayvars)
				);
			break;
			case "table":
				$displayvars = array();
				$widget = array(
					'title' => _("Table"),
					'html' => $this->load_view(__DIR__.'/views/table.php',$displayvars)
				);
			break;
			case "toggle":
				$displayvars = array();
				$widget = array(
					'title' => _("Toggle"),
					'html' => $this->load_view(__DIR__.'/views/toggle.php',$displayvars)
				);
			break;
			case "select":
				$displayvars = array();
				$widget = array(
					'title' => _("Select"),
					'html' => $this->load_view(__DIR__.'/views/select.php',$displayvars)
				);
			break;
		}
		return $widget;
	}

	/**
	* Display a Tab in the user settings modal
	* @method getUserSettingsDisplay
	* @link https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-getUserSettingsDisplay
	* @return array               Array of information
	*/
	function getUserSettingsDisplay() {
		$displayvars = array(
			"timezone" => $this->UCP->View->getTimezone(),
			"locale" => $this->UCP->View->getLocale(),
			"date" => $this->UCP->View->getDate(time()),
			"time" => $this->UCP->View->getTime(time()),
			"datetime" => $this->UCP->View->getDateTime(time())
		);
		return array(
			array(
				"rawname" => "ucphelloworld", // Module rawname
				"name" => _("Hello World Settings"), //The Tab's Title
				'html' => $this->load_view(__DIR__.'/views/user_settings.php',$displayvars)
			)
		);
	}


	/**
	 * Poll for information
	 * @method poll
	 * @link https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-poll(PHP)
	 * @param $data               Data from Javascript prepoll function (if any). See: https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-prepoll
	 * @return mixed              Data you'd like to send back to the javascript for this module. See: https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-poll(Javascript)
	 */
	public function poll($data){
		$count = mt_rand(1,42);
		return array("status" => true, "total" => $count);
	}


	/**
	 * Ajax Request
	 * @method ajaxRequest
	 * @link https://wiki.freepbx.org/display/FOP/BMO+Ajax+Calls#BMOAjaxCalls-ajaxRequest
	 * @param  string      $command  The command name
	 * @param  array      $settings Returned array settings
	 * @return boolean                True if allowed or false if not allowed
	 */
	public function ajaxRequest($command,$settings){
		switch($command) {
			case 'hello':
			case 'homeRefresh':
				return true;
			default:
				return false;
			break;
		}
	}

	/**
	 * Ajax Handler
	 * @method ajaxHandler
	 * @link https://wiki.freepbx.org/display/FOP/BMO+Ajax+Calls#BMOAjaxCalls-ajaxHandler
	 * @return mixed      Data to return to Javascript
	 */
	public function ajaxHandler(){
		switch($_REQUEST['command']){
			case 'hello':
				return array("status" => true, "alert" => "success", "message" => _('HELLO UCP'));
			break;
			case 'homeRefresh':
				//when you hit refresh on the home page widget
				return array("status" => true, "content" => '<h3>This is refreshing</h3>');
			break;
			default:
				return false;
			break;
		}
	}

	/**
	* The Handler for unprocessed commands
	* @method ajaxCustomHandler
	* @link https://wiki.freepbx.org/display/FOP/BMO+Ajax+Calls#BMOAjaxCalls-ajaxCustomHandler
	* @return mixed Output if success, otherwise false will generate a 500 error serverside
	*/
	function ajaxCustomHandler() {
		switch($_REQUEST['command']) {
			case "world":
				echo "Hello!";
				return true;
			default:
				return false;
			break;
		}
		return false;
	}
}
