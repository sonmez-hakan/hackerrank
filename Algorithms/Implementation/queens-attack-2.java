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

    static HashSet<String> hash = new HashSet<>();

    static int qx;

    static int qy;

    static int n;

    protected static int countCells(int stepX, int stepY)
    {
        int x = qx,
            y = qy,
            limitX = stepX < 0 ? 0 : n + 1,
            limitY = stepY < 0 ? 0 : n + 1;

        int count = 0;
        do {
            x += stepX;
            y += stepY;

            if (hash.contains(x + "-" + y)) {
                break;
            }

            if (x == limitX || y == limitY) {
                break;
            }

            count++;
        } while (true);

        return count;
    }

    /*
     * Complete the 'queensAttack' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. INTEGER k
     *  3. INTEGER r_q
     *  4. INTEGER c_q
     *  5. 2D_INTEGER_ARRAY obstacles
     */
    public static int queensAttack(int n, int k, int r_q, int c_q, List<List<Integer>> obstacles)
    {
        Result.n = n;
        Result.qx = r_q;
        Result.qy = c_q;
        for (List<Integer> obstacle: obstacles) {
            hash.add(obstacle.get(0) + "-" + obstacle.get(1));
        }

        return countCells(1, 0)
            + countCells(-1, 0)
            + countCells(0, 1)
            + countCells(0, -1)
            + countCells(1, 1)
            + countCells(1, -1)
            + countCells(-1, 1)
            + countCells(-1, -1);
    }
}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        String[] firstMultipleInput = bufferedReader.readLine().replaceAll("\\s+$", "").split(" ");

        int n = Integer.parseInt(firstMultipleInput[0]);

        int k = Integer.parseInt(firstMultipleInput[1]);

        String[] secondMultipleInput = bufferedReader.readLine().replaceAll("\\s+$", "").split(" ");

        int r_q = Integer.parseInt(secondMultipleInput[0]);

        int c_q = Integer.parseInt(secondMultipleInput[1]);

        List<List<Integer>> obstacles = new ArrayList<>();

        IntStream.range(0, k).forEach(i -> {
            try {
                obstacles.add(
                    Stream.of(bufferedReader.readLine().replaceAll("\\s+$", "").split(" "))
                        .map(Integer::parseInt)
                        .collect(toList())
                );
            } catch (IOException ex) {
                throw new RuntimeException(ex);
            }
        });

        int result = Result.queensAttack(n, k, r_q, c_q, obstacles);

        bufferedWriter.write(String.valueOf(result));
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
