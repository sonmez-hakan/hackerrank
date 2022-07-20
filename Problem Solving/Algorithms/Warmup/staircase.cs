static void Main(String[] args) {
    int n = Convert.ToInt32(Console.ReadLine());
    for (int x = 1; x<=n; x++)
    {
        for(int y=1; y <= n; y++)
        {
            Console.Write(n - x >= y ? ' ' : '#');
        }
        Console.WriteLine();
    }
}