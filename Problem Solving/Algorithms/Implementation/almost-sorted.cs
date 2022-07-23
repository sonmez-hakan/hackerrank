using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {
    static void Main(String[] args) {
        int n = Convert.ToInt32(Console.ReadLine());
        string[] c_temp = Console.ReadLine().Split(' ');
        int[] d = Array.ConvertAll(c_temp,Int32.Parse);
        int[] o = d.OrderBy(x => x).ToArray();
        int length = d.Length, firstIndex = -1, lastIndex = -1, differences = 0;
        bool no = false;
        List<int> d_area = new List<int>();
        List<int> o_area = new List<int>();
        for(int x = 0; x < length; x++)
        {
            if(d[x] == o[x]) continue;
            d_area.Add(d[x]);
            o_area.Add(o[x]);
            differences++;
            if(differences > 2 && lastIndex + 1 < x)
            {
                no = true;
                break;
            }
            firstIndex = firstIndex >= 0 ? firstIndex : ( x + 1);
            lastIndex = x + 1;
        }
        if(differences == 2)
        {
            Console.WriteLine("yes\nswap " + firstIndex + " " + lastIndex );
            return;
        }
        else if(!no)
        {
            d_area.Reverse();
            for(int x = 0, l = d_area.Count; x < l; x++ )
            {
                if(d_area[x] != o_area[x])
                    no = true;
            }
        }

        if(no)
            Console.WriteLine("no");
        else Console.WriteLine("yes\nreverse " + firstIndex + " " + lastIndex);
    }
}