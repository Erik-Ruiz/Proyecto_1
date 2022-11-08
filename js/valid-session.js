var session = document.getElementById('session').value;

if (session=='1'){

    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No es posible iniciar sesion, prueba otra vez.',
        
    })

}

if (session=='2'){

    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Algo esta fallando',
        
    })

}