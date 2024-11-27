namespace ErrorHandling
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        bool invalidInput1 = false;
        private void textBox1_Validating(object sender, System.ComponentModel.CancelEventArgs e)
        {
            if (textBox1.Text == "")
            {
                errorProvider1.SetError(textBox1, "You must enter a first and last name.");
                invalidInput1 = true;
            }
            else
            {
                errorProvider1.Clear();
                invalidInput1 = false;
            }

        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (invalidInput1 == false)
            {
                MessageBox.Show(textBox1.Text);
            }
            else
            {
                //MessageBox.Show("Invalid input!");
            }
        }
    }
}
