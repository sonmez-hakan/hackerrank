static void Main(String[] args) {
    string[] tokens_n = Console.ReadLine().Split(' ');
    int n = Convert.ToInt32(tokens_n[0]);
    int k = Convert.ToInt32(tokens_n[1]);
    int q = Convert.ToInt32(tokens_n[2]);
    string[] a_temp = Console.ReadLine().Split(' ');
    int[] a = Array.ConvertAll(a_temp,Int32.Parse);
    k = k > n ? k % n : k;
    for(int a0 = 0; a0 < q; a0++){
        int m = Convert.ToInt32(Console.ReadLine()) - k;
        m = m < 0 ? m + n : m;
        Console.WriteLine(a[m]);
    }
}