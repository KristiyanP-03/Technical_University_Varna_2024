using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Exam2
{
    public partial class Form2 : Form
    {
        public Form2(double obsh_danuk, double not_taks, double dds)
        {
            InitializeComponent();
            textBox1.Text = obsh_danuk.ToString("F2") + " лв.";
            textBox2.Text = not_taks.ToString("F2") + " лв.";
            textBox3.Text = dds.ToString("F2") + " лв.";
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form1 frm1 = new Form1();
            frm1.Show();
            this.Close();
        }

        private void checkBox1_CheckedChanged(object sender, EventArgs e)
        {
            try
            {
                string current_text = textBox2.Text;

                if (checkBox1.Checked)
                {
                    textBox2.Text = "0";
                }
                else
                {
                    textBox2.Text = current_text;
                }
            }
            catch {
                MessageBox.Show("Error!");
            }

        }
    }
}
