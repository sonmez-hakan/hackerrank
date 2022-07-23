using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        int n = Convert.ToInt32(Console.ReadLine());
        string[] c_temp = Console.ReadLine().Split(' ');
        int[] c = Array.ConvertAll(c_temp,Int32.Parse);
        int jumpCount = 0, index = 0, cLength = c.Length;
        while(index < cLength - 1)
        {
            index += cLength > index + 2 && c[index + 2] == 0 ? 2 : 1;
            jumpCount++;
        }
        Console.WriteLine(jumpCount);
    }
}
