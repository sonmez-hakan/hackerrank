import java.io.*;
import java.util.*;

public class Solution {
    public static void main(String[] args) {
        PriorityQueue<Integer> pq = new PriorityQueue<>();
        Scanner sc =new Scanner(System.in);
        int count = sc.nextInt();
        for(int x = 0; x < count; x++) {
            switch (sc.nextInt()) {
                case 1:
                    pq.add(sc.nextInt());
                    break;
                case 2:
                    pq.remove(sc.nextInt());
                    break;
                case 3:
                    System.out.println(pq.peek());
                    break;
            }
        }
    }
}
