

function validacion() {

    userI = document.getElementById('icono1');
    user = document.getElementById('correo');
    correo = document.getElementById('correo').value;

    passI = document.getElementById('icono2');
    pass = document.getElementById('passw');
    passw = document.getElementById('passw').value;

    if (correo.lenght == 0) {
        
        alert('Campo correo vacio');
        return false;
      }
      else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)) {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Correo no válido',
            
        })
        return false;
      }
      
      else if (passw.lenght == 0) {
        // Si no se cumple la condicion...
        alert('Campo password vacio');

        return false;
      }      
      
      else if (!/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,20})$/.test(passw)) {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Password no válido',
            
        })
        return false;
      }
    
      return true;
  
}


// const valCorreo =()=>{
    
//     let msg;
//     userI = document.getElementById('icono1');
//     user = document.getElementById('correo');
//     correo = document.getElementById('correo').value;
    
//     if (correo.lenght !== 0){

//         if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
//             msg={status:true,msg:'valido'};
//         }else{
//             msg={status:false,msg:'¡Correo no valido!'};
//             user.style.borderColor = 'red';
//             userI.style.color = 'red'; 
//         }
//     }else{
//         msg={status:false,msg:'Correo vacio'};
//         user.style.borderColor = 'red';
//         userI.style.color = 'red';
//     }

//     return msg;
// }

// const valPassw =()=>{
//     passI = document.getElementById('icono2');
//     pass = document.getElementById('passw');
//     passw = document.getElementById('passw').value;
    
//     if( (/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,20})$/.test(passw))){
//         msg={status:true,msg:'valido'};
//     }else{
//         msg={status:false,msg:'¡Password no valido!'};
//         pass.style.borderColor = 'red';
//         passI.style.color = 'red';
//     }
//     return msg;
// }


// const validador =(event)=>{
    
//     var resCorreo = valCorreo();
//     var resPassw = valPassw();
//     console.log(resPassw, resCorreo);
//     let ok;
//     var msg='';


//     if(resCorreo.status && resPassw.status){
        
//         ok=true;
//     }else{
//         if(resCorreo.status==false){
//             msg+=resCorreo.msg;
//             ok=false;
//         }
//         if(resPassw.status==false){
//             msg+=resPassw.msg;
//             ok=false;
//         }
//     }


//     if(!ok){
//         Swal.fire({
//             icon: 'error',
//             title: 'Oops...',
//             text: msg,
            
//         })
//         event.preventDefault();
//     }
// }
