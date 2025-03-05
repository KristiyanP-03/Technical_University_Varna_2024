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

    num_of_nums = len(list_of_digits)
    for index in range(num_of_nums - 1):
        if list_of_digits[index] > list_of_digits[index + 1]:
            print("Резултат: Не не са в нарастващ ред!")
            break
    else:
        print("Резултат: Да в нарастващ ред са!")

    break