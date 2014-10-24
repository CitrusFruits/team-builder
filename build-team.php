<!--
  Todo:
    - cache team preferences
    - split up css fles
-->
<?php
  function getPlayers($folder){//open this directory
      $dir = opendir($folder);
      $first = true;
      while($file = readdir($dir)){
          if(substr($file, 0, 1) != '.'){
              if($first){
                  $first = false;
              }
              print '<option>'.(str_replace(".json", "", $file)).'</option>';
          }
      }
      closedir($dir);
      return;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/hint.base.min.css"></link>
  <link rel="stylesheet" type="text/css" href="css/nanoscroller.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/build-team.css">
  <link href='http://fonts.googleapis.com/css?family=Lustria' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
  <title>Build Team</title>
</head>
<body>
  <div id="header">
    <div class="title">Team Builder</div>
    <div id="strategy-div"><span style="float:left; margin-right: 5px;">strategy:</span>
      <div class="styled-select">
        <select id="strategy" onchange='buildTeam()'>
          <option>Comfort</option>
          <option>Siege/Poke</option>
          <option>Brawlers</option>
          <option>1 4 Split Push</option>
          <option>1 3 1 Split Push</option>
          <option>Alphabetical</option>
        </select><br/>
      </div>
    </div>
  </div>
  <div id="column">
    <?php
      $positions = array('top', 'jungle', 'mid', 'support', 'marksman');
      foreach($positions as $pos){
        $posCap = ucfirst($pos);
        echo <<<EOD
          <div id="$pos">
            <div class="player">
              <div class="position-label">$posCap</div>
              <!--<h3 id='$pos-title'></h3>-->
              <div class="styled-select">
                <select id="$pos-player" onchange="playerChanged('$pos')">
EOD;
              getPlayers('userdata/'.$pos); 
          echo <<<EOD
                </select>
              </div>
              <div class="stats">
                <div id="$pos-category-labels" class="category-labels">
                  <span class='champ-name hint--top' data-hint="...name, duh">Name</span>
                  <span class='champ-rating'><div style="width:4px; height:4px;"></div></span>
                  <span class='champ-tier hint--top' data-hint="Personal Comfort Tier">PCT</span>
                </div>
                <br/>
                <div class="nano">
                  <div id="$pos-champion-pool" class="champion-pool nano-content"></div>
                </div>
              </div>
              <div class="player-manage">
                <a href='#' id="$pos-edit" style="float:right" class="hint--top" data-hint="Edit Player">
                  <div class="button-icon">
                    <img src="img/ic_mode_edit_grey600_24dp.png" class="normal"/>
                    <img src="img/ic_mode_edit_black_24dp.png" class="hover"/>
                  </div>
                </a>
                <a href='edit-player.php?position=$pos' class="hint--top" style="float:right" data-hint="New Player (at this position)">
                  <div class="button-icon">
                    <img src="img/ic_insert_drive_file_grey600_24dp.png" class="normal"/>
                    <img src="img/ic_insert_drive_file_black_24dp.png" class="hover"/>
                  </div>
                </a>
              </div>
            </div>
          </div>
EOD;
      }
    ?>
  </div>
</body>
<script src="js/jquery-1.6.1.min.js" type="text/javascript"></script>
<script src="js/jquery.nanoscroller.min.js" type="text/javascript"></script>
<script src="js/data-wrangler.js" type="text/javascript"></script>
<script src="js/champions.js" type="text/javascript"></script>
<script src="js/data-display.js" type="text/javascript"></script>
<script src="js/simpleStorage.js" type="text/javascript"></script>
<script type="text/javascript">
  var select;
  if ($.browser.mozilla){
    var selects = $('select');
    select = selects[0];
    console.log(selects[0]);
    for(var i = 0; i < selects.length; i++){
      $(selects[i]).attr('style', 'width:110%');
    }
  }
  $(".nano").nanoScroller();
  var positions = ['top', 'jungle', 'mid', 'support', 'marksman'];
  var team = {};
  var callbacks = 0;
  var cachedStrat = simpleStorage.get('strategy');
  if(cachedStrat){
    $('#strategy').val(cachedStrat);
  }
  for(var i = 0; i < positions.length; i++){
    var cachedPlayer = simpleStorage.get('player-' + positions[i]);
    if(cachedPlayer){
      $('#' + positions[i] + '-player').val(cachedPlayer); 
    }
    loadChampions(positions[i], $('#' + positions[i] + '-player').val(), function(){
      callbacks++;
      // When all five have loaded
      if(callbacks == 5){
        buildTeam();
      }
    });
  }
  function loadChampions(position, player, callback){
    data.load({position: position, name: player}, function(info){
      $('#' + position + '-edit').attr('href', 'edit-player.php?position=' + position+'&name=' + player);
      var discipline = 'alphabetical';
      // If the position has already been established, transfer the discipline
      if(team[position]){
        discipline = team[position].discipline;
      }
      team[position] = info;
      team[position].discipline = discipline;
      var newPool = new Array();
      for(var i = 0; i < team[position].championPool.length; i++){
        var champName = team[position].championPool[i].name;
        newPool[i] = {
          disengage: championData[champName].disengage,
          teamFight: championData[champName].teamFight,
          splitPush: championData[champName].splitPush,
          siege: championData[champName].siege,
        };
        newPool[i].tier = info.championPool[i].tier;
        newPool[i].name = champName; 
      }
      team[position].championPool = newPool;
      //console.log('loaded');
      //console.log(team[position]);
      if(callback){
        callback();
      }
    });
  }
  function updateChampions(position, discipline){
    // Cache the player
    simpleStorage.set('player-' + position, $('#' + position + '-player').val());

    var champions = team[position].championPool;
    
    team[position].discipline = discipline;
    $('#' + position + '-champion-pool').html('');
    for(var i = 0; i < champions.length; i++){
      var rating = '<div style="width:4px; height:4px;"></div>';
      var tier = champions[i].tier;
      if(discipline != 'alphabetical' && discipline != 'tier'){
        rating = champions[i][discipline];
      }
      var even = '';
      if(i%2 == 0){ 
        even = 'even';
      }
      var h = ['<div class="champ ' + even + '">',
                '<span class="champ-name">'+ championDisplayData[champions[i].name].display +'</span>',
                '<span class="champ-rating">'+ rating +'</span>',
                '<span class="champ-tier">'+ tier +'</span>',
              '</div>'].join('\n');

      $('#' + position + '-champion-pool').append(h);
    }
    if(discipline == 'alphabetical' || discipline == 'tier'){
      $('#' + position + '-category-labels .champ-rating').html('<div style="width:4px; height:4px;"></div>');
    }else{
      $('#' + position + '-category-labels .champ-rating').html('<span class="hint--top" data-hint="' + disciplineDisplays[discipline].hint+'">' + disciplineDisplays[discipline].display + '</span>');
    }
    $('#' + position + '-champion-pool').append('<div style="width:40px; height:120px;"></div>');
    $(".nano").nanoScroller();
    //$('#' + position + '-title').html(info.nameFirst + ' "' + info.nameSummoner + '" ' + info.nameLast);
  }
  function sortAndUpdate(position, discipline, bruteForce){
    if(team[position].discipline == discipline && !bruteForce){
      return;
    }
    switch(discipline){
      case 'alphabetical':
          team[position].championPool.sort(compareTeamAlpha);
          break;
      case 'teamFight':
          team[position].championPool.sort(compareTeamFight);
        break;
      case 'splitPush':
          team[position].championPool.sort(compareSplitPush);
        break;
      case 'siege':
          team[position].championPool.sort(compareSiege);
        break;
      case 'disengage':
          team[position].championPool.sort(compareDisengage);
          break;
      case 'tier':
          team[position].championPool.sort(compareTier);
        break;
    }
    updateChampions(position, discipline);
  }
  function buildTeam(){
    var stratString = $('#strategy').val();
    simpleStorage.set('strategy', stratString);
    switch(stratString){
      case 'Alphabetical': 
        sortAndUpdate('top', 'alphabetical');
        sortAndUpdate('jungle', 'alphabetical');
        sortAndUpdate('mid', 'alphabetical');
        sortAndUpdate('support', 'alphabetical');
        sortAndUpdate('marksman', 'alphabetical');
        console.log('Like sesame street');
        break;
      case 'Brawlers': 
        sortAndUpdate('top', 'teamFight');
        sortAndUpdate('jungle', 'teamFight');
        sortAndUpdate('mid', 'teamFight');
        sortAndUpdate('support', 'teamFight');
        sortAndUpdate('marksman', 'teamFight');
        console.log('It\'s brawling time!');
        break;
      case '1 4 Split Push':  
        sortAndUpdate('top', 'splitPush');
        sortAndUpdate('jungle', 'disengage');
        sortAndUpdate('mid', 'disengage');
        sortAndUpdate('support', 'disengage');
        sortAndUpdate('marksman', 'disengage');
        console.log('Wuss');
        break;
      case '1 3 1 Split Push':
        sortAndUpdate('top', 'splitPush');
        sortAndUpdate('jungle', 'disengage');
        sortAndUpdate('mid', 'splitPush');
        sortAndUpdate('support', 'disengage');
        sortAndUpdate('marksman', 'disengage');
        console.log('Weenie') ;
        break;
      case 'Siege/Poke': 
        sortAndUpdate('top', 'siege');
        sortAndUpdate('jungle', 'siege');
        sortAndUpdate('mid', 'siege');
        sortAndUpdate('support', 'siege');
        sortAndUpdate('marksman', 'siege');
        console.log('Weenie Hut Junior');
        break;
      case 'Comfort': 
        sortAndUpdate('top', 'tier');
        sortAndUpdate('jungle', 'tier');
        sortAndUpdate('mid', 'tier');
        sortAndUpdate('support', 'tier');
        sortAndUpdate('marksman', 'tier');
        console.log('Cop out');
        break;

    }
  }
  function playerChanged(position){
    loadChampions(position, $('#' + position + '-player').val(), function(){
      console.log('callback');
      sortAndUpdate(position, team[position].discipline, true);
    }); 
  }
  function compareTeamAlpha(champA, champB){
    if (champA.name > champB.name){
      return 1;
    }
    else{
      return -1;
    }
  }
  function compareTeamFight(champA, champB){
    if(-champA.teamFight + champB.teamFight == 0)
      return compareTier(champA, champB);
    return -champA.teamFight + champB.teamFight;
  }
  function compareDisengage(champA, champB){
    if(-champA.disengage + champB.disengage == 0)
      return compareTier(champA, champB);
    return -champA.disengage + champB.disengage;
  }
  function compareSiege(champA, champB){
    if(-champA.siege + champB.siege == 0)
      return compareTier(champA, champB);
    return -champA.siege + champB.siege;
  }
  function compareSplitPush(champA, champB){
    if(-champA.splitPush + champB.splitPush == 0)
      return compareTier(champA, champB);
    return -champA.splitPush + champB.splitPush;
  }
  function compareTier(champA, champB){
    return champA.tier - champB.tier;
  }
</script>
</html>
