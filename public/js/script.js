$(document).on('click', '.pagination a', function(e){
      e.preventDefault();

      var page = $(this).attr('href').split('page=')[1];

      getPersons(page);
});

function getPersons(page){
      $.ajax({ url: $('#root').attr('href')+'/ajax/persons?page='+page })

            .done(function(data){

            $('.patner_table').html(data);

            location.hash = page;
      });
}

$('#country').change(function(){
	var country = $('#country').val();
      $('#city').empty();
	$.ajax({
		url: $('#get_state').attr('href'),
		method: 'POST',
		header:{
            'X-CSRF-Token': $('[name="_token"]').val()
      },
      data:{
      	 _token: $('[name="_token"]').val(),
      	 country: country
      }, 
      success: function(res){
      	$('#state').empty();
      	$.each(res, function(key, val){
      		$('#state').append($("<option></option>").attr('value', key).text(val));
      	});
      }

	});

});

$('#state').change(function(){

	var state = $('#state').val();

	$.ajax({
		url: $('#get_city').attr('href'),
		method: 'POST',
		header:{
            'X-CSRF-Token': $('[name="_token"]').val()
      },
      data:{
      	 _token: $('[name="_token"]').val(),
      	 state: state
      }, 
      success: function(res){
      	$('#city').empty();
      	$.each(res, function(key, val){
      		$('#city').append($("<option></option>").attr('value', key).text(val));
      	});
      }

	});

});



function deletePerson(event){
      $('#modaldelete').modal('hide');
      var id = event.data.id;
      $.ajax({
            url:$('#root').attr('href')+'/delete',
            method: 'POST',
            header:{
                  'X-CSRF-Token': $('[name="_token"]').val()
            },
            data:{
                  _token: $('[name="_token"]').val(),
                  id: id
            }, 

            success: function(res){

                  $('#success_message').html(res['person']+" "+res['mensaje'])
                  $('tr#'+id).fadeOut( "slow", function() {

                        $('.ajaxsuccess').fadeIn( 2500, function() {
                              $('.ajaxsuccess').fadeOut( 2000, function() {
                        
                              });
                        });
                  });
            }

      });
}

function confirmdelete(id) {

      $('#confirmdelete').off('click');

      $('#confirmdelete').on('click', {id: id },deletePerson);


      $('#modaldelete').modal('show');
}