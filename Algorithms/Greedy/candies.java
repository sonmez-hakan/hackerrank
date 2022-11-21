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
     * Complete the 'candies' function below.
     *
     * The function is expected to return a LONG_INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. INTEGER_ARRAY arr
     */
    public static long candies(int n, List<Integer> arr)
    {
        int[] candies = new int[n];
        for (int x = 0; x < n; x++) {
            candies[x] = 1;
        }

        for (int x = 1; x < n; x++) {
            if (arr.get(x) > arr.get(x - 1)){
                candies[x] += candies[x - 1];
            }
        }

        for (int x = n - 2; x > -1; x--) {
            if (arr.get(x) > arr.get(x + 1) && candies[x] <= candies[x + 1]) {
                candies[x] = candies[x + 1] + 1;
            }
        }

        long count = 0;
        for (int x = 0; x < n; x++) {
            count += candies[x];
        }

        return count;
    }
}

public class Solution
{
    public static void main(String[] args) throws IOException
    {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int n = Integer.parseInt(bufferedReader.readLine().trim());

        List<Integer> arr = IntStream.range(0, n).mapToObj(i -> {
            try {
                return bufferedReader.readLine().replaceAll("\\s+$", "");
            } catch (IOException ex) {
                throw new RuntimeException(ex);
            }
        })
            .map(String::trim)
            .map(Integer::parseInt)
            .collect(toList());

        long result = Result.candies(n, arr);

        bufferedWriter.write(String.valueOf(result));
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
