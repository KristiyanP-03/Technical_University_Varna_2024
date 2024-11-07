namespace WinFormsApp2
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            // Създаване на първата текстова кутия
            TextBox textBox1 = new TextBox
            {
                Location = new Point(10, 50),  // Определете местоположението
                Width = 100,
                Name = "textBox1"
            };

            // Добавяне на първата текстова кутия към формата
            this.Controls.Add(textBox1);

            // Създаване на втората текстова кутия
            TextBox textBox2 = new TextBox
            {
                Location = new Point(120, 50),  // Определете местоположението
                Width = 100,
                Name = "textBox2"
            };

            // Добавяне на втората текстова кутия към формата
            this.Controls.Add(textBox2);

        }

        private void button2_Click(object sender, EventArgs e)
        {
            
        }
    }
}
