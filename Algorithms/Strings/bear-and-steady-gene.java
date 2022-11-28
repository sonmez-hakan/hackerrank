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
     * Complete the 'steadyGene' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts STRING gene as parameter.
     */

    public static int steadyGene(String gene) {
        HashMap<Character, Integer> hash = new HashMap<>();
        hash.put('A', 0);
        hash.put('T', 0);
        hash.put('C', 0);
        hash.put('G', 0);
        char c;
        int l = gene.length(),
            l4 = l / 4,
            x, y;
        for (x = 0; x < l; x++) {
            c = gene.charAt(x);
            hash.put(c,  hash.get(c) + 1);
        }

        int min = Integer.MAX_VALUE,
            value;
        x = 0; y = 0;
        while (x < l && y < l) {
            if (hash.values().stream().anyMatch(v -> v > l4)) {
                c = gene.charAt(y);
                value = hash.get(c);
                hash.put(c, value - 1);
                y++;
            } else {
                c = gene.charAt(x);
                value = hash.get(c);
                min = Math.min(min, y - x);
                hash.put(c, value + 1);
                x++;
            }
        }

        return min;
    }

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int n = Integer.parseInt(bufferedReader.readLine().trim());

        String gene = bufferedReader.readLine();

        int result = Result.steadyGene(gene);

        bufferedWriter.write(String.valueOf(result));
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
