static void Main(String[] args) {
    string[] tokens_n = Console.ReadLine().Split(' ');
    int n = Convert.ToInt32(tokens_n[0]);
    int k = Convert.ToInt32(tokens_n[1]);
    string[] c_temp = Console.ReadLine().Split(' ');
    int[] c = Array.ConvertAll(c_temp,Int32.Parse);
    int b = Convert.ToInt32(Console.ReadLine());

    int total = c.Sum();
    int fair = (total - c[k]) / 2;
    if(fair == b)
        Console.WriteLine("Bon Appetit");
    else Console.WriteLine(b - fair);
}