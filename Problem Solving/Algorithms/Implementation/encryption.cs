using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        string s = Console.ReadLine();
        int L = s.Length;
        double sqr = Math.Sqrt(L);
        int R = (int)sqr, C;
        if(sqr % 1 == 0)
            C = (int)sqr;
        else
        {
            C = R + 1;
            R += C * R >= L ? 0 : 1;
        }

        for(int x = 0; x < C; x++)
        {
            for(int y = 0; y < R; y++)
            {
                int index = C * y + x;
                if(index >= L) break;
                Console.Write(s[index]);
            }
            Console.Write(' ');
        }

    }
}
