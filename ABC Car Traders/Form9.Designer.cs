namespace ABC_Car_Traders
{
    partial class Form9
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
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
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Form9));
            panel1 = new Panel();
            order_details = new Label();
            parts_details = new Label();
            label2 = new Label();
            label1 = new Label();
            button1 = new Button();
            label4 = new Label();
            pictureBox1 = new PictureBox();
            label3 = new Label();
            panel1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)pictureBox1).BeginInit();
            SuspendLayout();
            // 
            // panel1
            // 
            panel1.BackColor = Color.Orange;
            panel1.Controls.Add(label3);
            panel1.Controls.Add(order_details);
            panel1.Controls.Add(parts_details);
            panel1.Controls.Add(label2);
            panel1.Controls.Add(label1);
            panel1.ForeColor = Color.SeaShell;
            panel1.Location = new Point(-6, 0);
            panel1.Name = "panel1";
            panel1.Size = new Size(1358, 202);
            panel1.TabIndex = 1;
            // 
            // order_details
            // 
            order_details.AutoSize = true;
            order_details.Font = new Font("Segoe UI", 9F, FontStyle.Bold, GraphicsUnit.Point, 0);
            order_details.ForeColor = Color.Maroon;
            order_details.Location = new Point(1280, 158);
            order_details.Name = "order_details";
            order_details.Size = new Size(53, 30);
            order_details.TabIndex = 4;
            order_details.Text = " ORDER \r\n STATUS";
            order_details.Click += order_details_Click;
            // 
            // parts_details
            // 
            parts_details.AutoSize = true;
            parts_details.Font = new Font("Segoe UI", 9F, FontStyle.Bold, GraphicsUnit.Point, 0);
            parts_details.ForeColor = Color.Maroon;
            parts_details.Location = new Point(1043, 158);
            parts_details.Name = "parts_details";
            parts_details.Size = new Size(53, 30);
            parts_details.TabIndex = 2;
            parts_details.Text = "  CAR \r\nDETAILS";
            parts_details.Click += parts_details_Click;
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.Font = new Font("Segoe UI", 9F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label2.ForeColor = Color.Maroon;
            label2.Location = new Point(1202, 158);
            label2.Name = "label2";
            label2.Size = new Size(47, 30);
            label2.TabIndex = 1;
            label2.Text = "PLACE\r\nORDER";
            label2.Click += label2_Click;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Font = new Font("Segoe UI", 21.75F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label1.ForeColor = Color.White;
            label1.Location = new Point(562, 68);
            label1.Name = "label1";
            label1.Size = new Size(238, 40);
            label1.TabIndex = 0;
            label1.Text = "ABC Car Traders";
            label1.TextAlign = ContentAlignment.TopCenter;
            // 
            // button1
            // 
            button1.BackColor = Color.DarkOrange;
            button1.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            button1.ForeColor = Color.White;
            button1.Location = new Point(91, 545);
            button1.Name = "button1";
            button1.Size = new Size(111, 56);
            button1.TabIndex = 5;
            button1.Text = "LOG OUT";
            button1.UseVisualStyleBackColor = false;
            button1.Click += button1_Click;
            // 
            // label4
            // 
            label4.AutoSize = true;
            label4.Font = new Font("Segoe UI", 11.25F, FontStyle.Regular, GraphicsUnit.Point, 0);
            label4.Location = new Point(91, 235);
            label4.Name = "label4";
            label4.Size = new Size(666, 240);
            label4.TabIndex = 6;
            label4.Text = resources.GetString("label4.Text");
            label4.Click += label4_Click;
            // 
            // pictureBox1
            // 
            pictureBox1.Image = (Image)resources.GetObject("pictureBox1.Image");
            pictureBox1.Location = new Point(885, 235);
            pictureBox1.Name = "pictureBox1";
            pictureBox1.Size = new Size(411, 448);
            pictureBox1.SizeMode = PictureBoxSizeMode.StretchImage;
            pictureBox1.TabIndex = 7;
            pictureBox1.TabStop = false;
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.Font = new Font("Segoe UI", 9F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label3.ForeColor = Color.Maroon;
            label3.Location = new Point(1120, 158);
            label3.Name = "label3";
            label3.Size = new Size(46, 30);
            label3.TabIndex = 5;
            label3.Text = "  CAR \r\n PARTS";
            label3.Click += label3_Click;
            // 
            // Form9
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(1350, 729);
            Controls.Add(pictureBox1);
            Controls.Add(label4);
            Controls.Add(button1);
            Controls.Add(panel1);
            Name = "Form9";
            Text = "Customer Dashboard";
            panel1.ResumeLayout(false);
            panel1.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)pictureBox1).EndInit();
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Panel panel1;
        private Label order_details;
        private Label parts_details;
        private Label label2;
        private Label label1;
        private Button button1;
        private Label label4;
        private PictureBox pictureBox1;
        private Label label3;
    }
}