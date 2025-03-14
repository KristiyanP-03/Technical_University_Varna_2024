class Singer:

    def __init__(self, name, age, fans, money):
        self.name = name
        self.age = age
        self.fans = fans
        self.money = money


    def show_info(self):
        print(f"{self.name} is {self.age} years old"
                f" and {self.fans} fans and makes {self.money} dollars!")

    def create_song(self, new_song, new_fans):
        print(f"New song created: {new_song}")
        self.fans += new_fans
        print(f"Popularity: {self.fans} fans")

    def play_concert(self, more_money):
        print(f"Money earned: {more_money}")
        self.money += more_money
        print(f"Money total: {self.money}")


Singer1 = Singer("Kristiyan", 21, 10, 0)
Singer1.show_info()
Singer1.create_song("Python Language song", 100)
Singer1.play_concert(1000)

print("\n\n")


Singer2 = Singer("Krischan", 21, 50, 1000)
Singer2.show_info()
Singer2.create_song("Programing", 300)
Singer2.play_concert(20000)