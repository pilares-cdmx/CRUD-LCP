$('#mcModalIniciativas .modal-header').css({'background-color' : '#A31B5C','color' : '#fff',
                                            'border-radius' : '5px 5px 0 0'});
$('.headline').on('click', function(){
    var winSize = {
      wheight : $(window).height(),
      wwidth : $(window).width()
    };
    var modSize = {
      mheight : $('#mcModalIniciativas').height(),
      mwidth : $('#mcModalIniciativas').width()
    };
  $('#mcModalIniciativas').css({
    'background-color' : '#ccc',
    'padding-top' :  ((winSize.wheight - (modSize.mheight/3))/5),
  });
  $('#mcModalIniciativas').modal({
    backdrop: false,
    keyboard : false
  });
});
