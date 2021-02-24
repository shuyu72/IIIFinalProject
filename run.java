ckage com.xiaoxian.test;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
public class Test2 {
public static void main(String[] args) throws IOException, InterruptedException {
System.out.println("start python");
//需傳入的引數
String a = "aaa", b = "bbb", c = "cccc", d = "dddd";
//設定命令列傳入的引數
//		String[] arg = new String[]{"python", "pyfile/test2.py", a, b, c, d};
String[] arg = new String[]{"python", "crawl_china_times7.py"};
Process pr = Runtime.getRuntime().exec(arg);
BufferedReader in = new BufferedReader(new InputStreamReader(pr.getInputStream()));  
String line;  
while ((line = in.readLine()) != null) {  
//            line = decodeUnicode(line);  
System.out.println(line);  
}  
in.close();  
System.out.println("end");
pr.waitFor();
}
}
