using System;
using System.Collections.Generic;
using System.IO;
class Solution {
    static void Main(String[] args) {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT. Your class should be named Solution */
        string[] temp = Console.ReadLine().Split(' ');
        int n = Convert.ToInt32(temp[0]);
        int k = Convert.ToInt32(temp[1]);
        string[] temp2 = Console.ReadLine().Split(' ');
        int[] problemsCounts = Array.ConvertAll(temp2,Int32.Parse);
        int pageNumber = 1;
        int result = 0;
        foreach(int p in problemsCounts)
        {
            int qStart = 0, qEnd = p > k ? k : p;
            while(true)
            {
                //Console.WriteLine(pageNumber + " > " + qStart+ " && " + pageNumber + " <= " + qEnd);
                result += pageNumber > qStart && pageNumber <= qEnd ? 1 : 0;
                pageNumber++;
                qStart = qEnd;
                if(qEnd == p)
                    break;
                qEnd = p > qEnd + k ? qEnd + k : p;
            }
            //Console.WriteLine(result);
        }
        Console.WriteLine(result);
    }
}