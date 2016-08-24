/**
 * Created by Lazarev Aleksey on 24.08.16.
 */


$( ".cell20" ).on( "click", function() {
    if($( this ).hasClass('blank')){
        $( this ).removeClass('blank').addClass('red');
        return;
    }

    if($( this ).hasClass('red')){
        $( this ).removeClass('red').addClass('yellow');
        return;
    }
    if($( this ).hasClass('yellow')){
        $( this ).removeClass('yellow').addClass('green');
        return;
    }
    if($( this ).hasClass('green')){
        $( this ).removeClass('green').addClass('blank');
        return;
    }
});

$('#save').on('click', function () {
    console.log(333);
});

$('#form').on('submit', function () {
    console.log(123);
    return false;
});