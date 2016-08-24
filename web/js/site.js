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
    var array = [];
    var className = '';
    var idElement  = $('#id');
    var formElement  = $('#form');
    var id  = $('#id').val();
    for (var i=0;i<20;i++){
        array[i] = [];
        for (var j=0;j<20;j++){
            array[i][j] = '';
            var el = $( '#i'+i+'j'+j );
            if(el.hasClass('blank')){
                className = 'b';
            }

            if(el.hasClass('red')){
                className = 'r';
            }
            if(el.hasClass('yellow')){
                className = 'y';
            }
            if(el.hasClass('green')){
                className = 'g';
            }
            array[i][j] = className;
        }
    }
    console.log(array);

    if(id==''){
        formElement.show();
    }
});

$('#form').on('submit', function () {
    console.log(123);
    return false;
});