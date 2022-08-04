using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        string[] tokens_n = Console.ReadLine().Split(' ');
        int n = Convert.ToInt32(tokens_n[0]);
        int m = Convert.ToInt32(tokens_n[1]);
        int[] cs = Enumerable.Range(0, n).ToArray();
        string[] ss_temp = Console.ReadLine().Split(' ');
        int[] ss = Array.ConvertAll(ss_temp,Int32.Parse).OrderBy(x=>x).ToArray();
        int max = 0;
        foreach(int c in cs)
        {
            int temp = 0, index = 0;
            bool success = false;
            while(!success && index < m)
            {
                if(c == ss[index])
                {
                    success = true;
                    temp = 0;
                    break;
                }
                else if( c < ss[index])
                {
                    int diff1 = index - 1 >= 0 ? c - ss[index - 1] : n;
                    int diff2 = ss[index] - c;
                    temp = diff2 > diff1 ? diff1 : diff2;
                    success = true;
                    break;
                }
                index++;
            }
            if(!success)
                temp = c - ss[index -1];
            max = max < temp ? temp : max;
        }
        Console.WriteLine(max);
    }
}
