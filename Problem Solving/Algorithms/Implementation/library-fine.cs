using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        string[] tokens_d1 = Console.ReadLine().Split(' ');
        int d1 = Convert.ToInt32(tokens_d1[0]);
        int m1 = Convert.ToInt32(tokens_d1[1]);
        int y1 = Convert.ToInt32(tokens_d1[2]);
        string[] tokens_d2 = Console.ReadLine().Split(' ');
        int d2 = Convert.ToInt32(tokens_d2[0]);
        int m2 = Convert.ToInt32(tokens_d2[1]);
        int y2 = Convert.ToInt32(tokens_d2[2]);

        if( y1 > y2 )
            Console.WriteLine( (y1 - y2) * 10000);
        else if (y1 == y2 && m1 > m2 )
            Console.WriteLine( (m1 - m2) * 500);
        else if(y1 == y2 && m1 == m2 && d1 > d2 )
            Console.WriteLine( (d1 - d2) * 15);
        else Console.WriteLine(0);
    }
}
