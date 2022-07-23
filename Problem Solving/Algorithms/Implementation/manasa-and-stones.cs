using System;
using System.Collections.Generic;
using System.IO;
class Solution {
    static void Main(String[] args) {
        int t = Convert.ToInt32(Console.ReadLine());
        for(int a0 = 0; a0 < t; a0++){
            int n = Convert.ToInt32(Console.ReadLine());
            int a = Convert.ToInt32(Console.ReadLine());
            int b = Convert.ToInt32(Console.ReadLine());
            int minStep = a < b ? a : b, maxStep = a > b ? a : b;
            int min = (n-1) * minStep, max = (n-1)*maxStep;
            int diff = maxStep-minStep;
            if(diff == 0)
                 Console.WriteLine(min);
            else
            {
                for(; min <= max; min+=diff)
                    Console.Write(min + " ");
                Console.WriteLine();
            }
        }
    }
}