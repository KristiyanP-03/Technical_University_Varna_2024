using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace SendDataToNewForm
{
    public partial class Form2 : Form
    {
        public Form2(string data)
        {
            InitializeComponent();
            label1.Text = data;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form1 frm1 = new Form1();
            frm1.Show();
            this.Close();

        }
    }
}
