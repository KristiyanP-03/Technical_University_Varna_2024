namespace SendDataToNewForm
{
    public partial class Form1 : Form
    {
        string data = "";
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            data = textBox1.Text;
            this.Hide();
            Form2 frm2 = new Form2(data);
            frm2.Show();
        }
    }
}
