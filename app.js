(function() {
	var app = angular.module('euro2016', []);
	app.factory('euroService', function($http){

		var baseUrl = 'services';
		return {
			getTeams : function(){
				return $http.get(baseUrl+'/getTeams.php');
			},
			getUsers : function(){
				return $http.get(baseUrl+'/getUsers.php');
			},getRandoms : function(){
				return $http.get(baseUrl+'/getFunctions.php?function=1');
			}
		};
	});

	app.controller('EuroController', function($scope,euroService){
	
		    var that = this;
			euroService.getTeams().success(function(data){
				that.teams = data;
			});

			euroService.getUsers().success(function(data){
				that.users = data;
			});

			this.newTeam = "";
			this.addTeam = function(teams){
				teams.push({name:this.newTeam, iso_code: ''});
				this.newTeam = "";
			}
			$scope.go = function (){
				euroService.getRandoms().success(function(data){
							that.randoms = data;
							console.log(data);
						})
			}
			$scope.isAdmin = function (){
				
			}			
						
			
	});
	app.directive('playerView', function(){
		return{
			restrict:'E',
			templateUrl:'player-view.html',
			controller:function(){
				this.addPlayerTo = function(team){
					if (!team.players) {
						team.players = [];
					}
					team.players.push({name:this.newPlayer});
					this.newPlayer = "";
				};
			},
			controllerAs:'playerCtrl'
		}
	});
		app.directive('randomsView', function(){
		return{
			restrict:'E',
			templateUrl:'randoms-view.html'
		}
	});
})();
	