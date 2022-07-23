using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        string s = Console.ReadLine();
        long n = Convert.ToInt64(Console.ReadLine());
        char s0 = 'a';
        int mod = Convert.ToInt32(n % s.Length);
        int c = s.Where(x => x == s0).Count();
        n = n / s.Length * c;
        n += mod > 0 ? s.Substring(0, mod).Where(x => x == s0).Count() : 0;
        Console.WriteLine(n);
    }
}