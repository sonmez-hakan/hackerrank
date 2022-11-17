import java.io.*;
import java.math.*;
import java.security.*;
import java.text.*;
import java.util.*;
import java.util.concurrent.*;
import java.util.function.*;
import java.util.regex.*;
import java.util.stream.*;
import static java.util.stream.Collectors.joining;
import static java.util.stream.Collectors.toList;

class Result {

    /*
     * Complete the 'fibonacciModified' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER t1
     *  2. INTEGER t2
     *  3. INTEGER n
     */
    public static String fibonacciModified(int t1, int t2, int n)
    {
        if (n == 1) {
            return String.valueOf(t1);
        }

        if (n == 2) {
            return String.valueOf(t2);
        }

        BigInteger b1 = BigInteger.valueOf(t1);
        BigInteger b2 = BigInteger.valueOf(t2);
        BigInteger b3;
        for (int x = 2; x < n; x++) {
            b3 = b1.add(b2.pow(2));
            b1 = b2;
            b2 = b3;
        }

        return b2.toString();
    }
}

public class Solution
{
    public static void main(String[] args) throws IOException
    {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        String[] firstMultipleInput = bufferedReader.readLine().replaceAll("\\s+$", "").split(" ");

        int t1 = Integer.parseInt(firstMultipleInput[0]);

        int t2 = Integer.parseInt(firstMultipleInput[1]);

        int n = Integer.parseInt(firstMultipleInput[2]);

        String result = Result.fibonacciModified(t1, t2, n);

        bufferedWriter.write(result);
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
