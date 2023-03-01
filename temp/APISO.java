//package com.app.ws; //Esta es la estructura de paquete creada

import java.io.*;
public class APISO
{
    ProcessBuilder processBuilder;
    String Processer;
    String FileMaker;

    public APISO()
    {
	Processer = "./Processer.sh";
	FileMaker = "./FileMaker.sh";

	processBuilder = new ProcessBuilder();
    }

    private String General_Execution(String[] Command)
    {
	processBuilder.command(Command);

	 try {
		Process process = processBuilder.start();

		StringBuilder output = new StringBuilder();

		BufferedReader reader = new BufferedReader(
				new InputStreamReader(process.getErrorStream()));

		String line;
		while ((line = reader.readLine()) != null) {
			output.append(line + "\n");
		}

		int exitVal = process.waitFor();
		//if (exitVal == 0) 
		{
			System.out.println(output);
			String out = output.toString();
			return out.substring(0,out.length()-1);
		} 
		//else 
		{
		//	System.out.println("ERROR");
		//	return null;
		}

	} 
	catch (IOException e) {e.printStackTrace();} 
	catch (InterruptedException e) {e.printStackTrace();}
	return null;

    }

    public String FromFile(String Type, String path)
    {
	String [] Command = {Processer, Type, path};
	return General_Execution(Command);
    }

    public String FromText(String Type,String txt) 
    {
	String Filename=Type+Integer.toString(txt.hashCode())+Long.toString(System.currentTimeMillis());
	String [] Command = {FileMaker,Filename,Type, txt};
	String FilePath = General_Execution(Command);
	return FromFile(Type,FilePath);
    }

}
