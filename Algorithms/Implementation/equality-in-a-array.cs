using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {
    static void Main(String[] args) {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT. Your class should be named Solution */
        int n = Convert.ToInt32(Console.ReadLine());
        string[] c_temp = Console.ReadLine().Split(' ');
        int[] c = Array.ConvertAll(c_temp,Int32.Parse);
        Dictionary<int, int> dic = new Dictionary<int, int>();
        foreach(int x in c)
        {
            if(dic.ContainsKey(x))
                dic[x]++;
            else dic[x] = 1;
        }
        dic = dic.OrderBy( x=> x.Value).ToDictionary(x => x.Key, x => x.Value);
        int sum = dic.Sum(x => x.Value);
        Console.WriteLine(sum - dic.Last().Value);
    }
}