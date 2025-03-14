class Singer:

    def __init__(self, name, age, fans, money):
        self.name = name
        self.age = age
        self.fans = fans
        self.__money = money




    def show_info(self):
        print(f"{self.name} is {self.age} years old"
                f" and {self.fans} fans and makes {self.get_money()} dollars!")

    def create_song(self, new_song, new_fans):
        print(f"New song created: {new_song}")
        self.fans += new_fans
        print(f"Popularity: {self.fans} fans")

    def play_concert(self, more_money):
        print(f"Money earned: {more_money}")
        self.set_money(self.get_money() + more_money)
        print(f"Money total: {self.get_money()}")


    def get_money(self):
        return self.__money

    def set_money(self, current_money):
        self.__money = current_money
        if self.__money < 0:
            return print("Money cannot be negative!")

    def __kill_the_singer(self):
        print(f"{self.name} was killed!")

    def bounty_on_singer(self):
        self.__kill_the_singer()


Singer1 = Singer("Kristiyan", 21, 10, 0)
Singer1.show_info()
Singer1.create_song("Python Language song", 100)
Singer1.play_concert(1000)

print("\n\n")


Singer2 = Singer("Krischan", 21, 50, 1000)
Singer2.show_info()
Singer2.create_song("Programing", 300)
Singer2.play_concert(20000)
Singer2.bounty_on_singer()