def print_current_state_of_the_secret_word(found_letters: str):
    hidden_letter_left = 0
    for index, letter in enumerate(input_word):
        if index == 0 or index == len(input_word) - 1:
            print(letter, end="")
        elif letter in found_letters:
            print(letter, end="")
        else:
            hidden_letter_left += 1
            print(" _ ", end="")
    print()
    return hidden_letter_left



print("Please input the word: ")
input_word = input()

print("\n\n\n\n\n\n\n\n\n\n")


print("=== Welcome to the Game ===\n")
health = "<3 <3 <3"

print("Here is the secret word:\n")
found_letters = ""
hidden_letters = print_current_state_of_the_secret_word(found_letters)


print("Now you have to guess the letters one by one")


while(True):
    user_input_letter = input()
    if user_input_letter == input_word:
        print("Congrats! You guessed the secret word!")
        break
    elif user_input_letter in input_word:
        print(f"Yes! {user_input_letter} is a letter in the secret word!")
        found_letters += user_input_letter
        hidden_letters = print_current_state_of_the_secret_word(found_letters)
    else:
        health = health.replace("<3", "X", 1)
        print(f"Wrong guess! You lost a heart. Your health is now: {health}")

    if hidden_letters == 0:
        print("Good job! You found all letters! The secret word was: " + input_word)
        break
    elif health.count("<3") == 0:
        print("Game Over! You ran out of health.")
        break
