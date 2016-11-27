function comprobarAcciones(campo){
var pat =/^Gestión de [A-Za-z]{3}[A-Za-z]*/i;
var long =campo.value.length;
if(long > 45){
	alert('El campo no puede ser de una longitud mayor de 45 caracteres');
}
if(!campo.value.match(pat)){
	alert('Valor incorrecto. Tiene que ser Gestión de XXXX');
}
}



function comprobarDatosAcciones(){
	var form = document.forms[0];
	var action = form.anomb.value;
if(!formAcciones(action)){
	alert('Hay datos incorrectos');
	return false;
	}
return true;
}

function formAcciones(campo){
var pat =/^Gestión de [A-Za-z]{3}[A-Za-z]*/i;
var long =campo.length;
if(long > 45){
	return false;
	}
if(!campo.match(pat)){
	return false;
	}
return true;
}

function comprobarDatosCont(campo){
	var form=document.forms[0];
	var con= form.cont.value;
	if(!formCont(con)){
		alert('Hay datos incorrectos');
		return false;
	}
	return true;
}

function formCont(campo){
	var form=document.forms[0];
	var long=campo.length;
	if(long > 16){
		alert('Hay datos incorrectos');
		return false;
	}
	if(!(campo.match(pat))){
			alert('Nombre de controlador incorrecto');
			return false;
	}
	return true;
}

function comprobarNombreCont(campo){
	var pat = /^GEST_[A-Za-z_]{3}[A-Za-z_]+$/i;
	var long = campo.value.length;
	var ret = campo.value.toUpperCase();
	if(long > 16){
		alert('Nombre demasiado largo');
	}
	if(!(ret.match(pat))){
			alert('Nombre de controlador incorrecto');
		}
	campo.value=ret;
}



function comprobarDatos(){
	var form=document.forms[0];
	var nom = form.usr.value;
	var dni = form.dni.value;
	var clave1 = form.password1.value; 
	var clave2 = form.password2.value;
	if((!formUsuario(nom)) || (!formDNI(dni))|| (!formContraseña(clave1)) || (!formContraseña(clave2)) || (!formIgualdad())){
		alert("Hay datos incorrectos");
		return false;
	}
	return true;
}

function formUsuario(ram){
	var pat = /^[A-Za-z](\w+)$/i;
	var long = ram.length;
	if(long < 4){
		alert("Hay datos incorrectos");
		return false;
	}
	else if(long > 14){
		alert("Hay datos incorrectos");
		return false;
	}
	else{
		if(!(ram.match(pat))){
			alert("Hay datos incorrectos");
			return false;
		}
		return true;
	}
}

function formContraseña(ram){
	var pat = /^(\w+)$/i;
	var long = ram.length;
	if(long < 5){
		alert("Hay datos incorrectos");
		return false;
	}
	else if(long > 16){
		alert("Hay datos incorrectos");
		return false;
	}	
	else{
		if(!(ram.match(pat))){
			alert("Hay datos incorrectos");
			return false;
		}
		return true;
	}
}

function formIgualdad(){
	var form=document.forms[0];
	var clave1 = form.password1.value; 
	var clave2 = form.password2.value;
	//alert(clave1 + "-" + clave2);
	
    if (clave1.localeCompare(clave2)){
    	alert("Hay datos incorrectos");
       return false;
    }
    return true;
}



function comprobarUsuario(campo){
	var pat = /^[A-Za-z](\w+)$/i;
	var long = campo.value.length;
	if(long < 4){
		alert('El usuario tiene que tener como mínimo 4 letras');
	}
	else if(long > 14){
		alert('El usuario tiene que tener como máximo 14 letras');	
	}
	else{
		if(!(campo.value.match(pat))){
			alert('Nombre de usuario invalido');
		}
	}
}

function comprobarPerfil(campo){
	var pat = /^[A-Za-z](\w+)$/i;
	var long = campo.value.length;
	if(long < 4){
		alert('El perfil tiene que tener como mínimo 4 letras');
	}
	else if(long > 14){
		alert('El perfil tiene que tener como máximo 14 letras');	
	}
	else{
		if(!(campo.value.match(pat))){
			alert('Nombre de perfil invalido');
		}
	}
}

function comprobarDatosPerfil(){
	var form=document.forms[0];
	var nom = form.perfil.value;
	if(!formUsuario(nom)){
		alert("Hay datos incorrectos");
		return false;
	}
	return true;
}

function comprobarContraseña(campo){
	var pat = /^(\w+)$/i;
	var long = campo.value.length;
	if(long < 5){
		alert('La contraseña tiene que tener entre 5 y 16 caracteres');
	}
	else if(long > 16){
		alert('La contraseña tiene que tener entre 5 y 16 caracteres');
	}	
	else{
		if(!(campo.value.match(pat))){
			alert('contraseña invalida');
		}
	}
}

function comprobarIgualdad(){
	var form=document.forms[0];
	var clave1 = form.password1.value; 
	var clave2 = form.password2.value;
	//alert(clave1 + "-" + clave2);
	
    if (clave1.localeCompare(clave2)){
       alert("Las dos claves son distintas");
    }
}

function formDNI(campo){
	var pat = /^[0-9]{8}[A-Za-z]$/i;
	if(!(campo.match(pat))){
		alert('Hay datos incorrectos');
		return false;
	}
	else{
		return true;
	}
}

function comprobarNombre(campo){
	var patt = /^[A-Za-z]+(\s[A-Za-z][A-Za-z]+){0,1}$/i; 
	var long = campo.value.length;

	if(long < 2){
		alert('El valor introducido es demasiado corto');
	}
	else if(long > 25){
		alert('El valor introducido es demasiado largo');
	}
	else{
		if(!(campo.value.match(patt))){
		alert('Este campo solo puede estar formado por letras');
		}
	}
	campo.value = MaysPrimera(campo.value);
}

function MaysPrimera(string){
	var res = string.toLowerCase();
	var pat = /\s/;
	var ele = res.search(pat);
	if(ele == -1){
  		return res.charAt(0).toUpperCase() + res.slice(1);
	}
	else{
		var re = res.substring(0,ele);
		var es = res.substring(ele +1,res.length);
		return re.charAt(0).toUpperCase() + re.slice(1) + " " + es.charAt(0).toUpperCase() + re.slice(1); 
	}
}

function comprobarEmail(campo){
	var pat = /^(\w+)@(\w+)(\.(\w+)){1,2}$/i;
	//if(campo.value.length <32)
	if(!(campo.value.match(pat))){
		alert('No ha introducido un email');
	}

}

function comprobarDNI(campo){
	var pat = /^[0-9]{8}[A-Za-z]$/i;
	if(!(campo.value.match(pat))){
		alert('DNI incorrecto. Un DNI está formado por 8 números y una letra');
	}
	else{
		var NIF = campo.value.substring(0,8);
		var letra = campo.value.charAt(8).toUpperCase();
		campo.value = NIF + letra;
	}

}

function comprobarCP(campo){
	var pat = /^[0-9]{5}$/i;
	if(!(campo.value.match(pat))){
		alert('CP incorrecto. Un CP está formado por 5 números');
	}
}
//Solo españa//
function comprobarCuenta(campo){
	var pat = /^[A-Za-z]{2}[0-9]{2}-[0-9]{4}-[0-9]{4}-[0-9]{2}-[0-9]{10}$/i;
	if(!(campo.value.match(pat))){
		alert('Nº de cuenta incorrecto. Ej: ES11-0000-0000-00-1234567890')
	}
	var dig = campo.value.substring(0,2).toUpperCase();
	campo.value = dig + campo.value.substring(2,campo.value.length);
}


