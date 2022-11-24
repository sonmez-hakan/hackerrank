using System.CodeDom.Compiler;
using System.Collections.Generic;
using System.Collections;
using System.ComponentModel;
using System.Diagnostics.CodeAnalysis;
using System.Globalization;
using System.IO;
using System.Linq;
using System.Reflection;
using System.Runtime.Serialization;
using System.Text.RegularExpressions;
using System.Text;
using System;

class Result
{
    static int[][] results = new int[15][];

    static bool filled = false;

    static void assignResult(int x, int y, int result)
    {
        if (x < 15 && y >= 0) {
            results[x][y] = result;
        }
    }

    static void findWinners(int x, int y)
    {
        assignResult(x + 2, y - 1, 1);
        assignResult(x + 2, y + 1, 1);
        assignResult(x - 1, y + 2, 1);
        assignResult(x + 1, y + 2, 1);
    }

    static int search(int i, int j)
    {
        int result = 1;
        if (i - 2 >= 0 && j + 1 < 15)
        {
            result &= results[i - 2][j + 1] ^ 1;
        }

        if (i - 2 >= 0 && j - 1 >= 0)
        {
            result &= results[i - 2][j - 1] ^ 1;
        }

        if (i + 1 < 15 && j - 2 >= 0)
        {
            result &= results[i + 1][j - 2] ^ 1;
        }

        if (i - 1 >= 0 && j - 2 >= 0)
        {
            result &= results[i - 1][j - 2] ^ 1;
        }

        return result;
    }

    static void fill()
    {
        for (int i = 0; i < 15; i++)
        {
            results[i] = new int[15];
            for (int j = 0; j < 15; j++)
            {
                results[i][j] = 2;
            }
        }

        results[0][0] = 0;
        findWinners(0, 0);
        results[0][1] = 0;
        findWinners(0, 1);
        results[1][0] = 0;
        findWinners(1, 0);
        results[1][1] = 0;
        findWinners(1, 1);

        for (int x = 0; x < 14; x += 2)
        {
            for (int i = x; i < 15; i++)
            {
                for (int j = x; j < x + 2; j++)
                {
                    if (results[i][j] == 2)
                    {
                        results[i][j] = search(i, j);
                        if (results[i][j] == 0)
                        {
                            findWinners(i, j);
                        }
                    }

                    if (results[j][i] == 2)
                    {
                        results[j][i] = search(j, i);
                        if (results[j][i] == 0)
                        {
                            findWinners(j, i);
                        }
                    }
                }
            }
        }

        filled = true;
    }

    /*
     * Complete the 'chessboardGame' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts following parameters:
     *  1. INTEGER x
     *  2. INTEGER y
     */

    public static string chessboardGame(int x, int y)
    {
        if (!filled) {
            fill();
        }

        return results[x - 1][y - 1] == 1 ? "First" : "Second";
    }

}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int t = Convert.ToInt32(Console.ReadLine().Trim());

        for (int tItr = 0; tItr < t; tItr++)
        {
            string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

            int x = Convert.ToInt32(firstMultipleInput[0]);

            int y = Convert.ToInt32(firstMultipleInput[1]);

            string result = Result.chessboardGame(x, y);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
