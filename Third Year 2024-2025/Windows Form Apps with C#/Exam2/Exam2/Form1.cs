namespace Exam2
{
    public partial class Form1 : Form
    {
        double sum = 0;
        double obsh_danuk = 0;
        double not_taks = 0;
        double dds = 0;
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Hide();
            Form2 frm2 = new Form2(obsh_danuk, not_taks, dds);
            frm2.Show();
        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {
            try
            {
                double input = double.Parse(textBox2.Text);

                obsh_danuk = input * (2.6 / 100);
                not_taks = input * (1.605 / 100);
                dds = not_taks * 0.2;

                sum = obsh_danuk + not_taks + dds;

                label6.Text = sum.ToString("F2") + " лв.";
            }
            catch
            {
                MessageBox.Show("ERROR!");
            }
        }

        private void textBox1_Validating(object sender, System.ComponentModel.CancelEventArgs e)
        {

        }

        private void textBox2_Validating(object sender, System.ComponentModel.CancelEventArgs e)
        {

        }

        private void novKlientToolStripMenuItem_Click(object sender, EventArgs e)
        {
            textBox1.Text = "";
            textBox2.Text = "";
            comboBox1.Text = "";

        }
    }
}
