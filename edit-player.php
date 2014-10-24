<!DOCTYPE html>
<html>
<head>
  <title>Edit Player</title>
  <link rel="stylesheet" href="css/chosen.css"></link>
  <link rel="stylesheet" href="css/style.css"></link>
  <link rel="stylesheet" type="text/css" href="css/build-team.css">
  <link rel="stylesheet" type="text/css" href="css/hint.base.min.css"></link>
  <link href='http://fonts.googleapis.com/css?family=Lustria' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
  <style>
  .chosen-container{
    width: 100% !important;
    font-size: 23px;
    height: 35px;
  }
  .chosen-single span{
    position: relative;
    top: 4px;
    height: 27px !important;
  }
  .chosen-single b{
    position: relative;;
    left: 3px;
    top: 4px;
  }
  .chosen-single{
    height: 35px !important; 
  }
  .player{
    width: 400px;
    margin: auto;
    float: none;
    height: auto;
    margin-bottom: 80px;
  }
  .remove{
    left: -224px;
    cursor: pointer;
    color: #acacac;
  }
  .remove:hover{
    color: black;
  }
  .champion-pool{
    height: auto;
    background-color: #e4e4e4;
    min-height: 350px;
  }
  .champ{
    overflow: visible;
  }
  .champ-name{
    float: left;
    margin-left: 5px;
  }
  .champ-radio{
    float: right;
    margin-right: 5px;
  }
  .champ-radio label span{
    position: relative;
    right: 3px;
    font-size: 20px
  }
  #name-summoner{
    font-family: 'Lustria', serif;
    background: transparent;
    width: 100%;
    padding: 2px;
    font-size: 27px;
    line-height: 1.2;
    border: none;
    border-radius: 0;
    height: 46px;
    -webkit-appearance: none
  }
    #name-summoner-div{
    font-family: 'Lustria', serif;
    width: 100%;
    margin: 8px 0px 5px 0px;
    padding: 2px;
    font-size: 27px;
  }
  </style>
</head>
<?php
    $pos = $_GET["position"];
    $posCap = ucfirst($pos);
    $pre = "New";
    if(isset($_GET["name"])){
        $pre = "Edit";
    }
?>
<body>
  <div id="header">
    <div class="title"><a href="build-team.php">Team Builder</a></div>
    <div id="strategy-div"><span style="float:left; margin-right: 5px;"><?php echo $pre.' '.$posCap ?></span></div>
    <br/>
  </div>
      <?php
      echo <<<EOD
          <div id="$pos">
            <div class="player">
              <div id="save" onclick="saveData()" style="float:right" class="hint--top" data-hint="Publish changes">
                <div class="button-icon" style="height: 36px;">
                    <img class="normal" src="img/ic_publish_grey600_36dp.png">
                    <img class="hover" src="img/ic_publish_black_36dp.png">
                </div>
              </div>
              <div class="position-label">Summoner Name</div>
              <!--<h3 id='$pos-title'></h3>-->
EOD;
              if(isset($_GET["name"])){ 
                echo '<div id="name-summoner-div">'.$_GET["name"].'</div>';
              }
              else{ 
                echo '<input type="text" name="name-summoner" placeholder="The Odd Bro" id="name-summoner"></input><br/>';
              }
              echo <<<EOD
              Add Champion: 
              <select data-placeholder="Select champions..." id="chosen-select"  style="width:350px;" tabindex="2">
                <option value=""></option>
              </select>
              <div class="stats">
                <div id="$pos-category-labels" class="category-labels">
                  <span class='champ-name hint--top' style="width: 10%" data-hint="...name, duh">Name</span>
                  <span class='champ-tier hint--top' style="float: right; width: 60%; text-align: right;" data-hint="Personal Comfort Tier">Personal Comfort Tier</span>
                </div>
                <br/>
              </div>
            <div id="$pos-champion-pool" class="champion-pool"></div>
            <div class="player-manage">
                <div class="hint--top" data-hint="Publish changes" style="float:right;" onclick="saveData();">
                  <div class="button-icon">
                    <img src="img/ic_publish_grey600_24dp.png" class="normal"/>
                    <img src="img/ic_publish_black_24dp.png" class="hover"/>
                  </div>
                </div>
            </div>
          </div>
