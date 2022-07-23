using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        int n = Convert.ToInt32(Console.ReadLine());
        string[] c_temp = Console.ReadLine().Split(' ');
        int[] c = Array.ConvertAll(c_temp,Int32.Parse);
        c = c.OrderBy(x=> x).ToArray();
        int index = 0;
        int count = c.Length - 1;
        int result = 0;
        while(index < count)
        {
            if(c[index] == c[index + 1])
            {
                result++;
                index += 2;
            }
            else index++;
        }
        Console.WriteLine(result);
    }
}