<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/jquery-1.12.4.js" type="text/javascript" charset="UTF-8"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/jquery-latest.js" type="text/javascript" charset="UTF-8"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/bootstrapValidator.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/validacion_sistemas.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/highlight.pack.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/base.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/bootstrap-select.min.js" type="text/javascript"></script>

<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/jquery.ui.core.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/jquery.ui.position.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/jquery.ui.autocomplete.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/cmxforms.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/jquery.metadata.js" type="text/javascript"></script>

<script>
$(function() {
    $("#fecha").datepicker(
        {
            dateFormat: "dd/mm/yy",
            dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            firstDay: 1,
            gotoCurrent: true,
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        }
    );
});
</script>
<script>
$(function() {
    $("#fecha_ingreso").datepicker(
        {
            dateFormat: "dd/mm/yy",
            dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            firstDay: 1,
            gotoCurrent: true,
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        }
    );
});
</script>


<!-- 

<script>
$( function() {
  $( "#fnacimiento" ).datepicker({
    changeMonth: true,
    changeYear: true
  });
} );
</script>
<script>
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant',
 nextText: 'Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#fnacimiento").datepicker();
});
</script>

-->
