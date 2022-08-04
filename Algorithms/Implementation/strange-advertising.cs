static void Main(String[] args) {
    int n = Convert.ToInt32(Console.ReadLine());
    int x = 1;
    int lastDayPeopleCount = 5;
    int peopleWhoLikedCount = 0;
    while(x <= n)
    {
        int sharer = lastDayPeopleCount / 2;
        peopleWhoLikedCount += sharer;
        lastDayPeopleCount = sharer * 3;
        x++;
    }
    Console.WriteLine(peopleWhoLikedCount);
}