static void Main(String[] args) {
    string[] tokens_n = Console.ReadLine().Split(' ');
    int n = Convert.ToInt32(tokens_n[0]);
    int k = Convert.ToInt32(tokens_n[1]);
    string[] a_temp = Console.ReadLine().Split(' ');
    int[] a = Array.ConvertAll(a_temp,Int32.Parse);
    int index = 1;
    int count = 0;
    foreach(int x in a)
    {
        foreach(int y in a.Skip(index))
            count += (x + y)  % k == 0 ? 1 : 0;
        index++;
    }
    Console.WriteLine(count);
}