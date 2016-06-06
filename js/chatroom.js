$(document).ready(function(){
    $('.url').attr("value",window.location.href);
    if($.cookie('nickname') === null)
        $('#nickname').attr("value","Anonymous User");
    else
        $('#nickname').attr("value",$.cookie('nickname'));
    $('#chatForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                chatContent: {
                    container: '#chatError',
                    validators: {
                        callback: {
                            message: 'Invalid Content',
                                                        callback: function(value, validator) {
                                                             var content = validator.getFieldElements('chatContent').val();
                                                             if (content.length>200)
                                                                  return true;
                                                             else
                                                                  return false;
                                                        }
                        }
                    }
                },
            }
        });
});