$(document).ready(function() { 
    // Generate a simple captcha
    function randomNumber(min, max) { 
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#form').bootstrapValidator({
//        live: 'disabled',
        message: 'El valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nivel: {
                validators: {
                    notEmpty: {
                        message: 'El nivel es requerido y no puede estar vacio'
                    }
                }
            },
            literal: {
                validators: {
                    notEmpty: {
                        message: 'La letra es requerida y no puede estar vacia'
                    }
                }
            },
			descripcion: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerido y no puede estar vacio'
                    }
                }
            },
			nombre1: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerido y no puede estar vacio'
                    }
                }
            },
            distrito: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerido y no puede estar vacio'
                    }
                }
            },
            nacional: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerida y no puede estar vacia'
                    }
                }
            },
            direccion: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerida y no puede estar vacia'
                    }
                }
            },
            local: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerida y no puede estar vacia'
                    }
                }
            },
            calle: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerida y no puede estar vacia'
                    }
                }
            },
            sector: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerida y no puede estar vacia'
                    }
                }
            },
            casa: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerida y no puede estar vacia'
                    }
                }
            },
            estado: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerido y no puede estar vacio'
                    }
                }
            },
            zopos: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerida y no puede estar vacia'
                    }
                }
            },
            ocupacion: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerido y no puede estar vacio'
                    }
                }
            },
            apellido1: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerido y no puede estar vacio'
                    }
                }
            },
            estudios: {
                validators: {
                    notEmpty: {
                        message: 'Campo es requerido y no puede estar vacio'
                    }
                }
            },
            fnacimiento: {
                validators: {
                    notEmpty: {
                        message: 'La Fecha es requerida y no puede estar vacia'
                    }
                }
            },
            modulos: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del modulo es requerido y no puede estar vacio'
                    }
                }
            },
            parentesco: {
                validators: {
                    notEmpty: {
                        message: 'El modulo es requerido y no puede estar vacio'
                    }
                }
            },
            tprofe: {
                validators: {
                    notEmpty: {
                        message: 'El tipo de profesion es requerido y no puede estar vacio'
                    }
                }
            },
            gesta: {
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido y no puede estar vacio'
                    }
                }
            },
            civil: {
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido y no puede estar vacio'
                    }
                }
            },
            cedula: {
                validators: {
                    notEmpty: {
                        message: 'La cedula del usuario es requerida y no puede estar vacia'
                    },
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'La cedula del usuario es requerida y no puede estar vacia'
                    },
                }
            },
            login: {
                message: 'El login no es valido',
                validators: {
                    notEmpty: {
                        message: 'El nombre del usuario es requerido y no puede estar vacio'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'El login debe tener mas de  6 y menos de 30 caracteres de longitud'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'El login solo puede contener alfabeto, n&#250;meros, guion bajo'
                    },
                    /*remote: {
                        type: 'POST',
                        url: 'usuarios_validacion.php',
                        message: 'El login no esta disponible'
                    },*/
                    different: {
                        field: 'password,confirmPassword',
                        message: 'El login y la contraseña no pueden ser iguales ambos'
                    }
                }
            },
            email2: {
                validators: {
                    notEmpty: {
                        message: 'El email es requerido y no puede estar vacio'
                    },
                    emailAddress: {
                        message: 'el Email de entrada no es valido'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'La contrase&#241;a es requerida y no pùede estar vacia'
                    },
                    // identical: {
                    // field: 'confirmPassword',
                        // message: 'La contrase&#241;a y su confirmacion no son iguales'
                    // },
                    different: {
                        field: 'login',
                        message: 'La Contrase&#241;a no puede ser igual al USUARIO'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'La confirmacion de la  contrase&#241;a es requerida y no pùede estar vacia'
                    },
                    identical: {
                        field: 'password',
                        message: 'La contrase&#241;a y su confirmacion no son iguales'
                    },
                    different: {
                        field: 'login',
                        message: 'La Contrase&#241;a no puede ser igual al USUARIO'
                    }
                }
            },
            dtp_input2: {
                validators: {
                    notEmpty: {
                        message: 'La fecha es requerida y no puede estar vacia'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha de nacimiento no es valida'
                    }
                }
            },
            sexo: {
                validators: {
                    notEmpty: {
                        message: 'El sexo es requerido'
                    }
                }
            },
            numerocel: {
                        message: 'El C&#243;digo no es valido',
                        validators: {
                            notEmpty: {
                                message: 'Se requiere el n&#250;mero del C&#243;digo'
                            },
                            digits: {
                                message: 'Debe contener solo n&#250;meros'
                            }
                        }
                    },
            telhab: {
                        message: 'El n&#250;mero de tel&#233;fono no es valido',
                        validators: {
                            notEmpty: {
                                message: 'Se requiere el n&#250;mero de tel&#233;fono'
                            },
                            digits: {
                                message: 'Debe contener solo n&#250;meros'
                            }
                        }
                    },
            telcel: {
                        message: 'El n&#250;mero de tel&#233;fono no es valido',
                        validators: {
                            notEmpty: {
                                message: 'Se requiere el n&#250;mero de tel&#233;fono'
                            },
                            digits: {
                                message: 'Debe contener solo n&#250;meros'
                            }
                        }
                    },
            'languages[]': {
                validators: {
                    notEmpty: {
                        message: 'Please specify at least one language you can speak'
                    }
                }
            },
            'programs[]': {
                validators: {
                    choice: {
                        min: 2,
                        max: 4,
                        message: 'Please choose 2 - 4 programming languages you are good at'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#form').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#form').data('bootstrapValidator').resetForm(true);
    });
});


