namespace palindrome
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string word = textBox1.Text;
            char[] array = new char[word.Length];



            for (int i = 0; i < word.Length; i++)
            {
                array[i] = word[i];
            }



            char[] array2 = array.Reverse().ToArray();



            if (array.SequenceEqual(array2))
            {
                MessageBox.Show("Yes, it is a palindrome!");
            }
            else
            {
                MessageBox.Show("No, it is not a palindrome.");
            }
        }
    }
}
