static void Main(String[] args) {
    string[] tokens_a0 = Console.ReadLine().Split(' ');
    int[] a = new int[3];
    a[0] = Convert.ToInt32(tokens_a0[0]);
    a[1] = Convert.ToInt32(tokens_a0[1]);
    a[2] = Convert.ToInt32(tokens_a0[2]);
    string[] tokens_b0 = Console.ReadLine().Split(' ');
    int[] b = new int[3];
    b[0] = Convert.ToInt32(tokens_b0[0]);
    b[1] = Convert.ToInt32(tokens_b0[1]);
    b[2] = Convert.ToInt32(tokens_b0[2]);

    int ar = 0, br = 0;
    for(int x = 0; x < 3; x++)
    {
        ar += a[x] > b[x] ? 1 : 0;
        br += a[x] < b[x] ? 1 : 0;
    }
    Console.WriteLine(ar + " " + br);
}