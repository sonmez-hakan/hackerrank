using System;
using System.Collections.Generic;
using System.IO;
class Solution {
    static void Main(String[] args) {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT. Your class should be named Solution */
        int p = Convert.ToInt32(Console.ReadLine().ToString());
        int q = Convert.ToInt32(Console.ReadLine().ToString());
        int sqrt = Convert.ToInt32(Math.Sqrt(2000000000));
        List<string> kn = new List<string>();
        for(int x = p; x <= q; x++ )
        {
            if(x < sqrt)
            {
                int result = x * x;
                if(Solution.Kaprekar(result.ToString()) == x)
                    kn.Add(x.ToString());
            }
            else
            {
                long result = (long)x * x;
                if(Solution.Kaprekar(result.ToString()) == x)
                    kn.Add(x.ToString());
            }
        }
        if(kn.Count > 0 )
            Console.WriteLine(string.Join(" ", kn.ToArray()) );
        else Console.WriteLine("INVALID RANGE");
    }

    static int Kaprekar(string number)
    {
        int mid = number.Length / 2;
        mid = mid == 0 ? 1 : mid;
        int first = Convert.ToInt32(number.Substring(0, mid)),
            second = number.Length > mid ? Convert.ToInt32(number.Substring(mid)) : 0;
        return number.Length > mid && second == 0 ? 0 : first + second;
    }

}