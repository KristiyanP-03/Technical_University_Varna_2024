namespace WinFormsApp1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void степенуванеToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Form2 form2 = new Form2();
            form2.Show();
        }

        private void съкратеноУмножениеToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Form3 form3 = new Form3();
            form3.Show();
        }

        private void квадратноУравнениеToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Form4 form4 = new Form4();
            form4.Show();
        }

        private void класToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }

        private void математическиФормулиToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }
    }
}
