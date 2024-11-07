using static System.Windows.Forms.VisualStyles.VisualStyleElement.Header;

namespace WinFormsApp1
{
    public partial class Form1 : Form
    {
        int timeLeft = 30;
        int result;

        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            label1.Text = "Answer!";
            timer1.Tick += new EventHandler(timer1_Tick);
            timer1.Start();
            timeLeft = 30;

            Random random = new Random();
            int randomNumber = random.Next(1, 51);
            int randomNumber2 = random.Next(1, 51);
            int randomOperation = random.Next(1, 5);


            label3.Text = randomNumber.ToString();
            label5.Text = randomNumber2.ToString();

            int x = int.Parse(label3.Text);
            int y = int.Parse(label5.Text);


            string operation;
            switch (randomOperation)
            {
                case 1:
                    label4.Text = "+";
                    result = x + y;
                    break;
                case 2:
                    label4.Text = "-";
                    result = x - y;
                    break;
                case 3:
                    label4.Text = "*";
                    result = x * y;
                    break;
                case 4:
                    label4.Text = "/";
                    result = x / y;
                    break;
            }



            Button newButton = new Button();
            newButton.Text = "New Button";  // Set the text on the button
            newButton.Size = new Size(100, 50);  // Set the size of the button
            newButton.Location = new Point(200, 200);  // Set the location where the button will appear

            // Optionally, add an event handler for the button click event
            newButton.Click += new EventHandler(NewButton_Click);

            // Add the button to the form
            this.Controls.Add(newButton);

        }

        private void NewButton_Click(object sender, EventArgs e)
        {
            if (numericUpDown1.Value == Convert.ToDecimal(result))
            {
                label1.Text = "Great Job!";
                timer1.Stop();
            }
            else
            {
                label1.Text = ":C";
            }
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            timeLeft--;
            label2.Text = timeLeft.ToString() + " sec";

            if (timeLeft <= 0)
            {
                timer1.Stop(); // Stop the timer
                label2.Text = "Time's up!"; // Display message
                                            // Optionally, you can reset or handle the game logic here.
            }
        }
    }
}
