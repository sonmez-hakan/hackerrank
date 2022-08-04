static void Main(String[] args) {
    string[] h_temp = Console.ReadLine().Split(' ');
    int[] h = Array.ConvertAll(h_temp,Int32.Parse);
    string word = Console.ReadLine();
    byte[] ASCIIValues = Encoding.ASCII.GetBytes(word);
    int max = 0;
    foreach(byte b in ASCIIValues)
    {
        int x = Convert.ToInt32(b);
        max = max > h[x-97] ? max : h[x-97];
    }
    Console.WriteLine(max * word.Length);
}