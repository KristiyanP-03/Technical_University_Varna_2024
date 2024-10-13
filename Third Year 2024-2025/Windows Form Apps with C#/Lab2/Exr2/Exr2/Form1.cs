namespace Exr2
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            double result;

            try
            {
                double number = double.Parse(textBox1.Text);


                if (comboBox1.Text == "C")
                {
                    result = ((9/5)*number+32);
                    textBox2.Text = result.ToString();
                }
                else if (comboBox1.Text == "F")
                {
                    result = ((5 / 9) * (number - 32));
                    textBox2.Text = result.ToString();
                }
            }
            catch {
                
            }
        }
    }
}
