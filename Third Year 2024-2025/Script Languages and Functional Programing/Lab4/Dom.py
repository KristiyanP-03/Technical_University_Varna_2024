class Time:
    def __init__(self, hours, minutes, seconds):
        self.hours = hours
        self.minutes = minutes
        self.seconds = seconds

    def add_hour(self, hours_passed):
        self.hours = (self.hours + hours_passed) % 24

    def add_minutes(self, minutes_passed):
        self.minutes += minutes_passed
        if self.minutes >= 60:
            next_hours = self.minutes // 60
            self.minutes = self.minutes % 60
            self.add_hour(next_hours)

    def add_seconds(self, seconds_passed):
        self.seconds += seconds_passed
        if self.seconds >= 60:
            next_minutes = self.seconds // 60
            self.seconds = self.seconds % 60
            self.add_minutes(next_minutes)

    def current_time_is(self):
        am_or_pm = ["AM", "PM"]
        if self.hours < 12:
            return f"{self.hours:02}:{self.minutes:02}:{self.seconds:02} {am_or_pm[0]}"
        else:
            return f"{self.hours:02}:{self.minutes:02}:{self.seconds:02} {am_or_pm[1]}"



time1 = Time(7, 34, 1)
print(time1.current_time_is())
time1.add_hour(2)
time1.add_minutes(10)
time1.add_seconds(55)
print(time1.current_time_is())

print("")

time2 = Time(23, 59, 50)
print(time2.current_time_is())
time2.add_hour(2)
time2.add_minutes(10)
time2.add_seconds(15)
print(time2.current_time_is())

