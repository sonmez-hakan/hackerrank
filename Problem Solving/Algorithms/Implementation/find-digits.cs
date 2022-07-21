using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;

namespace Solution {

    class Solution {

        public static void Main(String[] args) {
            int t = Convert.ToInt32(Console.ReadLine());
            for(int a0 = 0; a0 < t; a0++){
                int n = Convert.ToInt32(Console.ReadLine());
                Console.WriteLine(Solution.GetDiviserCount( n, Solution.GetDigits(n) ));
            }
        }

        static int[] GetDigits(int number)
        {
            List<int> digits = new List<int>();
            while(number > 0)
            {
                digits.Add(number % 10);
                number /= 10;
            }
            return digits.Where(x => x > 0).ToArray();
        }

        static int GetDiviserCount(int number, int[] digits)
        {
            int count = 0;
            foreach(int x in digits)
                count += number % x == 0 ? 1 : 0;
            return count;
        }
    }
}
