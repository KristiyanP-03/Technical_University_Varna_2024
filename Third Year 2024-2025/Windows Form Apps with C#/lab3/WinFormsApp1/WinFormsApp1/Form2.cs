using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WinFormsApp1
{
    public partial class Form2 : Form
    {
        public Form2()
        {
            InitializeComponent();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Form1 form1 = new Form1();
            form1.Show();
            this.Close();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            radioButton1.Checked = false;
            radioButton2.Checked = false;
            textBox1.Clear();
            textBox2.Clear();
            textBox3.Clear();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            if (radioButton1.Checked == true)
            {
                double a = double.Parse(textBox1.Text);
                double b = double.Parse(textBox2.Text);

                double result = Math.Pow((a + b), 2);

                textBox3.Text = result.ToString();
            }
            else if (radioButton2.Checked == true)
            {
                double a = double.Parse(textBox1.Text);
                double b = double.Parse(textBox2.Text);

                double result = Math.Pow((a - b), 2);

                textBox3.Text = result.ToString();
            }
        }
    }
}
