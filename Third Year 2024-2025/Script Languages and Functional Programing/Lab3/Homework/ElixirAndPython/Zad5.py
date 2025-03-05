i = 0
sum = 0

for i in range(0, 100, 1):
    if i % 3 == 0:
        sum += i
        print(i)
        print(sum)

print(f"The sum is: {sum}")
