
def stockmax(prices):
    profit = 0
    maximum = 0
    for index in range(len(prices) - 1, -1, -1):
        if maximum > prices[index]:
            profit += maximum - prices[index]
        elif maximum < prices[index]:
            maximum = prices[index]

    return profit


if __name__ == '__main__':
    print(stockmax([5, 4, 3, 4, 5, 2, 6, 2, 5, 3, 4]))
