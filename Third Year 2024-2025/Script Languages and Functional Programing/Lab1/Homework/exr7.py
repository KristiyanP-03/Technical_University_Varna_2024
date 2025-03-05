x = input("Enter x: ")
y = input("Enter y: ")

x = int(x)
y = int(y)

print("\n")
print("Before:")
print(f"x is {x}")
print(f"y is {y}")

print("After:")
temp = y
y = x
x = temp
print(f"x is {x}")
print(f"y is {y}")