EOD;
?>
</div>
  <script src="js/jquery-1.6.1.min.js" type="text/javascript"></script>
  <script src="js/chosen.jquery.js" type="text/javascript"></script>
  <script src="js/data-wrangler.js" type="text/javascript"></script>
  <script src="js/champions.js" type="text/javascript"></script>
  <script src="js/data-display.js" type="text/javascript"></script>
  <script src="js/simpleStorage.js" type="text/javascript"></script>
  <script type="text/javascript">
    var parameters = getParameters();
    loadData();
    function saveData(){
        var saveData = {};

        if(parameters['name']){
            saveData.nameSummoner = parameters['name'];
        }
        else{
            saveData.nameSummoner = $('#name-summoner').val();
        }

        if(!saveData.nameSummoner){
            alert('Please enter a summoner name');
            return;
        }

        saveData.position = parameters.position;

        var champions = $('.champ');
        saveData.championPool = [];
        for(var i = 0; i < champions.length; i++){
            var champion = {}
            champion.name = champions[i].getAttribute('name');
            var tiers = $('.' + champion.name +'-tier');
            for(var j = 0; j < tiers.length; j++){
                if(tiers[j].checked){
                    champion.tier = parseInt(tiers[j].value);
                }
            }
            saveData.championPool.push(champion);
        }
        if(!saveData.championPool.length){
            alert('Please add one or more champions');
            return;
        }
        saveData.championPool = saveData.championPool.sort(function (a, b, c){
            if(a.name > b.name){
                return 1;
            }
            return -1;
        });
        data.save(saveData, function(data){
            alert("Changes published");
            window.location=('build-team.php');
        });
    }

    function loadData(){
        if(parameters.name && parameters.position){
            data.load(parameters, function(data){
                console.log(data);
                $('#name-summoner').val(data.nameSummoner);
                $('#name-first').val(data.nameFirst);
                $('#name-last').val(data.nameLast);
                var champions = data.championPool;
                for(var i = 0; i < champions.length; i++){
                    addChampion(champions[champions.length - 1 - i].name, champions[champions.length - 1 - i].tier);
                }
            });
        }
    }
    function getParameters(){
        var url = $('document').context.URL;
        var getString = url.split('?');
        if(getString[1]){
            var chunks = getString[1].split('&');
            var getParams = {};
            for(var i = 0; i < chunks.length; i++){
                var tuple = chunks[i].split('=');
                getParams[tuple[0]] = tuple[1].split('%20').join(' ');
            }
            //console.log(getParams);
            return getParams;
        }
    }
    loadChampions();
    // Dom event handling
    $("#chosen-select").chosen({});
    var chosenSelect = $("#chosen-select");
    //console.log(chosenSelect);
    $("#chosen-select").change(function(e){
      console.log("changed!");
      //$("#champion-pool").html("");
      if(!chosenSelect.val()){
        return;
      } 
      console.log(chosenSelect[0]);
      for(var i = 0; i < chosenSelect[0].length; i++){
        if(chosenSelect[0][i].selected){
            addChampion(chosenSelect[0][i].getAttribute('data-key'));
        }
      }
    })

    function loadChampions(){
        for(key in championData){
            //console.log(key);
            $('#chosen-select').append('<option data-key="' + key + '">' + championDisplayData[key].display + '</option>');
        }
    }

    var evenCounter = 0;
    function addChampion(key, tier){
        // Check if the champion has already been added
        var champions = $('.champ');
        for(var i = 0; i < champions.length; i++){
            if(champions[i].getAttribute('name') == key){
                alert('That champion has already been added');
                return;
            }
        }
        var even = '';
        if(evenCounter%2 == 0){ 
          even = 'even';
        }
        evenCounter++;
        var h = ['<div class="champ ' + even + '" name="' + key + '" id="' + key + '-div">',
                '<div class="remove hint--top" data-hint="remove" onclick="$(\'#' + key + '-div\').remove()">x </div>',
                '<span class="champ-name">' + championDisplayData[key].display + '</span>'].join('\n');
        if(!tier){
            tier = 4;
        }

        h += '<span class="champ-radio">';
        for(var i = 1; i <= 4; i++){
            h += '<input type="radio" id="radio-'+key+i+'" class="' + key +'-tier css-checkbox" name="' + key +'-tier" value="' + i + '"';
            if(tier == i){
                h += 'checked'
            }
            h += '>' + '</input>';
            h += '<label for="radio-'+key+i+'" class="css-label"><span>' + i + '</span></label>';
        }
        h += '</span>'
        h += '</div>';
        $('#' + parameters['position'] +'-champion-pool').prepend(h);
    }
  </script>
</body>
</html>
