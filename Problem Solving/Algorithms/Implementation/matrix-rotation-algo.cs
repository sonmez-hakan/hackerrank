using System;
using System.Collections.Generic;
using System.IO;

    class Solution
    {
        public static int M;
        public static int N;
        public static int R;

        static void Main(String[] args)
        {
            string[] i_temp = Console.ReadLine().Split(' ');
            Solution.M = Convert.ToInt32(i_temp[0]);
            Solution.N = Convert.ToInt32(i_temp[1]);
            Solution.R = Convert.ToInt32(i_temp[2]);
            int[][] MATRIX = new int[Solution.M][];
            Step step;
            for (int x = 0; x < Solution.M; x++)
            {
                string[] c_temp = Console.ReadLine().Split(' ');
                MATRIX[x] = Array.ConvertAll(c_temp, Int32.Parse);
            }

            int newArraysLength = Math.Min(Solution.M, Solution.N) / 2;
            int[][] NEWARRAYS = new int[newArraysLength][];

            for (int x = 0; x < newArraysLength; x++)
            {
                int newM = (Solution.M - 2 * x), newN = (Solution.N - 2 * (x + 1));
                int length = 2 * (newM + newN);
                NEWARRAYS[x] = new int[length];
                step = new Step(x);
                while (step.index < length)
                {
                    NEWARRAYS[x][step.index] = MATRIX[step.r][step.c];
                    step.NewStep();
                }
                NEWARRAYS[x] = step.RotateArray(NEWARRAYS[x]);
                //Step.WriteArray(NEWARRAYS[x]);
            }

            for (int x = 0; x < newArraysLength; x++)
            {

                int length = NEWARRAYS[x].Length;
                step = new Step(x);
                while (step.index < length)
                {
                    MATRIX[step.r][step.c] = NEWARRAYS[x][step.index];
                    step.NewStep();
                }
            }
            Step.WriteArray(MATRIX);
            Console.Read();
        }
    }

    class Step
    {
        public enum Directions { DOWN = 1, RIGHT = 2, TOP = 3, LEFT = 4 };
        public int index = 0, r = 0, c = 0, x = 0;
        private Directions direction = Directions.DOWN;

        public Step(int x)
        {
            this.x = this.r = this.c = x;
        }

        public void NewStep()
        {
            switch (this.direction)
            {
                case Directions.DOWN:
                    if (this.r == Solution.M - x - 1)
                    {
                        this.c++;
                        this.direction = Directions.RIGHT;
                    }
                    else
                    {
                        this.r++;
                    }
                    break;
                case Directions.RIGHT:
                    if (this.c == Solution.N - x - 1)
                    {
                        this.r--;
                        this.direction = Directions.TOP;
                    }
                    else
                    {
                        this.c++;
                    }
                    break;
                case Directions.TOP:
                    if (this.r == this.x)
                    {
                        this.c--;
                        this.direction = Directions.TOP;
                    }
                    else
                    {
                        this.r--;
                    }
                    break;
                case Directions.LEFT:
                    if (this.c == this.x)
                        break;
                    else
                    {
                        this.c--;
                    }
                    break;
            }
            this.index++;
        }

        internal int[] RotateArray(int[] array)
        {
            int length = array.Length, rotate = Solution.R % length;
            int[] newArray = new int[length];
            for(int x = 0; x < length; x++)
                newArray[(x + rotate) % length] = array[x];
            return newArray;
        }

        internal static void WriteArray(int[] array)
        {
            foreach (int x in array)
                Console.Write(x + " ");
            Console.WriteLine();
        }

        internal static void WriteArray(int[][] array)
        {
            foreach (int[] arr in array)
            {
                foreach (int x in arr)
                    Console.Write(x + " ");
                Console.WriteLine();
            }
        }
    }
