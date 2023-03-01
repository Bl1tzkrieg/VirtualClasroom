public class Main
{
    public static void main(String [] argv)
    {
	APISO apiso = new APISO("");
//	apiso.FromText("python","print(\"lol\")");
	apiso.FromText("C","#include<stdio.h>\n#include<stdlib.h>\nint main(){printf(\"Hola mundo\\n\");return EXIT_SUCCESS;}");
    }
}
