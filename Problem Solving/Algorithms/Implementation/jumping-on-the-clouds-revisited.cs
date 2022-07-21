static void Main(String[] args) {
    string[] tokens_n = Console.ReadLine().Split(' ');
    int n = Convert.ToInt32(tokens_n[0]);
    int k = Convert.ToInt32(tokens_n[1]);
    string[] c_temp = Console.ReadLine().Split(' ');
    int[] c = Array.ConvertAll(c_temp,Int32.Parse);
    int E = 100;
    for(int i = k; i < n; i+=k)
        E -= c[i] == 1 ? 3 : 1;
    E -= c[0] == 1 ? 3 : 1;
    Console.WriteLine(E);
}