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

    static PriorityQueue<Integer> minHeap = new PriorityQueue<>();
    static PriorityQueue<Integer> maxHeap = new PriorityQueue<>(Collections.reverseOrder());

    protected static boolean add(double median, int num)
    {
         return median > num ? maxHeap.add(num) : minHeap.add(num);
    }

    protected static boolean resize()
    {
        int maxHeapSize = maxHeap.size(),
            minHeapSize = minHeap.size();

        if (maxHeapSize - minHeapSize > 1) {
            return minHeap.add(maxHeap.poll());
        }

        if(minHeapSize - maxHeapSize > 1) {
            return maxHeap.add(minHeap.poll());
        }

        return false;
    }

    protected static double median()
    {
        int maxHeapSize = maxHeap.size(),
            minHeapSize = minHeap.size();

        if (minHeapSize == maxHeapSize) {
            return (minHeap.peek() + maxHeap.peek()) / 2.0;
        }

        if (minHeapSize > maxHeapSize) {
            return minHeap.peek();
        }

        return maxHeap.peek();
    }

    /*
     * Complete the 'runningMedian' function below.
     *
     * The function is expected to return a DOUBLE_ARRAY.
     * The function accepts INTEGER_ARRAY a as parameter.
     */

    public static List<Double> runningMedian(List<Integer> a) {

        List<Double> medians = new ArrayList();
        
        double median = 0.0;
        for(int x = 0; x < a.size(); x++){
            Result.add(median, a.get(x))
            Result.resize();
            median = Result.median();
            medians.add(median);
        }
        
        return medians;
    }
}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int aCount = Integer.parseInt(bufferedReader.readLine().trim());

        List<Integer> a = IntStream.range(0, aCount).mapToObj(i -> {
            try {
                return bufferedReader.readLine().replaceAll("\\s+$", "");
            } catch (IOException ex) {
                throw new RuntimeException(ex);
            }
        })
            .map(String::trim)
            .map(Integer::parseInt)
            .collect(toList());

        List<Double> result = Result.runningMedian(a);

        bufferedWriter.write(
            result.stream()
                .map(Object::toString)
                .collect(joining("\n"))
            + "\n"
        );

        bufferedReader.close();
        bufferedWriter.close();
    }
}
