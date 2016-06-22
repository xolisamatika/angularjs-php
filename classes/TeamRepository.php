<?php
require "Database.php";
require 'Team.php';
require 'Player.php';
require 'User.php';
class TeamRepository {
	private static $teams = array ();
	private static $users = array ();
	private static $user = null;

	protected static function init() {
		$teams = Team::getAllTeams ();
		$users = User::getAllUsers ();
		
		self::$teams = $teams;
		self::$users = $users;
	}
	public static function getTeams() {
		if (count ( self::$teams ) === 0) {
			self::init ();
		}
		return self::$teams;
	}
	public static function getUsers() {
		if (count ( self::$users ) === 0) {
			self::init ();
		}
		return self::$users;
	}

	public static function getUser($username) {
		self::$user = User::getUser ($username);
		return self::$user;
	}
}
?>
