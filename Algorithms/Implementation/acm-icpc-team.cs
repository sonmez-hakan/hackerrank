using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        string[] tokens_n = Console.ReadLine().Split(' ');
        int n = Convert.ToInt32(tokens_n[0]);
        int m = Convert.ToInt32(tokens_n[1]);
        string[] topic = new string[n];
        Dictionary<int, int> dic = new Dictionary<int, int>();
        for(int i = 0; i < n; i++){
            topic[i] = Console.ReadLine();
        }
        int length = topic.Length;
        for(int x = 0; x < length; x++)
        {
            for(int y = x + 1; y < length; y++)
            {
                int xored = Solution.OR(topic[x], topic[y]);
                if(dic.ContainsKey(xored))
                    dic[xored]++;
                else dic.Add(xored, 1);
            }
        }
        dic = dic.OrderBy(x => x.Key).ToDictionary(x => x.Key, y => y.Value);
        Console.WriteLine(dic.Last().Key);
        Console.WriteLine(dic.Last().Value);
    }

    static int OR(string a, string b)
    {
        int length = a.Length, count = 0;
        for(int x = 0; x < length; x++)
            count += a[x] == '1' || b[x] == '1' ? 1 : 0;
        return count;
    }
}
