static void Main(string[] args) {
    int n = Convert.ToInt32(Console.ReadLine());
    string[] a_temp = Console.ReadLine().Split(' ');
    int[] a = Array.ConvertAll(a_temp, Int32.Parse);
    Dictionary<int, int> dic = new Dictionary<int, int>();
    for(int x = 0; x < n; x++)
        dic.Add(x + 1, a[x]);

    for(int x = 1; x <= n; x++)
    {
        int key1 = dic.FirstOrDefault(i => i.Value == x).Key;
        int key2 = dic.FirstOrDefault(i => i.Value == key1).Key;
        Console.WriteLine(key2);
    }
}