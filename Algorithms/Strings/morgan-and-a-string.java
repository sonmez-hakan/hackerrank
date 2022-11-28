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
     * Complete the 'morganAndString' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts following parameters:
     *  1. STRING a
     *  2. STRING b
     */
    public static String morganAndString(String a, String b) {
        int aIndex = 0,
            bIndex = 0,
            aLimit = a.length(),
            bLimit = b.length(),
            compare;
        a += "z";
        b += "z";
        String tmpA = null, tmpB = null;
        StringBuilder result = new StringBuilder();
        Character aChar, bChar;
        while (aIndex < aLimit && bIndex < bLimit) {
            aChar = a.charAt(aIndex);
            bChar = b.charAt(bIndex);

            if (aChar > bChar) {
                result.append(bChar);
                bIndex++;
                tmpB = null;
            } else if (aChar < bChar) {
                result.append(aChar);
                aIndex++;
                tmpA = null;
            } else {
                if (tmpA == null) {
                    tmpA = a.substring(aIndex);
                }
                if (tmpB == null) {
                    tmpB = b.substring(bIndex);
                }

                compare = tmpA.compareTo(tmpB);
                if (compare <= 0) {
                    result.append(aChar);
                    aIndex++;
                } else {
                    result.append(bChar);
                    bIndex++;
                }
            }
        }

        if (aIndex < aLimit) {
            result.append(a.substring(aIndex, aLimit));
        }

        if (bIndex < bLimit) {
            result.append(b.substring(bIndex, bLimit));
        }

        return result.toString();

    }

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int t = Integer.parseInt(bufferedReader.readLine().trim());

        IntStream.range(0, t).forEach(tItr -> {
            try {
                String a = bufferedReader.readLine();

                String b = bufferedReader.readLine();

                String result = Result.morganAndString(a, b);

                bufferedWriter.write(result);
                bufferedWriter.newLine();
            } catch (IOException ex) {
                throw new RuntimeException(ex);
            }
        });

        bufferedReader.close();
        bufferedWriter.close();
    }
}
