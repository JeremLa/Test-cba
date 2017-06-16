$(document).ready(function(){

    $('.reservedBy').each(function(){
      $(this).on('change', function(){

        if($(this).val() === null){
          return;
        }

        var userId = $(this).val();
        var ressourceId = $(this).attr('data-ressource-id');

        $.ajax({
          url: 'http://www.cba-test.local/reservation/update',
          data: {
            userId: userId,
            ressourceId: ressourceId
          },
          success: function(){
            $('#info').find('.bg-success').removeClass('hidden');

            setTimeout(function(){
              $('#info').find('.bg-success').addClass('hidden');
            }, 5000);
          },
          error: function(){
            $('#info').find('.bg-warning').removeClass('hidden');

            setTimeout(function(){
              $('#info').find('.bg-warning').addClass('hidden');
            }, 5000);
          }
        })
      })
    })
})