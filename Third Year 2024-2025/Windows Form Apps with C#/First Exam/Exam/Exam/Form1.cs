namespace Exam
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        public double one_btc = 1168;
        public double one_uan = 0.15 * 1.76;
        public double one_usd = 1.76;
        public double one_eur = 1.95;


        private void button1_Click(object sender, EventArgs e)
        {
            double sum = ((double.Parse(textBox1.Text) * one_btc
            + double.Parse(textBox2.Text) * one_uan)
            * (double.Parse(textBox3.Text) / 100)) * one_eur;

            textBox4.Text = sum.ToString();
        }

        private void textBox1_Validating(object sender, System.ComponentModel.CancelEventArgs e)
        {
            int min = 1;
            int max = 20;

            if (int.TryParse(textBox1.Text, out int value))
            {
                if (value < min || value > max)
                {
                    e.Cancel = true;
                    MessageBox.Show($"textBox1 {min} - {max}", "Invalid Input");
                }
            }
            else
            {
                e.Cancel = true;
            }
        }

        private void textBox1_KeyPress(object sender, KeyPressEventArgs e)
        {
            if (!char.IsDigit(e.KeyChar) && !char.IsControl(e.KeyChar))
            {
                e.Handled = true;
            }
        }

        private void textBox2_Validating(object sender, System.ComponentModel.CancelEventArgs e)
        {
            double min = 0.00;
            double max = 50000.00;

            if (int.TryParse(textBox1.Text, out int value))
            {
                if (value < min || value > max)
                {
                    e.Cancel = true;
                    MessageBox.Show($"textBox2 {min} - {max}", "Invalid Input");
                }
            }
            else
            {
                e.Cancel = true;
            }
        }

        private void textBox2_KeyPress(object sender, KeyPressEventArgs e)
        {
            if (e.KeyChar == '.')
            {
                if (textBox2.Text.Contains('.'))
                {
                    e.Handled = true;
                }
                else if (textBox2.Text.Length == 0)
                {
                    e.Handled = true;
                }
            }

            if (!char.IsDigit(e.KeyChar) && !char.IsControl(e.KeyChar) && e.KeyChar != '.')
            {
                e.Handled = true;
            }
        }

        private void textBox3_Validating(object sender, System.ComponentModel.CancelEventArgs e)
        {
            double min = 0.00;
            double max = 5.00;

            if (int.TryParse(textBox1.Text, out int value))
            {
                if (value < min || value > max)
                {
                    e.Cancel = true;
                    MessageBox.Show($"textBox3 {min} - {max}", "Invalid Input");
                }
            }
            else
            {
                e.Cancel = true;
            }
        }

        private void textBox3_KeyPress(object sender, KeyPressEventArgs e)
        {
            if (e.KeyChar == '.')
            {
                if (textBox3.Text.Contains('.'))
                {
                    e.Handled = true;
                }
                else if (textBox3.Text.Length == 0)
                {
                    e.Handled = true;
                }
            }

            if (!char.IsDigit(e.KeyChar) && !char.IsControl(e.KeyChar) && e.KeyChar != '.')
            {
                e.Handled = true;
            }
        }

    }
}
