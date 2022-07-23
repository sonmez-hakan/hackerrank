using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        int n = Convert.ToInt32(Console.ReadLine());
        string[] arr_temp = Console.ReadLine().Split(' ');
        int[] arr = Array.ConvertAll(arr_temp,Int32.Parse);
        while(arr.Length > 0)
        {
            int min = Solution.Min(arr);
            Console.WriteLine(arr.Length);
            arr = arr.Where(x => x > min).ToArray();
        }
    }

    static int Min(int[] array)
    {
        int min = array[0];
        foreach(int x in array.Skip(1))
            min = min > x ? x : min;
        return min;
    }
}
