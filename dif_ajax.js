function calculardif(){
    var hora_inicio = document.getElementById("hora_desde").value
    var hora_final = document.getElementById("hora_hasta").value
    
    // Expresión regular para comprobar formato
    var formatohora = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
    
    // Si algún valor no tiene formato correcto sale
    if (!(hora_inicio.match(formatohora)
          && hora_final.match(formatohora))){
      return;
    }
    
    // Calcula los minutos de cada hora
    var minutos_inicio = hora_inicio.split(':')
      .reduce((p, c) => parseInt(p) * 60 + parseInt(c));
    var minutos_final = hora_final.split(':')
      .reduce((p, c) => parseInt(p) * 60 + parseInt(c));
    
    // Si la hora final es anterior a la hora inicial sale
    if (minutos_final < minutos_inicio) return;
    
    // Diferencia de minutos
    var diferencia = minutos_final - minutos_inicio;
    
    // Cálculo de horas y minutos de la diferencia
    var horas = Math.floor(diferencia / 60);
    var minutos = diferencia % 60;
    
    // $('#horas_justificacion_real').val(horas + ':'
    //   + (minutos < 10 ? '0' : '') + minutos);  
    document.getElementById("horas_justificacion_real").value = horas + ':' + (minutos < 10 ? '0' : '') + minutos
  }
