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

class Point
{
    private int x;

    private int y;

    public Point(int x, int y)
    {
        this.x = x;
        this.y = y;
    }

    public boolean compare(Point p)
    {
        return this.x == p.x && this.y == p.y;
    }
}

class Result {

    private static List<List<Integer>> matrix = new ArrayList<>();

    private static int rowCount;

    private static int columnCount;

    private static List<List<Point>> points = new ArrayList<>();

    private static List<Point> newPoints = new ArrayList<>();

    private static boolean overlap(List<Point> list1, List<Point> list2)
    {
        for (Point p1: list1) {
            for (Point p2: list2) {
                if (p1.compare(p2)) {
                    return true;
                }
            }
        }

        return false;
    }

    private static boolean check(int x, int y, int step)
    {
        return x + step < rowCount && x - step >= 0
            && y + step < columnCount && y - step >= 0
            && matrix.get(x - step).get(y) == 1
            && matrix.get(x).get(y + step) == 1
            && matrix.get(x + step).get(y) == 1
            && matrix.get(x).get(y - step) == 1;
    }

    /*
     * Complete the 'twoPluses' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts STRING_ARRAY grid as parameter.
     */
    public static int twoPluses(List<String> grid) {
        rowCount = grid.size();
        columnCount = grid.get(0).length();

        for (int x = 0; x < rowCount; x++) {
            List<Integer> list = new ArrayList<>();
            for (int y = 0; y < columnCount; y++) {
                list.add(grid.get(x).charAt(y) == 'G' ? 1 : 0);
            }
            matrix.add(list);
        }

        int maxLength = (Math.min(rowCount, columnCount) + 1) / 2;
        for (int x = 0; x < rowCount; x++) {
            for (int y = 0; y < columnCount; y++) {
                if (matrix.get(x).get(y) == 0) {
                    continue;
                }

                newPoints = new ArrayList<>();
                newPoints.add(new Point(x, y));
                for (int z = 1; z < maxLength; z++) {
                    if (check(x, y, z)) {
                        newPoints.add(new Point(x - z, y));
                        newPoints.add(new Point(x, y + z));
                        newPoints.add(new Point(x + z, y));
                        newPoints.add(new Point(x, y - z));
                    } else {
                        break;
                    }
                }
                System.out.println(x + " " + y + " " + newPoints.size());
                points.add(newPoints);
            }
        }

        int max = Integer.MIN_VALUE,
            tmp;
        for (int x = 0, l = points.size(); x < l - 1; x++) {
            for (int y = 0; y < l; y++) {
                tmp = points.get(x).size() * points.get(y).size();
                if (tmp > max && !overlap(points.get(x), points.get(y))) {
                    max = tmp;
                }
            }
        }

        return max;
    }

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        String[] firstMultipleInput = bufferedReader.readLine().replaceAll("\\s+$", "").split(" ");

        int n = Integer.parseInt(firstMultipleInput[0]);

        int m = Integer.parseInt(firstMultipleInput[1]);

        List<String> grid = IntStream.range(0, n).mapToObj(i -> {
            try {
                return bufferedReader.readLine();
            } catch (IOException ex) {
                throw new RuntimeException(ex);
            }
        })
            .collect(toList());

        int result = Result.twoPluses(grid);

        bufferedWriter.write(String.valueOf(result));
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
