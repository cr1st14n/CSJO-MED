function notif(tipo, texto) {
    var data = new Array();
    switch (tipo) {
      case "1":
        // data.verticalEdge='right';
        // data.horizontalEdge='top';
        data.life = 3000;
        data.theme = "theme-inverse";
        $.notific8(texto, data);
        break;
      case "2":
        data.life = 3000;
        data.theme = "danger";
        $.notific8(texto, data);
        break;
      case "3":
        data.life = 3000;
        data.theme = "primary";
        $.notific8(texto, data);
        break;
      case "4":
        data.life = 5000;
        data.theme = "inverse";
        $.notific8(texto, data);
        break;
      case "5":
        data.life = 3000;
        $.notific8(texto, data);
        break;
    }
  }
  function veriNull(texto) {
    if (texto == null || texto.length == 0) {
      return "";
    } else {
      return texto;
    }
  }
  function validar(id) {
    var elemento = document.getElementById(id);
    if (elemento.length != 0) {
      if (elemento.checkValidity()) {
        elemento.style.borderColor = "";
        elemento.style.backgroundColor = "";
      } else if (elemento.value == "") {
        elemento.style.borderColor = "";
        elemento.style.backgroundColor = "";
      } else {
        elemento.style.borderColor = "red";
        elemento.style.backgroundColor = "#ffd3d3";
      }
    }
  }

  //* Crear variable token 
  var token = $('meta[name=csrf-token]').attr('content');
  // _token: $('meta[name=csrf-token]').attr('content'),


