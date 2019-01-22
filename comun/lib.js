// JavaScript Document
function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp; 
}

function procesaAjax(callback,metodo,url,parametros){
	ajax=nuevoAjax();
	if(metodo=="GET") url += "?"+parametros;
	ajax.open(metodo, url, true);
	ajax.onreadystatechange=function(){ 
		if(ajax.readyState==4){
			if(ajax.status == 200) 
				callback(ajax.responseText);
		}
	}
	if(metodo=="POST"){
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');		
		ajax.send(parametros);
	}
	else
		ajax.send(null);
}
/* FUNCIONES GLOBALES ****************************************************************************************************************/
function telefono(campo){
	lgnumero=campo.value.length;
	if(lgnumero!=0){
		if(lgnumero!=9 || (campo.value.substring(0,1)!=6 && campo.value.substring(0,1)!=9)){
			campo.value="";
			campo.focus();
			alert("El numero de telefono no es valido");
			return false;
		} else return true;
	}else return true;
}
//elimina los espacios en blanco al principio y al final de la cadena y los intermedios
function eliminaBlancos(campo){
	var longcampo = campo.value.length;
	var valornuevo = campo.value;
	for (i=0;i<longcampo;i++){
		valornuevo=valornuevo.replace(/^ +| $/, "");//quitamos los blancos de inicio y fin
		valornuevo=valornuevo.replace(/[ ]+/g, " ");//quitamos los blancos intermedios
	}
	campo.value=valornuevo;
}
function solo_numeros(e,id)
{
	var tam;
	tam = id.value.length;
	// Solo admite numeros enteros.
	e=(window.event)? window.event : e;
	var tecla = (e.keyCode)? e.keyCode: e.charCode;
	if(((tecla>=48) && (tecla <= 57)) || (tecla==8) || (tecla==46) || (tecla==37) || (tecla==39))
	{
		return true;
	}
	return false;
}
function compruebaEmail(obj)
{
	obj.style.backgroundColor="#FFFFFF";
    var email = obj.value;
	if (email.length>0){
		if (email.indexOf('@',0) > 0 && email.indexOf('.',0) > 0)
		{
			if (email.indexOf(' ',0) != -1 || email.indexOf('/',0) != -1 
			 || email.indexOf(';',0) != -1 || email.indexOf('<',0) != -1
			 || email.indexOf('>',0) != -1 || email.indexOf('*',0) != -1
			 || email.indexOf('|',0) != -1 || email.indexOf('`',0) != -1
			 || email.indexOf('&',0) != -1 || email.indexOf('$',0) != -1
			 || email.indexOf('!',0) != -1 || email.indexOf('"',0) != -1
			 || email.indexOf(':',0) != -1)
			{
				obj.focus();
				obj.value="";
				alert("La direccion de correo-e no es valida");
				return false;
			}
			else
				return true;
		}
		else 
		{
			obj.focus();
			obj.value="";
			alert("La direccion de correo-e no es valida");
			return false;
		}
	}
}

function codigo_captcha(valor){
	ocultos=document.getElementById('filaCodigo');
	procesaAjax(function(){
					ocultos.innerHTML=arguments[0];		 
				},'GET',"/comun/valida_captcha.php","valor="+valor);
}
//****************************************************************************
// FIN FUNCIONES GLOBALES 

/* FUNCIONES CALENDARIO ****************************************************************************************************************/
function reescribirCalendario(dia,nuevo_mes,nuevo_anio,subcarpetas){
	ocultaActividades(); //Por si hay una actividad abierta del mes antiguo
	var cadena="dia="+dia+"&mes="+nuevo_mes+"&anio="+nuevo_anio+"&subcarpetas="+subcarpetas+"&CABECERAS";
	var url="";
	for(var i=0;i<subcarpetas;i++){
		url+="../";	
	}
	procesaAjax(function(){
					with(document.getElementById('calendario')){
						innerHTML=arguments[0];
					}
				},'GET',url+'calendario.php',cadena);
}

function muestraActividades(e,dia,mes,anio,subcarpetas){
	var ocultos=document.getElementById('actividad');
	var posx=0, posy=0;
	if(document.all){
		e = window.event;
	}
	if(e.pageX || e.pageY){
		posx = e.pageX;
		posy = e.pageY;
	}
	else if(e.clientX || e.clientY){
		posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
		posy = e.clientY + document.documentElement.scrollTop;
	}

	var cadena="DIA="+dia+"&MES="+mes+"&ANIO="+anio;
	var url="";
	for(var i=0;i<subcarpetas;i++){
		url+="../";	
	}
	procesaAjax(function(){
					with(ocultos){
						style.left=parseInt(posx-20)+'px';
						style.top=parseInt(posy-50)+'px';
						style.display="block";
						innerHTML=arguments[0];
					}
				},'GET',url+'actividadescalendario.php',cadena);	
}

function ocultaActividades(){
	document.getElementById('actividad').style.display="none";
	document.getElementById('actividad').innerHTML="";
}
//****************************************************************************
// FIN FUNCIONES CALENDARIO

function BuscarWeb(){
	var elem = document.getElementById('TEXTOBUSCAR');
	var cad = elem.value;
	
	if(cad.length<1) return false;
	else location.href="/menuderecho/buscador.php?CADENA="+cad;	
}

function guardarnoticia(titulo,texto,escritor,fecha,tiponoticia,tipoactividad,destacada,accion,idnoticia){
	if(titulo==""){ alert("Es obligatorio insertar un titulo"); return;}
	if(texto==""){ alert("No se pueden insertar noticias vacias"); return;}
	if(escritor=="0") {alert("Tienes que insertar el escritor"); return;}
	if(fecha==""){ alert("Tienes que insertar la fecha"); return;}
	if(tiponoticia=="0"){ alert("Tienes que insertar el tipo de noticia"); return;}
	if((tiponoticia=="2") && (tipoactividad=="0")){ alert("Tienes que insertar el tipo de actividad"); return;}
	if(destacada==true) destacada=1;
	else destacada=0;
	texto = texto.replace(/[&]/gi,"~");
	var cadena="titulo="+titulo+"&contenido="+texto+"&escritor="+escritor+"&fecha="+fecha+"&tiponoticia="+tiponoticia+"&tipoactividad="+tipoactividad+"&destacada="+destacada+"&accion="+accion+"&idnoticia="+idnoticia;
	procesaAjax(function(){
					alert(arguments[0]); //Muestra que se ha guardado correctamente
					if(accion=="0") document.location.href="/editor/index.php?OPCION=1";
					else document.location.href="/editor/modificar.php?OPCION=1&IDTEXTO="+idnoticia;
				},'POST','/administracion/insertarnoticia.php',cadena);	
}

function guardarcomentario(titulo,texto,fecha,opcion,idcomentario){
	if(titulo==""){ alert("Es obligatorio insertar un titulo"); return;}
	if(texto==""){ alert("No se pueden insertar noticias vacias"); return;}
	if(fecha==""){ alert("Tienes que insertar la fecha"); return;}
	texto = texto.replace(/[&]/gi,"~");
	var cadena="titulo="+titulo+"&contenido="+texto+"&fecha="+fecha+"&opcion="+opcion+"&idcomentario="+idcomentario;
	procesaAjax(function(){
					alert(arguments[0]); //Muestra que se ha guardado correctamente
					if(accion=="0") document.location.href="/editor/index.php?OPCION=2";
					else document.location.href="/editor/modificar.php?OPCION=2&IDTEXTO="+idcomentario;					
				},'POST','/administracion/insertarcomentario1.php',cadena);
}