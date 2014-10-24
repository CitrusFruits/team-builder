var teamName = "animals"
var data = {};

$(document).ready(function() {
  $.ajaxSetup({ cache: false });
});


// Saves all the data to a JSON file
data.save = function(exportData, callback){
  if(!exportData){
    return;
  }
  if(!exportData.nameSummoner){
    exportData.nameSummoner = 'bilbo';
  }
  console.log("Saving");

  exportString = JSON.stringify(exportData);
  
  // Create the data to send to php
  var postData = {
    "path": "userdata/" + exportData.position + "/" + exportData.nameSummoner + ".json",
    "data": exportString,
    "function" : "write-file"
  }

      // Send the data server side
      $.ajax({
          type: 'POST',
          url: "file-handling.php",
          data: postData,
          dataType: "JSON",
          complete: callback
      });
}

// Loads all the data from a JSON file stored remotely
data.load = function(params, callback){
  console.log("Opening: " + "userdata/" + params.position + "/" + params.name + ".json");
  $.ajax({
    cache: false,
    url: "userdata/" + params.position + "/" + params.name + ".json",
    dataType: "json",
    success: function(data) {
        if(callback){
          callback(data);
        }
      }
  });
}