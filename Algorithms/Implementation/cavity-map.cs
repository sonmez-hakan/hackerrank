using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        int n = Convert.ToInt32(Console.ReadLine());
        int[][] grid = new int[n][];
        for(int grid_i = 0; grid_i < n; grid_i++){
            string a_temp = Console.ReadLine();
            grid[grid_i] = new int[n];
            for(int x = 0; x < n; x++)
                grid[grid_i][x] = Convert.ToInt32(a_temp[x].ToString());
        }
        int length = n - 1;
        for(int x = 1; x < length; x++)
            for(int y = 1; y < length; y++)

                grid[x][y] = grid[x][y] > grid[x - 1][y] && grid[x][y] > grid[x + 1][y] &&
                   grid[x][y] > grid[x][y - 1] && grid[x][y] > grid[x][y + 1] ? 10 : grid[x][y];

        for(int x = 0; x < n; x++)
        {
            for(int y = 0; y < n; y++)
               Console.Write(grid[x][y] == 10 ? "X" : grid[x][y].ToString() );
            Console.WriteLine();
        }

    }
}
