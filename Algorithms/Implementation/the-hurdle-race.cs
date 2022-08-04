static void Main(String[] args) {
    string[] tokens_n = Console.ReadLine().Split(' ');
    int n = Convert.ToInt32(tokens_n[0]);
    int k = Convert.ToInt32(tokens_n[1]);
    string[] height_temp = Console.ReadLine().Split(' ');
    int[] height = Array.ConvertAll(height_temp,Int32.Parse);
    // your code goes here
    int magic = 0;
    foreach(int h in height)
    {
        if(h > k)
        {
            magic += h - k;
            k = h;
        }
    }
    Console.WriteLine(magic);
}