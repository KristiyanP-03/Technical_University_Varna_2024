while(True):
    number = input("Enter a number: ")

    try:
        number = int(number)
    except ValueError:
        print("This is not a number!")
        continue


    number = str(number)
    symbol = ""

    if number[0] == "-":
        symbol = "-"
        number = number[1:]

    new_number = number[::-1]

    if(number == new_number):
        print("The number is palindrome")
        print(f"Your number is {symbol + number} and the new number is {symbol + new_number}")
        break
    else:
        print("The number is not palindrome")
        print("Try again!")
        continue
