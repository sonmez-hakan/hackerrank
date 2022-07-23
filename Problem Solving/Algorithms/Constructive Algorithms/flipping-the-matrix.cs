using System;
using System.Collections.Generic;
using System.IO;
class Solution {
    static int N;
    static int N2;
    static void Main(String[] args) {
        int t = Convert.ToInt32(Console.ReadLine());
        for(int a0 = 0; a0 < t; a0++){
            N = Convert.ToInt32(Console.ReadLine());
            N2 = 2 * N;
            int[][] matrix = new int[2 * N][];
            for(int x = 0, l = 2* N; x < l; x++)
            {
                 string[]  a_temp = Console.ReadLine().Split(' ');
                 matrix[x] = Array.ConvertAll(a_temp,Int32.Parse);
            }
            int max = 0;
            for(int x = 0; x < N; x++)
            {
                for(int y = 0; y < N; y++)
                {
                    max += Solution.GetBiggest(matrix, x, y);
                }
            }
            Console.WriteLine(max);
        }
    }

    static int GetBiggest(int[][] matrix, int x, int y)
    {
        int temp1 = matrix[x][y] > matrix[x][N2 - y - 1] ? matrix[x][y] :  matrix[x][N2 - y - 1];
        int temp2 = matrix[N2 - x - 1][y] > matrix[N2 - x - 1][N2 - y - 1]
            ? matrix[N2 - x - 1][y] : matrix[N2 - x - 1][N2 - y - 1];
        int returner = temp1 > temp2 ? temp1 : temp2;
        //Console.WriteLine(returner + " | " + temp1 + " <> " + temp2);
        return returner;
    }
}