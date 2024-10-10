namespace Project2
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        Calculator calculator = new Calculator();

        double num1;
        double num2;
        double result;


        private void button1_Click(object sender, EventArgs e)
        {
            double sumBothNumbers(double num1, double num2)
            {
                return num1 + num2;
            }


            try
            {
                num1 = Double.Parse(textBox1.Text);
                num2 = Double.Parse(textBox2.Text);

                //result = sumBothNumbers(num1, num2);
                result = calculator.sumBothNumbers(num1, num2);

                textBox3.Text = result.ToString();
            }
            catch
            {
                MessageBox.Show("Invalid input!");
                textBox1.Clear();
                textBox2.Clear();
                textBox3.Clear();
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            try
            {
                num1 = Double.Parse(textBox1.Text);
                num2 = Double.Parse(textBox2.Text);

                result = calculator.subBothNumbers(num1, num2);

                textBox3.Text = result.ToString();
            }
            catch
            {
                MessageBox.Show("Invalid input!");
                textBox1.Clear();
                textBox2.Clear();
                textBox3.Clear();
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            try
            {
                num1 = Double.Parse(textBox1.Text);
                num2 = Double.Parse(textBox2.Text);

                result = calculator.multiplyBothNumbers(num1, num2);

                textBox3.Text = result.ToString();
            }
            catch
            {
                MessageBox.Show("Invalid input!");
                textBox1.Clear();
                textBox2.Clear();
                textBox3.Clear();
            }
        }

        private void button4_Click(object sender, EventArgs e)
        {
            try
            {
                num1 = Double.Parse(textBox1.Text);
                num2 = Double.Parse(textBox2.Text);

                result = calculator.divideBothNumbers(num1, num2);

                textBox3.Text = result.ToString();
            }
            catch
            {
                MessageBox.Show("Invalid input!");
                textBox1.Clear();
                textBox2.Clear();
                textBox3.Clear();
            }
        }
    }
}
