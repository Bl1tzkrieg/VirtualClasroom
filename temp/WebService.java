package com.app.ws; //Esta es la estructura de paquete creada

import javax.ws.rs.*; //Importamos la librería para manejar RESTful

@Path("getMessage/{type}/{Lenguaje}/{Dato}") //Especificamos una ruta que se debe usar para invocar este método y un parámetro (tipo)
public class WebService
{
    APISO apiso = new APISO();
    @POST //Indicamos que este método se ejecutará al recibir una petición por get
    @Produces({"application/json", "application/json"}) //Indicamos que el tipo de salida es texto plano, XML, HTML o JSON
    public String mostrarMensaje(
	    @PathParam("type") String tipo,
	    @PathParam("Lenguaje") String Lenguaje,
	    @PathParam("Datos") String Datos
	    )//Método que recibe como parametro el valor de type en la URL
    {
	String retorno = "ERROR";
        if(tipo.equalsIgnoreCase("texto"))
        {
            retorno = apiso.FromText(Lenguaje,Datos);
        }
        if(tipo.equalsIgnoreCase("archivo"))
        {
	    retorno = apiso.FromFile(Lenguaje,Datos);
        }

	return "{\"value\":\""+retorno+"\"}";
    }
}
