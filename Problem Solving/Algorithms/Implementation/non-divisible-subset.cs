using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    public static int K;
    public static int N;

    static void Main(String[] args) {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT. Your class should be named Solution */
        string[] temp = Console.ReadLine().Split(' ');
        N = Convert.ToInt32(temp[0]);
        K = Convert.ToInt32(temp[1]);
        int[] results = new int[K];
        Array.Clear(results, 0, results.Length);
        string[] temp_a = Console.ReadLine().Split(' ');
        for(int a0 = 0; a0 < N; a0++)
            results[Convert.ToInt32(temp_a[a0]) % K]++;

        int count = results[0] > 0 ? 1 : 0;
        int half = Convert.ToInt32(Math.Ceiling( K / 2.0));
        count += K % 2 == 0 ? 1 : 0;

        for(int x = 1; x < half; x++)
             count += results[x] > results[K - x] ? results[x] : results[K - x];
        Console.WriteLine(count);
    }
}