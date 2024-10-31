namespace zad2
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                int inputDay = int.Parse(textBox1.Text);
                int inputMonth = int.Parse(textBox2.Text);
                int inputYear = int.Parse(textBox3.Text);

                DateTime birthDate = new DateTime(inputYear, inputMonth, inputDay);
                DateTime today = DateTime.Today;


                int years = today.Year - birthDate.Year;
                int months = today.Month - birthDate.Month;



                if (months < 0)
                {
                    years--;
                    months += 12;
                }


                MessageBox.Show($"{years} years and {months} months");
            }
            catch (Exception ex)
            {
                MessageBox.Show("Invalid input");
            }
        }
    }
}
