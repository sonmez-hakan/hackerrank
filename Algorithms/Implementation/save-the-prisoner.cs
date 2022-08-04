static void Main(String[] args) {
    int t = Convert.ToInt32(Console.ReadLine());
    for(int a0 = 0; a0 < t; a0++){
        string[] tokens_n = Console.ReadLine().Split(' ');
        int N = Convert.ToInt32(tokens_n[0]);
        int M = Convert.ToInt32(tokens_n[1]);
        int S = Convert.ToInt32(tokens_n[2]);
        int result = (M + S - 1) % (N);
        Console.WriteLine( result == 0 ? N : result );
    }
}