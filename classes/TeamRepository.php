<?php
require "Database.php";
require 'Team.php';
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

		public static function getRandom(){
		if ((count ( self::$users ) === 0  ) || (count ( self::$teams ) === 0)){
			self::init ();
		}
		return self::Randomize(self::$teams, self::$users);
	}

	private static function Randomize($teams, $users){

		$number_of_teams = count($teams);
		$number_of_users = count($users);
		$user_index = 0;

        $number_of_teams = intval($number_of_teams/$number_of_users);
        $number_of_teams = $number_of_teams*$number_of_users;
		
		shuffle($teams);

		while ($number_of_teams > 0) {
			$number_of_teams = $number_of_teams - 1;

			$users[$user_index]->addTeam($teams[$number_of_teams]);
			unset($teams[$number_of_teams]);

			$user_index = $user_index + 1;
			if($user_index >= $number_of_users)
				$user_index = 0;
		}
		$count = count($teams);

		if(count($teams)!= 0)
			array_push($users, new User('Unassigned','','','','','', $teams));

		return $users;
}

}
?>
