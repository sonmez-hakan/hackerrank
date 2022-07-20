static void Main(String[] args) {
    string[] tokens_n = Console.ReadLine().Split(' ');
    int n = Convert.ToInt32(tokens_n[0]);
    int m = Convert.ToInt32(tokens_n[1]);
    string[] a_temp = Console.ReadLine().Split(' ');
    int[] a = Array.ConvertAll(a_temp,Int32.Parse);
    string[] b_temp = Console.ReadLine().Split(' ');
    int[] b = Array.ConvertAll(b_temp,Int32.Parse);
    a = a.OrderBy( x => x ).ToArray();
    b = b.OrderBy( x => x ).ToArray();
    List<int> newA = new List<int>();
    for(int x = 0, l = a.Length; x < l; x++)
    {
        bool result = true;
        for(int y = x + 1;y < l; y++)
        {
             if(a[y] % a[x] == 0)
             {
                 result = false;
                 break;
             }
        }
        if(result)
            newA.Add(a[x]);
    }
    int leastTimes = newA.Aggregate(1, (x,y) => x * y);
    int multiplier = 2, times = leastTimes, newLeastTimes = 0;
    while(times >= newA[newA.Count() - 1])
    {
        times = leastTimes / multiplier;
        multiplier++;
        bool result = true;
        foreach(int x in newA)
        {
            if(times % x != 0)
            {
                result = false;
                break;
            }
        }
        if(result)
            newLeastTimes = times;
    }
    leastTimes = newLeastTimes > 0 ? newLeastTimes : leastTimes;
    List<int> ekoks = new List<int>();
    multiplier = 2;
    times = leastTimes;
    do
    {
        ekoks.Add(times);
        times = leastTimes * multiplier;
        multiplier++;
    }while(times <= 100);
    newA = new List<int>();
    foreach(int e in ekoks)
    {
        bool result = true;
        foreach(int x in b)
        {
            if(x % e != 0)
            {
                result = false;
                break;
            }
        }
        if(result)
        {
            newA.Add(e);
        }
    }
    Console.WriteLine(newA.Count());
}