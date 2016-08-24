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


function elToArray() {
    var array=[];
    var className='';
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
    return array;
}

$('#save').on('click', function () {
    var array = [];

    var idElement  = $('#id');
    var formElement  = $('#form');
    var id  = idElement.val();

    console.log(array);

    if(id==''){
        formElement.show();
    }else{
        update(id);
    }
});

$('.mosaicloader').on('click', function () {
    var id = $( this ).data('id');

    $.ajax({
        dataType: 'json',
        url: 'ajax/get',
        data: { id: id },
        success: function(data){
            var arr = data.array.split(",");

            var e = '';
            for (var i=0;i<20;i++){

                for (var j=0;j<20;j++){
                    e = arr.shift();
                    var el = $( '#i'+i+'j'+j );
                    el.removeClass('blank').removeClass('red').removeClass('yellow').removeClass('green');
                    if(e=='b'){
                        el.addClass('blank')
                    }
                    if(e=='r'){
                        el.addClass('red')
                    }
                    if(e=='y'){
                        el.addClass('yellow')
                    }
                    if(e=='g'){
                        el.addClass('green')
                    }
                }
            }
            $('#id').val(data['_id']);
        }
    });

});

$('#form').on('submit', function () {
    console.log(123);
    var nameElement  = $('#name');
    var name  = nameElement.val();
    create(name);
    return false;
});

function update(id) {
    $.post("/ajax/update", { id: id, array: elToArray },
        function(data){
            alert(data);
        }
    );
}
function create(name) {
    $.post("/ajax/update", { id: '', name: name, array: elToArray },
        function(data){
            alert(data);
        }
    );
}