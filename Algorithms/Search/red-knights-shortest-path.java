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
     * Complete the 'printShortestPath' function below.
     *
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. INTEGER i_start
     *  3. INTEGER j_start
     *  4. INTEGER i_end
     *  5. INTEGER j_end
     */

    public static void printShortestPath(int n, int i_start, int j_start, int i_end, int j_end) {
        int iDiff = i_end - i_start,
            jDiff = j_end - j_start,
            absIdiff = Math.abs(iDiff),
            absJdiff = Math.abs(jDiff);

        if (absIdiff % 2 != 0) {
            System.out.println("Impossible");

            return;
        }

        if (absJdiff == 0 && absIdiff % 4 != 0) {
            System.out.println("Impossible");

            return;
        }

        int iStepCount = absIdiff / 2;
        if (absJdiff % 2 == 1 && iStepCount % 2 != 1) {
            System.out.println("Impossible");

            return;
        }

        String[] directions = new String[] {"UR", "UL", "R", "LR", "LL", "L"};

        HashMap<String, Integer> result = new HashMap<>();
        for (String direction: directions) {
            result.put(direction, 0);
        }

        int count = 0;
        String step;
        while (iDiff != 0 || jDiff != 0) {
            step = "";
            if (iDiff > 0) {
                step  += "L";
                iDiff -= 2;
            } else if (iDiff < 0) {
                step += "U";
                iDiff += 2;
            }

            if (jDiff >= 0) {
                jDiff -= step.compareTo("") == 0 ? 2 : 1;
                step += "R";
            } else {
                jDiff += step.compareTo("") == 0 ? 2 : 1;
                step += "L";
            }

            count++;
            result.put(step, result.get(step) + 1);
        }

        String str = "";
        for (String direction: directions) {
            str += new String(new char[result.get(direction)]).replace("\0", direction + " ");
        }

        System.out.println(count);
        System.out.println(str.trim());
    }

}

public class Main {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));

        int n = Integer.parseInt(bufferedReader.readLine().trim());

        String[] firstMultipleInput = bufferedReader.readLine().replaceAll("\\s+$", "").split(" ");

        int i_start = Integer.parseInt(firstMultipleInput[0]);

        int j_start = Integer.parseInt(firstMultipleInput[1]);

        int i_end = Integer.parseInt(firstMultipleInput[2]);

        int j_end = Integer.parseInt(firstMultipleInput[3]);

        Result.printShortestPath(n, i_start, j_start, i_end, j_end);

        bufferedReader.close();
    }
}