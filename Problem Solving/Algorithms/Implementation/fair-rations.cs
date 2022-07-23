using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        int N = Convert.ToInt32(Console.ReadLine());
        string[] B_temp = Console.ReadLine().Split(' ');
        int[] B = Array.ConvertAll(B_temp,Int32.Parse);
        B = B.Select(x=> x % 2).ToArray();
        int length = B.Length;
        int count1 = B.Where(x=> x == 1).ToArray().Length;
        if( count1 == 1 )
            Console.WriteLine("NO");
        else
        {
            int index = 0;
            int result = 0;
            while(count1 != 1 && index < length)
            {
                //Console.WriteLine(B[index]);
                if(B[index] == 1)
                {
                    result += 2;
                    B[index] = 0;
                    B[index + 1] = (B[index + 1] + 1) % 2;
                }
                index++;
                count1 = B.Where(x=> x == 1).ToArray().Length;
            }
            Console.WriteLine(count1 == 1 ? "NO" : result.ToString());
        }
    }
}
