while(True):
    number = input("Въведете число: ")

    try:
        number = int(number)
    except ValueError:
        print("This is not a number!")
        continue

    if number < 10:
        print("Number must be at least 2 digits and must be positive!")
        continue

    number = str(number)
    list_of_digits = []

    for digit in number:
        digit = int(digit)
        list_of_digits.append(digit)

    min_digit = min(list_of_digits)
    max_digit = max(list_of_digits)

    print(f"The smallest number is: {min_digit}")
    print(f"The biggest number is: {max_digit}")

    break