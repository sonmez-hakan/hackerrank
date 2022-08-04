static void Main(String[] args) {
    int n = Convert.ToInt32(Console.ReadLine());
    for(int a0 = 0; a0 < n; a0++){
        int grade = Convert.ToInt32(Console.ReadLine());
        grade = grade > 37 && grade % 5 > 2 ? grade + (5 - grade % 5) : grade;
        Console.WriteLine(grade);
    }
}