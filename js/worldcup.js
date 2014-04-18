var player_forecast = [];
var match_facts = [];

$.ajax({
		type: 'GET',
		dataType: 'json',
		data: {},
		url: "forecast.json",
		success: function (forecast) {
			player_forecast = forecast;       	
		},
		complete: function() {
        	createGroupsElement();
			initializeRounds();}
	});


var apiUrlRound = "https://footballdb.herokuapp.com/api/v1/event/world.2014/";
var imagesPath = "https://footballdb.herokuapp.com/assets/flags/24x24/"
var lettersArray = ["A", "B","C", "D","E", "F","G", "H"]
var zonesArray = ["Octavos", 
					"Cuartos", 
					"Semifinales", 
					"Tercer Y Cuarto Puesto", 
					"Final"];

var teams_dict = [];
teams_dict["cro"] = {name: "Croacia", flag_code: "hr", group:1};
teams_dict["cmr"] = {name: "Camerún", flag_code: "cm", group:1};
teams_dict["mex"] = {name: "México", flag_code: "mx", group:1};
teams_dict["bra"] = {name: "Brasil", flag_code: "br", group:1};
teams_dict["ned"] = {name: "Holanda", flag_code: "nl", group:2};
teams_dict["esp"] = {name: "España", flag_code: "es", group:2};
teams_dict["chi"] = {name: "Chile", flag_code: "cl", group:2};
teams_dict["aus"] = {name: "Australia", flag_code: "au", group:2};
teams_dict["gre"] = {name: "Grecia", flag_code: "gr", group:3};
teams_dict["civ"] = {name: "Costa de Marfíl", flag_code: "ci", group:3};
teams_dict["col"] = {name: "Colombia", flag_code: "co", group:3};
teams_dict["jpn"] = {name: "Japón", flag_code: "jp", group:3};
teams_dict["ita"] = {name: "Italia", flag_code: "it", group:4};
teams_dict["eng"] = {name: "Inglaterra", flag_code: "en", group:4};
teams_dict["crc"] = {name: "Costa Rica", flag_code: "cr", group:4};
teams_dict["uru"] = {name: "Uruguay", flag_code: "uy", group:4};
teams_dict["fra"] = {name: "Francia", flag_code: "fr", group:5};
teams_dict["sui"] = {name: "Suiza", flag_code: "ch", group:5};
teams_dict["hon"] = {name: "Honduras", flag_code: "hn", group:5};
teams_dict["ecu"] = {name: "Ecuador", flag_code: "ec", group:5};
teams_dict["bih"] = {name: "Boznia-Herzegovina", flag_code: "ba", group:6};
teams_dict["nga"] = {name: "Nigeria", flag_code: "ng", group:6};
teams_dict["arg"] = {name: "Argentina", flag_code: "ar", group:6};
teams_dict["irn"] = {name: "Irán", flag_code: "ir", group:6};
teams_dict["ger"] = {name: "Alemania", flag_code: "de", group:7};
teams_dict["por"] = {name: "Portugal", flag_code: "pt", group:7};
teams_dict["gha"] = {name: "Ghana", flag_code: "gh", group:7};
teams_dict["usa"] = {name: "Estados Unidos", flag_code: "us", group:7};
teams_dict["rus"] = {name: "Rusia", flag_code: "ru", group:8};
teams_dict["bel"] = {name: "Bélgica", flag_code: "be", group:8};
teams_dict["alg"] = {name: "Algeria", flag_code: "dz", group:8};
teams_dict["kor"] = {name: "Corea Del Sur", flag_code: "kr", group:8};

function createGroupsElement()
{
	var j=1;
	for (;j<14;j++)	{
		var divo = $("<div>").addClass("group").addClass("collapse").addClass("group" + j).appendTo($("#world"));
		$("<div>").appendTo(divo).addClass("groupTit").text((j <= 8)? "Grupo " + lettersArray[j-1] : zonesArray[j-9]);}
}

$(".groupTit").click(function()	{
	$(this).parent().toggleClass("collapse");}
);

function initializeRounds()
{ 
	var i= 1;
	for (; i<21 ;i++)    
		fetchRoundDay(i);
}

function fetchRoundDay(day)
{
	$.ajax({
		type: 'GET',
		dataType: 'jsonp',
		data: {},
		url: apiUrlRound + "round/" + day,
		error: function (jqXHR, textStatus, errorThrown) {	
			console.log(jqXHR);		
		},
		success: function (response) {
			addToCorrespondingGroup(response.games);
			if (day == 20)
				finalizeGroupRetrieving();
		}
	});
}


function addToCorrespondingGroup(games)
{	var h=0;
	for(;h<games.length;h++)		
		match_facts.push(games[h]);	
}

function finalizeGroupRetrieving()
{
	for(var match in match_facts){
		setUserForecastToRetrievedMatchs(match_facts[match])
		createGroupAndMatch(match_facts[match]);
	}
}

function setUserForecastToRetrievedMatchs(match)
{
	for(var num in player_forecast)
	{
		if(player_forecast[num].play_at == match.play_at && 
			player_forecast[num].team1_key == match.team1_key && 
			player_forecast[num].team2_key == match.team2_key){
			match.playerScore1 = player_forecast[num].playerScore1;
			match.playerScore2 = player_forecast[num].playerScore2;
		}
	}
	if (!match.playerScore1)
		match.playerScore1 = String.empty;
	if (!match.playerScore2)
		match.playerScore2 = String.empty;

}

function createGroupAndMatch(match){
	var divo = $(".group" + teams_dict[match.team1_key].group);
	divo.removeClass("collapse");
	$("<div>").appendTo(divo)
		.addClass("match")
		.text(match.play_at);

	$("<div>").appendTo(divo)
		.addClass("team")
		.text(teams_dict[match.team1_key].name);

	$("<img>").appendTo(divo)
		.addClass("img24x24")
		.prop("src", imagesPath +  teams_dict[match.team1_key].flag_code + ".png");

	$("<div>").appendTo(divo)
		.addClass("score")
		.attr("title", "resultado real: " + ((match.score1)? match.score1 : "Aún no jugaron"))
		.prop("contentEditable", (new Date(match.play_at) > today()))
		.text(match.playerScore1)
		.blur(function()
			{
				match.playerScore1 = this.innerText;
			})
		.keydown(function( e ) {
				preventNotNumber(e)
			});

	$("<div>").appendTo(divo)
		.addClass("score")
		.attr("title", "resultado real: " + ((match.score2)? match.score2 : "Aún no jugaron"))
		.prop("contentEditable", (new Date(match.play_at) > today()))
		.text(match.playerScore2)
		.blur(function()
			{			
				match.playerScore2 = this.innerText;
			})
		.keydown(function( e ) 
			{
				preventNotNumber(e)
			});

	$("<img>").appendTo(divo)
		.addClass("img24x24")
		.prop("src", "http://footballdb.herokuapp.com/assets/flags/24x24/" +  teams_dict[match.team2_key].flag_code + ".png");

	$("<div>").appendTo(divo)
		.addClass("team")
		.text(teams_dict[match.team2_key].name);
}

$(".save").click(function()
	{
		$.post("save_player_forecast.php", {name: "forecast", json: match_facts}, function(result){

		});
	}
);