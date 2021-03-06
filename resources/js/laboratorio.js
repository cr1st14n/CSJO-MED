function showModSelectTipoPro() {  
    $('#form-selectTipoLab').trigger('reset');
    $('#md_selectTipoPro').modal('show');
}

function showContent(form) {
    console.log(form);
    element = document.getElementById(form);
    check = document.getElementById('check_'+form);
    if (check.checked) {
        element.style.display='block';
    }
    else {
        element.style.display='none';
    }
}