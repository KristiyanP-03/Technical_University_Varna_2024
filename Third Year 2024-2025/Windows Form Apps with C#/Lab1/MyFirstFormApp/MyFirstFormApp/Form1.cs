namespace MyFirstFormApp
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            //Тук се пише функционалноста на бутона
            MessageBox.Show("Иформация за приложението:\n\t Просто натисни другия бутон.");
        }



        private void button1_Click(object sender, EventArgs e)
        {
            Random num = new Random();

            int color_index = num.Next(0, 4); // 0 - 3 генерира индекс

            switch (color_index)
            {
                case 0: 
                    this.BackColor = Color.White; 
                    break;

                case 1:
                    this.BackColor = Color.Blue;
                    break;

                case 2:
                    this.BackColor = Color.Green;
                    break;

                case 3:
                    this.BackColor = Color.Red;
                    break;
            }
        }
    }
}
