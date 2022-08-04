using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        string s = Console.ReadLine();
        string t = Console.ReadLine();
        int k = Convert.ToInt32(Console.ReadLine());
        int sLength = s.Length, tLength = t.Length;
        int index = 0, minLength = Math.Min(sLength, tLength);
        for(; index < minLength; index++)
            if(s[index] != t[index])
                break;
        int result =sLength + tLength - 2 * index;
        if( k - result < 0)
            Console.WriteLine("No");
        else if(sLength + tLength < k)
            Console.WriteLine("Yes");
        else if(result % 2 == k % 2)
            Console.WriteLine("Yes");
        else Console.WriteLine("No");
    }
}
