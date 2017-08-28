var url = "/representantes"

$(document).ready(function() {

    // habilitar todos los inouts al hacer click en el boton reset
    $('button[type=reset]').click(function(event) {
        $("input[type=text]").each(function(){
            $(this).prop('disabled', false);
        });
    });
    
    // busqueda de una madre, padre o representante via ajax, rellenar y deshabilitar los inputs correspondientes
    $('#cedulaPadre, #cedulaMadre, #cedulaResponsable ').blur(function(event) {
        var tipo = $(this).attr("id").substring(6);

        $('.'+tipo).prop('disabled', true);

        $.get(url + '/' + $(this).val()+'/find', function (data) {

        if (data.code) {
            var representante = data.representante[0];
            $('input[name=nombre'+tipo+']').val(representante.nombre);
            $('input[name=nombre2'+tipo+']').val(representante.nombre2);
            $('input[name=apellido'+tipo+']').val(representante.apellido);
            $('input[name=apellido2'+tipo+']').val(representante.apellido2);
            $('input[name=fecha_nacimiento'+tipo+']').val(representante.fecha_nacimiento);
            $('input[name=ocupacion'+tipo+']').val(representante.ocupacion);
            $('input[name=direccion_trabajo'+tipo+']').val(representante.direccion_trabajo);
            $('input[name=telefono'+tipo+']').val(representante.telefono);
            $('input[name=telefono2'+tipo+']').val(representante.telefono2);
        } else {
            $('.'+tipo).prop('disabled', false);
            $('input[name=nombre'+tipo+']').focus();
            console.log('entre aqui');
        }

      });

    });

    $('input[type=radio]').change(function(event) {
        switch ($(this).val()) {
            case '0':
                console.log('quedandome con la madre de representante');
                $('#div-representante').css('display', 'none');
                break;
            case '1':
                console.log('quedandome con el padre de representante');
                $('#div-representante').css('display', 'none');
                break;
            case '2':
                console.log('agregando el otra persona de representante');
                // $('#div-representante').html(" {!! @include('representante._form',['tipo' => 'Representante']) !!} ");
                $('#div-representante').css('display', 'block');
                break;
            default:
                console.log('ninguno');
                break;
        }
    });

    $('#cedulaMadre').change(function(event) {
        generarCedulaAlumno();
    });

    $('input[name=fechaNacimientoAlumno]').change(function(event) {
        generarCedulaAlumno();
    });

});

function generarCedulaAlumno() {
    var cedulaAlumno = '';
    var cedulaMadre = $('#cedulaMadre').val();
    var fechaNacimiento = $('input[name=fechaNacimientoAlumno]').val();

    fechaNacimiento = fechaNacimiento.substring( fechaNacimiento.length - 2 );
    cedulaAlumno = 'V' + fechaNacimiento + cedulaMadre;    
    $('input[name=cedulaAlumno]').val(cedulaAlumno);
}

// {!! json_encode(Form::getValueAttribute('timezone')) !!}