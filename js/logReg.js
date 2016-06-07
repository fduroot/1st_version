$(document).ready(function() {
    $('#loginForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            account: {
                container: '#logAccError',
                validators: {
                    notEmpty: {
                        message: 'Please enter your account'
                    }
                }
            },
            password: {
                container: '#logPassError',
                validators: {
                    notEmpty: {
                        message: 'Please enter your password'
                    }
                }
            }
        }
    });
    $('#registerForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: [':disabled'],
            fields: {
                account: {
                    container: '#regAccError',
                    validators: {
                        callback: {
                          message: 'Invalid account',
                          callback: function(value, validator) {
                            //var acc = validator.getFieldElements('account').val();
                            if (value.length>4) {
                                return true;
                            }
                            else
                               return false;
                          }
                        }
                    }
                },
                password: {
                    container: '#regPassError',
                    validators: {
                        callback: {
                            message: 'Invalid password',
                            callback: function(value, validator) {
                                 var pass = validator.getFieldElements('password').val();
                                 if (pass.length>5){
                                      return true;
                                 }
                                 else
                                      return false;
                            }
                        }
                    }
                },
                passwordAgain: {
                    container: '#regPassAgainError',
                    validators: {
                        callback: {
                                                  message: 'Password does not match',
                                                  callback: function(value, validator) {
                                                    var pass = validator.getFieldElements('password').val();
                                                    var passAgain = validator.getFieldElements('passwordAgain').val();
                                                    if (passAgain===pass) {
                                                        return true;
                                                    }
                                                    else
                                                        return false;
                                                  }
                                                }
                    }
                },
                nickname: {
                    container: '#regNickError',
                    validators: {
                        notEmpty: {
                            message: 'Please enter your nickname'
                        }
                    }
                }
            }
    });
    $('#loginModal').on('hidden.bs.modal', function () {
        $("#loginInputAccount").val("");
        $("#loginInputPassword").val("");
        $("#loginForm").data('bootstrapValidator').resetForm('resetForm', true);
    });
    $('#registerModal').on('hidden.bs.modal', function () {
        $("#registerInputAccount").val("");
        $("#registerInputPassword").val("");
        $("#registerInputPasswordAgain").val("");
        $("#registerInputName").val("");
        $("#registerForm").data('bootstrapValidator').resetForm('resetForm', true);
    });
});
