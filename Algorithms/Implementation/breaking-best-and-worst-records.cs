static int[] getRecord(int[] s){
    int highest, lowest;
    highest = lowest = s[0];
    int[] result = new int[]{0,0};
    for(int a = 1, l = s.Length; a < l; a++ )
    {
        if(highest < s[a])
        {
            highest =  s[a];
            result[0]++;
        }
        if(lowest >  s[a])
        {
            lowest =  s[a];
            result[1]++;
        }
    }
    return result;
}