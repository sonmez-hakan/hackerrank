using System;
using System.Collections.Generic;
using System.IO;
class Solution {
    static void Main(String[] args) {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT. Your class should be named Solution */
        string[] tokens_n = Console.ReadLine().Split(' ');
        int n = Convert.ToInt32(tokens_n[0]);
        int d = Convert.ToInt32(tokens_n[1]);
        string[] a_temp = Console.ReadLine().Split(' ');
        int[] a = Array.ConvertAll(a_temp,Int32.Parse);
        Dictionary<int, int> dic = new Dictionary<int, int>();
        for(int x = 0, l = a.Length; x < l; x++)
        {
            dic.Add(a[x], x);
        }
        int count = 0;
        foreach(KeyValuePair<int, int> kvp in dic)
        {
            int newKey = kvp.Key + d;
            count += ( dic.ContainsKey(newKey) && dic[newKey] > kvp.Value &&
                        dic.ContainsKey(newKey + d) && dic[newKey + d] > dic[newKey]) ? 1 : 0;
        }
        Console.WriteLine(count.ToString());
    }
}