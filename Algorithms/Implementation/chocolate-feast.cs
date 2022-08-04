using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        int t = Convert.ToInt32(Console.ReadLine());
        for(int a0 = 0; a0 < t; a0++){
            string[] tokens_n = Console.ReadLine().Split(' ');
            int n = Convert.ToInt32(tokens_n[0]);
            int c = Convert.ToInt32(tokens_n[1]);
            int m = Convert.ToInt32(tokens_n[2]);
            int pieces = n / c;
            //Console.WriteLine("pieces = " + pieces);
            int p = pieces, temp = 0;
            while(p >= m)
            {
                temp = p % m;
                p /= m;
                //Console.WriteLine("p = " + p);
                pieces += p;
                p += temp;
                //Console.WriteLine("pieces = " + pieces);
            }
            Console.WriteLine(pieces);
        }
    }
}
