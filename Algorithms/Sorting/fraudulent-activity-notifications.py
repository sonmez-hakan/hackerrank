#!/bin/python3

import math
import os
import random
import re
import sys

def find_median(counts, d):
    sum_counts = 0
    median1 = 0
    median2 = 0

    if d % 2 == 0:
        first = d // 2
        second = first + 1
    else:
        first = second = (d // 2) + 1

    for i, count in enumerate(counts):
        sum_counts += count
        if sum_counts >= first and median1 == 0:
            median1 = i
        if sum_counts >= second:
            median2 = i
            break

    return (median1 + median2) / 2

#
# Complete the 'activityNotifications' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER_ARRAY expenditure
#  2. INTEGER d
#


def activityNotifications(expenditure, d):
    n = len(expenditure)
    count = [0] * 201
    notifications = 0

    for i in range(d):
        count[expenditure[i]] += 1

    for i in range(d, n):
        median = find_median(count, d)

        if expenditure[i] >= 2 * median:
            notifications += 1

        count[expenditure[i - d]] -= 1
        count[expenditure[i]] += 1

    return notifications


if __name__ == '__main__':
    # fptr = open(os.environ['OUTPUT_PATH'], 'w')
    #
    # first_multiple_input = input().rstrip().split()
    #
    # n = int(first_multiple_input[0])
    #
    # d = int(first_multiple_input[1])
    #
    # expenditure = list(map(int, input().rstrip().split()))

    result = activityNotifications([10,20,30,40,50], 3)

    # fptr.write(str(result) + '\n')
    #
    # fptr.close()
