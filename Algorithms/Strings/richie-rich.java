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

class Result
{
    /*
     * Complete the 'highestValuePalindrome' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts following parameters:
     *  1. STRING s
     *  2. INTEGER n
     *  3. INTEGER k
     */
    public static String highestValuePalindrome(String s, int n, int k) {
        int c1, c2, c3, c4,
            x, y,
            length = n - 1,
            half = (n + 1) / 2;

        StringBuilder s2 = new StringBuilder(s);

        for (x = 0, y = length; x < half; x++, y--) {
            c1 = Integer.parseInt(String.valueOf(s.charAt(x)));
            c2 = Integer.parseInt(String.valueOf(s.charAt(y)));

            if (c1 != c2) {
                k--;
                if (c1 > c2) {
                    s2.setCharAt(y, s.charAt(x));
                } else {
                    s2.setCharAt(x, s.charAt(y));
                }
            }
        }

        if (k < 0) {
            return "-1";
        }

        x = 0;
        y = length;
        while (k > 0 && x < y) {
            c1 = s.charAt(x);
            c2 = s.charAt(y);
            c3 = s2.charAt(x);
            c4 = s2.charAt(y);
            if (c3 != '9') {
                if (c3 != c1 || c4 != c2) {
                    k--;
                } else if (k >= 2) {
                    k -= 2;
                } else {
                    break;
                }

                s2.setCharAt(x, '9');
                s2.setCharAt(y, '9');
            }
            x++;
            y--;
        }

        if (k > 0 && n % 2 == 1) {
            s2.setCharAt(half - 1, '9');
        }

        return s2.toString();
    }

}

public class Solution
{
    public static void main(String[] args) throws IOException
    {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        String[] firstMultipleInput = bufferedReader.readLine().replaceAll("\\s+$", "").split(" ");

        int n = Integer.parseInt(firstMultipleInput[0]);

        int k = Integer.parseInt(firstMultipleInput[1]);

        String s = bufferedReader.readLine();

        String result = Result.highestValuePalindrome(s, n, k);

        bufferedWriter.write(result);
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
