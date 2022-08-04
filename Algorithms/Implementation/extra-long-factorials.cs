using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Numerics;
class Solution {

    static void Main(String[] args) {
        int n = Convert.ToInt32(Console.ReadLine());
        BigInteger r = 1;
        for(int x = 2; x <= n; x++ )
            r = r * x;
        Console.WriteLine(r);
    }
}