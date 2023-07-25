#!/bin/python3

import math
import os
import random
import re
import sys


def maxSubarray(arr):
    s = 0
    h = -100000
    for i in arr:
        if i > 0:
            s += i
        else:
            if h < i:
                h = i

    if s == 0:
        s = h

    z = 0
    m = -pow(10, 10)
    for i in range(0, len(arr)):
        z = arr[i]
        if z > m:
            m = z
        for j in range(i + 1, len(arr)):
            z += arr[j]
            if z > m:
                m = z
            if z < 0:
                break

    return [m, s]


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    t = int(input().strip())

    for t_itr in range(t):
        n = int(input().strip())

        arr = list(map(int, input().rstrip().split()))

        result = maxSubarray(arr)

        fptr.write(' '.join(map(str, result)))
        fptr.write('\n')

    fptr.close()