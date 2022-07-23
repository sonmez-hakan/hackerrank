using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution
{
    static string[] G;
    static string[] P;
    static int R;
    static int C;
    static int r;
    static int c;

    static void Main(String[] args)
    {
        //StreamReader console = new StreamReader("input.txt");
        int t = Convert.ToInt32(Console.ReadLine());
        for (int a0 = 0; a0 < t; a0++)
        {
            string[] tokens_R = Console.ReadLine().Split(' ');
            R = Convert.ToInt32(tokens_R[0]);
            C = Convert.ToInt32(tokens_R[1]);
            G = new string[R];
            for (int G_i = 0; G_i < R; G_i++)
                G[G_i] = Console.ReadLine();

            string[] tokens_r = Console.ReadLine().Split(' ');
            r = Convert.ToInt32(tokens_r[0]);
            c = Convert.ToInt32(tokens_r[1]);
            P = new string[r];
            for (int P_i = 0; P_i < r; P_i++)
                P[P_i] = Console.ReadLine();

            bool result = false;
           for (int indexG = 0; indexG <= R - r; indexG++)
           {
               bool repater = Solution.IsRepating(P[0]);
               int columnIndex = 0, match = 1, indexP = 0, step = repater ? 1 : c;
               int totalMatch = repater ? C - 1 : Solution.Split(G[indexG], P[indexP]).Length -1;
               if (totalMatch == 0) continue;
               while (columnIndex + c <= C && match <= totalMatch)
               {
                   int startX = G[indexG].Substring(columnIndex).IndexOf(P[indexP]);
                   if (startX >= 0)
                   {
                       columnIndex += startX;
                       result = Solution.CheckFollowings(indexG + 1, indexP + 1, columnIndex);
                       if (result) break;
                   }
                   columnIndex += step;
                   match++;
               }
               if (result)
                   break;
           }
            if (result)
                Console.WriteLine("YES");
            else Console.WriteLine("NO");
        }
    }

    static bool CheckFollowings(int indexG, int indexP, int columnIndex)
    {
        if (indexP == r)
            return true;
        return G[indexG].Substring(columnIndex, c).IndexOf(P[indexP]) >= 0
            & Solution.CheckFollowings(indexG + 1, indexP + 1, columnIndex);
    }

    public static string[] Split(string s, string separator)
    {
        return s.Split(new string[] { separator }, StringSplitOptions.None);
    }

    public static bool IsRepating(string s)
    {
        int first = s.Substring(1).IndexOf(s[0]) + 1;
        if (first == -1 || first > s.Length - first)
            return false;
        int index = 1;
        while (index < first && s[index] == s[index + first]) index++;
        return index == first;
    }
}