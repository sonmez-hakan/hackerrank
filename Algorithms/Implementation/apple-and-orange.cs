static void Main(String[] args) {
    string[] tokens_s = Console.ReadLine().Split(' ');
    int s = Convert.ToInt32(tokens_s[0]);
    int t = Convert.ToInt32(tokens_s[1]);
    string[] tokens_a = Console.ReadLine().Split(' ');
    int a = Convert.ToInt32(tokens_a[0]);
    int b = Convert.ToInt32(tokens_a[1]);
    string[] tokens_m = Console.ReadLine().Split(' ');
    int m = Convert.ToInt32(tokens_m[0]);
    int n = Convert.ToInt32(tokens_m[1]);
    string[] apple_temp = Console.ReadLine().Split(' ');
    int[] apple = Array.ConvertAll(apple_temp,Int32.Parse);
    string[] orange_temp = Console.ReadLine().Split(' ');
    int[] orange = Array.ConvertAll(orange_temp,Int32.Parse);
    var app = apple.Where( ap => ap + a >= s && ap + a <= t  );
    var ora = orange.Where( or => or + b >= s && or + b <= t  );
    Console.WriteLine(app.Count());
    Console.WriteLine(ora.Count());
}