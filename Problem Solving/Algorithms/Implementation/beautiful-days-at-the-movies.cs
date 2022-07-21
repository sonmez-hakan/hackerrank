static void Main(String[] args) {
    string[] tokens_n = Console.ReadLine().Split(' ');
    int i = Convert.ToInt32(tokens_n[0]);
    int j = Convert.ToInt32(tokens_n[1]);
    int k = Convert.ToInt32(tokens_n[2]);
    int count = 0;
    for(int x = i; x <= j; x++)
        count += Math.Abs(x - Solution.Reverse(x)) % k == 0 ? 1 : 0;
    Console.WriteLine(count);
}

static int Reverse(int number)
{
    int newNumber = 0;
    while(number > 0)
    {
        newNumber *= 10;
        newNumber += number % 10;
        number /= 10;
    }
    return newNumber;
}