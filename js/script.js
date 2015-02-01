$(document).ready(function(){
	/* The following code is executed once the DOM is loaded */
	
	/* This flag will prevent multiple comment submits: */
	var working = false;
	
	/* Listening for the submit event of the form: */
	$('#addCommentForm').submit(function(e){

 		e.preventDefault();
		if(working) return false;
		
		working = true;
		$('#submit').val('Working..');
		$('span.error').remove();
		
		/* Sending the form fileds to submit.php: */
		$.post('/includes/submit.php',$(this).serialize(),function(msg){

			working = false;
			$('#submit').val('Submit');
			
			if(msg.status){

				/* 
				/	If the insert was successful, add the comment
				/	below the last one on the page with a slideDown effect
				/*/

				$(msg.html).hide().insertBefore('#addCommentContainer').slideDown();
				$('#body').val('');
			}
			else {

				/*
				/	If there were errors, loop through the
				/	msg.errors object and display them on the page 
				/*/
				
				$.each(msg.errors,function(k,v){
					$('label[for='+k+']').append('<span class="error">'+v+'</span>');
				});
			}
		},'json');

	});
	
	$(".comment").hover( function () {
		$(this).addClass("hov");
	}, function () {
		$(this).removeClass("hov");
	});
	
	$("#totop").hide();
	
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#totop').fadeIn();
			} else {
				$('#totop').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('.goto').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
	
	$('a.tup').click( function() {
		var link_id_plus = $(this).attr("rel");
		var errfind = '.err[rel='+link_id_plus+']';
		$(".comment").find(errfind).hide();
		var dataString = 'linkid=' + link_id_plus;
		if (! $(this).hasClass("clicked")) {
			$.ajax({
			type: "POST",
			url: "/bin/votes/voteplus.php",
			data: dataString,
			success: function() {
				$.colorbox({html:"<h3 style='padding:20px;'>You voted 'Interesting' +1, Thank You!</h3>"});
				$(document).bind('cbox_closed', function(){ 
					var numfind = '.num[rel='+link_id_plus+']';
					var numvalue = $(".comment").find(numfind).html();
					var oldrating = parseInt(numvalue);
					var newrating = oldrating + 1;
					$(numfind).html( newrating );
					var tupfind = '.tup[rel='+link_id_plus+']';
					$(tupfind).addClass("clicked");
				});
			}
			});
		} else {
			//err
			$(".comment").find(errfind).show().html('You already voted "Interesting" - please refresh to vote again!');
		}
	});
	$('a.tdow').click( function() {
		var link_id_plus = $(this).attr("rel");
		var errfind = '.err[rel='+link_id_plus+']';
		$(".comment").find(errfind).hide();
		var dataString = 'linkid=' + link_id_plus;
		if (! $(this).hasClass("clicked")) {
			$.ajax({
			type: "POST",
			url: "/bin/votes/voteminus.php",
			data: dataString,
			success: function() {
				$.colorbox({html:"<h3 style='padding:20px;'>You voted 'NOT Interesting' -5, Thank You!</h3>"});
				$(document).bind('cbox_closed', function(){ 
					var numfind = '.num[rel='+link_id_plus+']';
					var numvalue = $(".comment").find(numfind).html();
					var oldrating = parseInt(numvalue);
					var newrating = oldrating - 5;
					$(numfind).html( newrating );
					var tupfind = '.tdow[rel='+link_id_plus+']';
					$(tupfind).addClass("clicked");
				});
			}
			});
		} else {
			//err
			$(".comment").find(errfind).show().html('You already voted "NOT Interesting" - please refresh to vote again!');
		}
	});
	$('a.tlov').click( function() {
		var link_id_plus = $(this).attr("rel");
		var errfind = '.err[rel='+link_id_plus+']';
		$(".comment").find(errfind).hide();
		var dataString = 'linkid=' + link_id_plus;
		if (! $(this).hasClass("clicked")) {
			$.ajax({
			type: "POST",
			url: "/bin/votes/voteloveit.php",
			data: dataString,
			success: function() {
				$.colorbox({html:"<h3 style='padding:20px;'>You voted 'Love it!' +10, Thank You!</h3>"});
				$(document).bind('cbox_closed', function(){ 
					var numfind = '.num[rel='+link_id_plus+']';
					var numvalue = $(".comment").find(numfind).html();
					var oldrating = parseInt(numvalue);
					var newrating = oldrating + 10;
					$(numfind).html( newrating );
					var tupfind = '.tlov[rel='+link_id_plus+']';
					$(tupfind).addClass("clicked");
				});
			}
			});
		} else {
			//err
			$(".comment").find(errfind).show().html('You already voted "Love it!" - please refresh to vote again!');
		}
	});
	
});