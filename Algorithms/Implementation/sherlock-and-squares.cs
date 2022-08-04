using System;
using System.Collections.Generic;
using System.IO;
class Solution {
    static void Main(String[] args) {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT. Your class should be named Solution */
        int t = Convert.ToInt32(Console.ReadLine());
        for(int a0 = 0; a0 < t; a0++){
            string[] tokens_n = Console.ReadLine().Split(' ');
            int a = Convert.ToInt32(tokens_n[0]);
            int b = Convert.ToInt32(tokens_n[1]);
            int c = 0, i = 1, sq = 1;
            while(sq <= b)
            {
                c += sq >= a && sq <= b ? 1 : 0;
                i++;
                sq = i * i;
            }
            Console.WriteLine(c);
        }
    }
}