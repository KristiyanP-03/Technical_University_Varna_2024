namespace Project2
{
    partial class Form1
    {
        /// <summary>
        ///  Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        ///  Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        ///  Required method for Designer support - do not modify
        ///  the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            button1 = new Button();
            textBox1 = new TextBox();
            textBox2 = new TextBox();
            textBox3 = new TextBox();
            label1 = new Label();
            label2 = new Label();
            label3 = new Label();
            label4 = new Label();
            button2 = new Button();
            button3 = new Button();
            button4 = new Button();
            SuspendLayout();
            // 
            // button1
            // 
            button1.Location = new Point(207, 218);
            button1.Name = "button1";
            button1.Size = new Size(39, 34);
            button1.TabIndex = 0;
            button1.Text = "+";
            button1.UseVisualStyleBackColor = true;
            button1.Click += button1_Click;
            // 
            // textBox1
            // 
            textBox1.Location = new Point(207, 25);
            textBox1.Name = "textBox1";
            textBox1.Size = new Size(150, 31);
            textBox1.TabIndex = 1;
            // 
            // textBox2
            // 
            textBox2.Location = new Point(207, 111);
            textBox2.Name = "textBox2";
            textBox2.Size = new Size(150, 31);
            textBox2.TabIndex = 2;
            // 
            // textBox3
            // 
            textBox3.Enabled = false;
            textBox3.Location = new Point(161, 360);
            textBox3.Name = "textBox3";
            textBox3.Size = new Size(361, 31);
            textBox3.TabIndex = 3;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Location = new Point(30, 31);
            label1.Name = "label1";
            label1.Size = new Size(124, 25);
            label1.TabIndex = 4;
            label1.Text = "First Number :";
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.Location = new Point(42, 117);
            label2.Name = "label2";
            label2.Size = new Size(150, 25);
            label2.TabIndex = 5;
            label2.Text = "Second Number :";
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.Location = new Point(42, 227);
            label3.Name = "label3";
            label3.Size = new Size(101, 25);
            label3.TabIndex = 6;
            label3.Text = "Operation :";
            // 
            // label4
            // 
            label4.AutoSize = true;
            label4.Location = new Point(42, 360);
            label4.Name = "label4";
            label4.Size = new Size(68, 25);
            label4.TabIndex = 7;
            label4.Text = "Result :";
            // 
            // button2
            // 
            button2.Location = new Point(262, 218);
            button2.Name = "button2";
            button2.Size = new Size(41, 34);
            button2.TabIndex = 8;
            button2.Text = "-";
            button2.UseVisualStyleBackColor = true;
            button2.Click += button2_Click;
            // 
            // button3
            // 
            button3.Location = new Point(323, 218);
            button3.Name = "button3";
            button3.Size = new Size(34, 34);
            button3.TabIndex = 9;
            button3.Text = "*";
            button3.UseVisualStyleBackColor = true;
            button3.Click += button3_Click;
            // 
            // button4
            // 
            button4.Location = new Point(381, 218);
            button4.Name = "button4";
            button4.Size = new Size(32, 34);
            button4.TabIndex = 10;
            button4.Text = "/";
            button4.UseVisualStyleBackColor = true;
            button4.Click += button4_Click;
            // 
            // Form1
            // 
            AutoScaleDimensions = new SizeF(10F, 25F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(648, 403);
            Controls.Add(button4);
            Controls.Add(button3);
            Controls.Add(button2);
            Controls.Add(label4);
            Controls.Add(label3);
            Controls.Add(label2);
            Controls.Add(label1);
            Controls.Add(textBox3);
            Controls.Add(textBox2);
            Controls.Add(textBox1);
            Controls.Add(button1);
            Name = "Form1";
            Text = "Calculator";
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Button button1;
        private TextBox textBox1;
        private TextBox textBox2;
        private TextBox textBox3;
        private Label label1;
        private Label label2;
        private Label label3;
        private Label label4;
        private Button button2;
        private Button button3;
        private Button button4;
    }
}
