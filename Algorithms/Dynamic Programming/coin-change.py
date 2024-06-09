#!/bin/python3

import math
import os
import random
import re
import sys



#
# Complete the 'getWays' function below.
#
# The function is expected to return a LONG_INTEGER.
# The function accepts following parameters:
#  1. INTEGER n
#  2. LONG_INTEGER_ARRAY c
#

def getWays(n, c):
    dp = [0] * (n + 1)
    dp[0] = 1
    for coin in c:
        for i in range(coin, n + 1):
            dp[i] += dp[i - coin]

    return dp[n]


if __name__ == '__main__':
    # fptr = open(os.environ['OUTPUT_PATH'], 'w')
    #
    # first_multiple_input = input().rstrip().split()
    #
    # n = int(first_multiple_input[0])
    #
    # m = int(first_multiple_input[1])
    #
    # c = list(map(int, input().rstrip().split()))

    # Print the number of ways of making change for 'n' units using coins having the values given by 'c'

    ways = getWays(10, [2,5,3,6])

    print(ways)

    # fptr.write(str(ways) + '\n')
    #
    # fptr.close()
