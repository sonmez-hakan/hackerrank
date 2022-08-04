using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
class Solution {

    static void Main(String[] args) {
        int h = Convert.ToInt32(Console.ReadLine());
        int m = Convert.ToInt32(Console.ReadLine());
        Dictionary<int, string> dic = new Dictionary<int, string>();
        dic.Add(1, "one");dic.Add(8, "eight");dic.Add(15, "quarter");
        dic.Add(2, "two");dic.Add(9, "nine");dic.Add(16, "sixteen");
        dic.Add(3, "three");dic.Add(10, "ten");dic.Add(17, "seventeen");
        dic.Add(4, "four");dic.Add(11, "eleven");dic.Add(18, "eighteen");dic.Add(45, "quarter");
        dic.Add(5, "five");dic.Add(12, "twelve");dic.Add(19, "ninteen");dic.Add(-1, "past");
        dic.Add(6, "six");dic.Add(13, "thirteen");dic.Add(20, "twenty");dic.Add(0, "o'clock");
        dic.Add(7, "seven");dic.Add(14, "forteen");dic.Add(30, "half");dic.Add(-2, "to");
        switch(m)
        {
            case 0:
                Console.WriteLine(dic[h] + " o' clock");
                break;
            case 15:
                Console.WriteLine("quarter past " + dic[h]);
                break;
            case 30:
                Console.WriteLine("half past " + dic[h]);
                break;
            case 45:
                Console.WriteLine("quarter to " + dic[h + 1]);
                break;
            default:
                int cn = m > 30 ? -2 : -1;
                string convergence = dic[cn];
                string hour = m > 30 ? dic[h + 1] : dic[h];
                m = m > 30 ? 60 - m : m;
                string minute = m <= 20 ? dic[m] + ( m == 1 ? " minute" : " minutes") : dic[20] + " " + dic[m - 20] + " minutes";
                Console.WriteLine("{0} {1} {2}", minute, convergence, hour );
                break;
        }
    }
}
