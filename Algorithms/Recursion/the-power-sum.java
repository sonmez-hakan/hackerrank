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

    private static int target;
    private static List<Integer> list = new ArrayList<>();

    private static void fillList(int pow)
    {
        int index = 1,
            value;
        do {
            value = (int)Math.pow(index, pow);
            list.add(value);
            index++;
        } while(value <= target);
    }

    private static int count(int index, int total)
    {
        int newTotal = total + list.get(index);
        if (newTotal == target) {
            return 1;
        } else if (newTotal > target) {
            return 0;
        }

        return count(index + 1, newTotal) + count(index + 1, total);
    }

    /*
     * Complete the 'powerSum' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER X
     *  2. INTEGER N
     */
    public static int powerSum(int X, int N) {
        target = X;
        fillList(N);

        return count(0, 0);
    }

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int X = Integer.parseInt(bufferedReader.readLine().trim());

        int N = Integer.parseInt(bufferedReader.readLine().trim());

        int result = Result.powerSum(X, N);

        bufferedWriter.write(String.valueOf(result));
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
