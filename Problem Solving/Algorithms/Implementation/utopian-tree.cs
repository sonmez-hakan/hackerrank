static void Main(String[] args) {
    int t = Convert.ToInt32(Console.ReadLine());
    Dictionary<int, int> inputs = new Dictionary<int, int>();
    Dictionary<int, long> outputs = new Dictionary<int, long>();
    for(int a0 = 0; a0 < t; a0++){
        inputs.Add(a0, Convert.ToInt32(Console.ReadLine()));
    }
    inputs = inputs.OrderBy(x=> x.Value).ToDictionary( x => x.Key, x => x.Value );
    long height = 1, multiplier = 2, adder = 1;
    int cycle = -1;
    foreach(KeyValuePair<int, int> kvp in inputs )
    {
        while(cycle < kvp.Value)
        {
            cycle++;
            if(cycle == 0)
                continue;
            height = cycle % 2 == 0 ? height + adder : height * multiplier;

        }
        outputs.Add(kvp.Key, height);
    }

    for(int a0 = 0; a0 < t; a0++){
        Console.WriteLine(outputs[a0]);
    }
}