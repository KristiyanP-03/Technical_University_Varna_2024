defmodule NumberFinder do
  def find_digits(sum, diff) do
    diff_div_9 = div(diff, 9)


    x = div(sum - diff_div_9, 2)
    y = sum - x

    IO.puts("Цифрите на числото са: x = #{x}, y = #{y}")
  end
end

NumberFinder.find_digits(12, 9)
