using System;
using System.Text;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {
    static void Main(String[] args) {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT. Your class should be named Solution */
        int t = Convert.ToInt32(Console.ReadLine());
        for(int a0 = 0; a0 < t; a0++)
        {
            string s = Console.ReadLine();
            s = Solution.FirstBigger(s);
            Console.WriteLine(s);
        }
    }

    static string FirstBigger(string s)
    {
        int length = s.Length, index = 0;
        List<char> chars = new List<char>();
        for(int x = length - 1; x >= 0; x--)
        {
            for(int y = 0, l = chars.Count; y < l; y++)
            {
                if( s[x].CompareTo(chars[y]) < 0)
                {
                    StringBuilder sb = new StringBuilder(s);
                    sb[x] = chars[y];
                    chars[y] = s[x];
                    s = sb.ToString().Substring(0,x + 1) + new string(chars.OrderBy( c => c).ToArray());
                    return s;
                }
            }
            chars.Add(s[x]);
        }
        return "no answer";
    }
}