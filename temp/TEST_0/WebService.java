package com.app.ws; //Esta es la estructura de paquete creada

import javax.ws.rs.*;//Importamos la librería para manejar RESTful

@Path("getMessage/{type}") //Especificamos una ruta que se debe usar para invocar este método y un parámetro (tipo)
public class WebService
{
    @POST //Indicamos que este método se ejecutará al recibir una petición por get
    @Produces({"text/plain", "text/html","text/xml", "application/json"}) //Indicamos que el tipo de salida es texto plano, XML, HTML o JSON
    public String mostrarMensaje(@PathParam("type") String tipo)//Método que recibe como parametro el valor de type en la URL
    {
        if(tipo.equalsIgnoreCase("texto"))
        {
            return "LOLOLOLOL";
        }
        else if (tipo.equalsIgnoreCase("html"))
        {
            return "LOLOLOLOL";
        }
        else if(tipo.equalsIgnoreCase("xml"))
        {
            return "<?xml version='1.0' encoding='UTF-8'?><root><value>Éste es mi primer servicio RESTful con Java</value></root>";
        }
        else if(tipo.equalsIgnoreCase("json"))
        {
            return "{\"value\":\"Éste es mi primer servicio RESTful con Jva\"}";
        }
        else
        {
            return "Tipo no soportado";
        }
    }
}
