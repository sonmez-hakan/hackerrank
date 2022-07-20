static void Main(String[] args) {
    string[] tokens_x1 = Console.ReadLine().Split(' ');
    int x1 = Convert.ToInt32(tokens_x1[0]);
    int v1 = Convert.ToInt32(tokens_x1[1]);
    int x2 = Convert.ToInt32(tokens_x1[2]);
    int v2 = Convert.ToInt32(tokens_x1[3]);
    if((x1 > x2 && v1 > v2) || (x1 < x2 && v1 < v2) || (x1 != x2 && v1 == v2) || (x1 == x2 && v1 != v2))
    {
        Console.WriteLine("NO");
        return;
    }
    int backP = x1, backV = v1, forP = x2, forV = v2;
    if(x1 > x2)
    {
        backP = x2;
        backV = v2;
        forP = x1;
        forV = x2;
    }
    while(backP < forP)
    {
        backP += backV;
        forP += forV;
         if(backP == forP)
        {
            Console.WriteLine("YES");
            return;
        }
    }
    Console.WriteLine("NO");
}