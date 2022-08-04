using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        int n = Convert.ToInt32(Console.ReadLine());
        string[] A_temp = Console.ReadLine().Split(' ');
        int[] A = Array.ConvertAll(A_temp,Int32.Parse);
        int aLength = A.Length, maxLength = aLength + 1;
        for(int x = 0; x < aLength; x++)
        {
            for(int y = x + 1;  y < aLength && y < x + 1 + maxLength; y++ )
            {
                if(A[x] == A[y])
                {
                    maxLength = y - x;
                    break;
                }
            }
        }
        Console.WriteLine(maxLength > aLength ? -1 : maxLength);
    }
}
