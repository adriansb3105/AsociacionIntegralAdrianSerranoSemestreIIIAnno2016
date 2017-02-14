var events = [];

//getActivities();

function getActivities(){
  $.ajax({
    url: '',
    data: 'iduser=12345',
    type: 'post',
    beforeSend: function(){
      $('#resultado').html("Buscando actividades...");
    },
    success: function(res){
        $('#resultado').html(res);
    }
  });
}
