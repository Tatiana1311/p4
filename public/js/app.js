$(document).ready(function(){

//$('header').slideUp(2000).slideDown(1000);

//$('h1').fadeOut(2000).fadeIn(3000);

//jumbotron - click effect
	$('.jumbotron').click(function(){
		$('#jumbotron-img').animate({
			opacity: '0.25',
			height: 'toggle'
		}, 5000, 'swing', function(){
			$('#jumbotron-img').css({
				opacity: '1'
			}); //end jumbotron image css
		}); //end jumbotron img animate

		$('.jumbotron h1').text('Place your order today!');
	}); //end jumbotron click

//form
	$('#category').change(function()
	{
		if ($('#category').val() == 'candy-bouquets') 
		{
			$('.control-group .help-block').text('Delicious!');
		} 
		else if ($('#category').val() == 'fruit-arrangements') 
		{
			$('.control-group .help-block').text('Yummy!');
		} 
		else if ($('#category').val() == 'skin-care') 
		{
			$('.control-group .help-block').text('Beautiful!');
		} 
		else 
		{
			$('.control-group .help-block').text('Please type your message in a box below');
		}
	}); //end change 

	$('#name').focusout(function()
	{
		if($('#name').val().length == 0) 
		{
			$('.name-group .help-block-name').text('Please enter your name.');
			$('.name-group').attr(
			{
				class: 'control-group name-group help-block-name has-error'
		    }); // end attr
		} 
		else 
		{
			$('.name-group .help-block-name').text('');
			$('.name-group').attr(
			{
				class: 'control-group name-group'
			}); //end attr
		}
	}); //end focus out

/*
//hover over the flower logo
	$('#flower-logo').hover(function(){
		$('#flower-logo').attr({
			'src' : 'img/candy2.jpg',
			'class' : 'img-responsive',
		});
		$('#flower-logo').fadeOut(2000).fadeIn(500); //end attr
	}, // end mouse over
	function(){
			$('#flower-logo').attr({
				'src' : 'img/flower-logo.png',
				'class' : 'img-responsive'
			}); //end attr
	}); //end flower img hover

//hover over the aside element
	$('aside').hover(function(){
		$('aside p:even').css({
          backgroundColor: "#FFCCFF"
        }); //end css
	}, // end mouse over
	function(){
			$('aside p:even').css({
          backgroundColor: "white"
			}); //end css
	}); //end aside hover
*/

}); //end ready