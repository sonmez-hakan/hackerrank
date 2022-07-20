static void Main(String[] args) {
    int n = Convert.ToInt32(Console.ReadLine());
    string[] arr_temp = Console.ReadLine().Split(' ');
    Int64[] arr = Array.ConvertAll(arr_temp,Int64.Parse);
    Int64 sum = arr.Sum();
    Console.WriteLine(sum);
}