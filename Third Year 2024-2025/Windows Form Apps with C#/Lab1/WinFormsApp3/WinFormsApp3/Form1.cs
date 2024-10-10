namespace WinFormsApp3
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            int number;

            try
            {
                number = int.Parse(textBox1.Text);

                if ((number % 2) == 0)
                {
                    label1.Text = "Even";
                }
                else
                {
                    label1.Text = "Odd";
                }
            }
            catch
            {
                label1.Text = "Invalid input!\n Not a number or it is not int";
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Form2 form = new Form2();
            form.Show();
            //this.Close();
        }
    }
}
