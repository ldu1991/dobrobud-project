jQuery(document).ready(function($){

    $('.gratitude-slider').slick({
      dots: false,
      arrows: true,
      autoplay: false,
      autoplaySpeed: 3000,
      infinite: true,
      speed: 800,
      slidesToShow: 1,
      focusOnSelect: true,
      centerMode: true,
      centerPadding: '195px',
      initialSlide: 1,
      adaptiveHeight: true,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            centerPadding: '80px',
            arrows: false,
          }
        },
        {
          breakpoint: 576,
          settings: {
            centerPadding: '50px',
            arrows: false,
          }
        },
      ]
    });

    function colorFacade() {
        var input = '.facade',
            checked = ':checked',
            inputChec = input + checked,
            inputVal = $(inputChec).val(),
            inputData = $(inputChec).data('title');

        $('.selected-color__name').html(inputData);
        // $('.home-facade').css('backgroundImage', 'url(' + inputVal + ')');
        $('.home-facade img').attr('src', inputVal);
    };

    var input = '.facade',
        checked = ':checked',
        inputChec = input + checked;

    if(inputChec) {
        colorFacade();
    }

	$(input).on('change', function() {
        colorFacade();
	});

    var wow = new WOW(
      {
        boxClass:     'wow',
        animateClass: 'animated',
        offset:       150,
        mobile:       false,
        live:         true
      }
    );
    wow.init();


    function upFile() {
        var file = $('#uploaded_file').val();
        file = file.replace(/\\/g, "/").split('/').pop();
        $('.false-input').html(file);
    }

	$('#uploaded_file').on('change', function() {
        upFile();
	});


/* --------------- Deleting placeholder focus --------------- */
    $('input,textarea').focus(function(){
        $(this).data('placeholder',$(this).attr('placeholder'))
        $(this).attr('placeholder','');
    });
    $('input,textarea').blur(function(){
        $(this).attr('placeholder',$(this).data('placeholder'));
    });
/* ------------- End Deleting placeholder focus ------------- */


});