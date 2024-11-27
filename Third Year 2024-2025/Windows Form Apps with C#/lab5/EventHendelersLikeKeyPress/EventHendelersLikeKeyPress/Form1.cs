namespace EventHendelersLikeKeyPress
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void textBox1_KeyPress(object sender, KeyPressEventArgs e)
        {
            // Allow only digits
            if (!char.IsDigit(e.KeyChar) && !char.IsControl(e.KeyChar))
            {
                e.Handled = true; // Block the input
            }

            // Restrict to 10 characters
            if (textBox1.Text.Length >= 10 && !char.IsControl(e.KeyChar))
            {
                e.Handled = true; // Block the input if already 10 digits
            }
        }
    }
}
