namespace WinFormsApp1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            double a;
            double b;
            double c;

            double D;

            try {
                a = double.Parse(textBox1.Text);
                b = double.Parse(textBox2.Text);
                c = double.Parse(textBox3.Text);

                D = (b * b) - (4 * a * c);

                if (D > 0)
                {
                    double x1 = (-b + Math.Sqrt(D)) / (2 * a);
                    double x2 = (-b - Math.Sqrt(D)) / (2 * a);
                    label6.Text = x1.ToString();
                    label7.Text = x2.ToString();
                }
                else if (D == 0)
                {
                    double x = -b / (2 * a);
                    label6.Text = x.ToString();
                    label7.Text = x.ToString();
                }
                else
                {
                    MessageBox.Show("Няма реални корени!");
                }

            }
            catch {
                MessageBox.Show("Error! Invalid input");
            }
        }
    }
}
