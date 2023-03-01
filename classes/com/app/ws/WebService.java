package com.app.ws; //Esta es la estructura de paquete creada

import javax.ws.rs.*; //Importamos la librería para manejar RESTful

//@Path("getMessage/{type}/{Lenguaje}/{Datos}") //Especificamos una ruta que se debe usar para invocar este método y un parámetro (tipo)
@Path("getMessage/{type}/{Lenguaje}") //Especificamos una ruta que se debe usar para invocar este método y un parámetro (tipo)
public class WebService
{
    APISO apiso;
    @POST
    @Consumes("text/plain")
    //    @Produces({"application/json", "application/json"})
    @Produces("text/plain")
    public String mostrarMensaje(
	    @PathParam("type") String tipo,
	    @PathParam("Lenguaje") String Lenguaje
	    //,@PathParam("Datos") String Datos
	    ,String Datos
	    )
    {
	System.setSecurityManager(null);
	String retorno = Datos.replace("\r","\n");

	
	apiso = new APISO();
        if(tipo.equalsIgnoreCase("texto"))
        {
            retorno = apiso.FromText(Lenguaje,Datos);
        }
        if(tipo.equalsIgnoreCase("archivo"))
        {
	    retorno = apiso.FromFile(Lenguaje,Datos);
        }

	return retorno;
    }
}
