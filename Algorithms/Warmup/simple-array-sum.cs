static void Main(String[] args) {
    int n = Convert.ToInt32(Console.ReadLine());
    string[] arr_temp = Console.ReadLine().Split(' ');
    int[] arr = Array.ConvertAll(arr_temp,Int32.Parse);
    long sum = 0;
    foreach(int a in arr)
        sum += a;
    Console.WriteLine(sum);
}