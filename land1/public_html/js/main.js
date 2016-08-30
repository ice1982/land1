$.extend($.inputmask.defaults.definitions, {
    'r': {
        "validator": "[А-Яа-я/A-Za-z/ ]",
        "cardinality": 1,
        'prevalidator': null
    }
});
$(function(){
    
    $('#modal').click(function(){
        $.fancybox({
        href: '#forma',
        });
    });
    
    $(".phone").inputmask({"mask": "+7(999)999-99-99"});
    $(".name").inputmask({"mask": "r", "repeat": 100, "greedy": false});
    if($('div').is('#send-status-ok')){
        $.fancybox({
        href: '#send-status-ok'
        });
        var i = 5;
        setInterval(function(){
            if(i != 0){
                $('#count').text(i);
                i--;
            }else{
                $('#link')[0].click();
            }
        }, 1000);
    }
    $.validate({
        borderColorOnError: '#ccc',
        scrollToTopOnError : false,
        onSuccess: function($form){
            $.ajax({
                type: 'post',
                url: 'send_email_ajax.php',
                data: $($form).serializeArray(),
                cache: false,
                dataType: 'json',
                success: function(data){
                    if(data['data'] == 'mail_send'){
                        $('form').each(function(){//
                            this.reset();// сброс форм при успехе.
                        });//
                        $.fancybox({href: '#modalSuccessForm'});
                        yaCounter37974660.reachGoal('FORM_SUBMIT');
                    }
                },
                error: function(xhr){
                    if(xhr != 200){
                        $.fancybox({href: '#modalErrorForm'});
                    }
                }
            });
            return false;
        }
    });
    
});