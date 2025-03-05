i = 2

step = 3

end = 100

current = i

while current <= end:

    print(current, end=' + ' if current + step <= end else '')
    current += step

