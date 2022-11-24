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
     * Complete the 'hackerlandRadioTransmitters' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER_ARRAY x
     *  2. INTEGER k
     */

    public static int hackerlandRadioTransmitters(List<Integer> arr, int k) {
        int count = 0,
            last = -1,
            limit = 0,
            start = 0,
            size = arr.size();

        do {
            start = last + (last > - 1 ? k : 0) + 1;
            while (start < size) {
                if (arr.get(start) == 1) {
                    break;
                }
                start++;
            }

            last = -1;
            limit = Math.min(start + k, size - 1);
            for (int y = limit; y >= start; y--) {
                if (arr.get(y) == 1) {
                    last = y;
                    break;
                }
            }

            if (last == -1) {
                count = -1;
                break;
            }

            arr.set(last, 2);
            count++;
        } while (last + k < size);

        System.out.println(arr);
        return count;
    }

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        String[] firstMultipleInput = bufferedReader.readLine().replaceAll("\\s+$", "").split(" ");

        int n = Integer.parseInt(firstMultipleInput[0]);

        int k = Integer.parseInt(firstMultipleInput[1]);

        List<Integer> x = Stream.of(bufferedReader.readLine().replaceAll("\\s+$", "").split(" "))
            .map(Integer::parseInt)
            .collect(toList());

        int max = Collections.max(x);
        List<Integer> list = new ArrayList<>();
        for (int i = 0; i < max; i++) {
            list.add(x.contains(i + 1) ? 1 : 0);
        }

        System.out.println(list);
        int result = Result.hackerlandRadioTransmitters(list, k);

        bufferedWriter.write(String.valueOf(result));
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
