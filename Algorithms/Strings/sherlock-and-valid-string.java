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
     * Complete the 'isValid' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts STRING s as parameter.
     */
    public static String isValid(String s)
    {
        HashMap<Character, Integer> hash = new HashMap<>();
        char c;
        for (int x= 0, l = s.length(); x < l; x++) {
            c = s.charAt(x);
            hash.put(c, hash.get(c) == null ? 1 : hash.get(c) + 1);
        }

        String result = "YES";
        boolean removable = true;
        int last = hash.get(s.charAt(0)),
            value,
            diff,
            count = 0;

        hash.remove(s.charAt(0));
        for (Map.Entry<Character, Integer> e: hash.entrySet()) {
            count++;
            value = e.getValue();
            diff = last - value;

            if (diff == 0) {
                continue;
            }

            if (!removable) {
                result = "NO";
                break;
            }
            removable = false;

            if (diff == -1) {
                continue;
            }

            if (diff == 1) {
                if (count > 1) {
                    if (value == 1) {
                        continue;
                    }

                    result = "NO";
                    break;
                }

                last = value;
                continue;
            } else if (value == 1) {
                continue;
            }

            result = "NO";
            break;
        }

        return result;
    }
}

public class Solution
{
    public static void main(String[] args) throws IOException
    {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        String s = bufferedReader.readLine();

        String result = Result.isValid(s);

        bufferedWriter.write(result);
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
