namespace ABC_Car_Traders
{
    partial class Form3
    {
        private System.ComponentModel.IContainer components = null;

        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Form3));
            panel1 = new Panel();
            label3 = new Label();
            order_details = new Label();
            customer_details = new Label();
            parts_details = new Label();
            label2 = new Label();
            label1 = new Label();
            button1 = new Button();
            button2 = new Button();
            pictureBox1 = new PictureBox();
            label4 = new Label();
            panel1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)pictureBox1).BeginInit();
            SuspendLayout();
            // 
            // panel1
            // 
            panel1.BackColor = Color.CornflowerBlue;
            panel1.BackgroundImage = (Image)resources.GetObject("panel1.BackgroundImage");
            panel1.Controls.Add(label3);
            panel1.Controls.Add(order_details);
            panel1.Controls.Add(customer_details);
            panel1.Controls.Add(parts_details);
            panel1.Controls.Add(label2);
            panel1.Controls.Add(label1);
            panel1.ForeColor = SystemColors.ControlDark;
            panel1.Location = new Point(0, 0);
            panel1.Name = "panel1";
            panel1.Size = new Size(1350, 206);
            panel1.TabIndex = 0;
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.BackColor = Color.Transparent;
            label3.Font = new Font("Segoe UI", 9F, FontStyle.Bold);
            label3.ForeColor = Color.Navy;
            label3.Location = new Point(1285, 158);
            label3.Name = "label3";
            label3.Size = new Size(50, 30);
            label3.TabIndex = 5;
            label3.Text = " VIEW\r\nORDER \r\n";
            label3.Click += label3_Click;
            // 
            // order_details
            // 
            order_details.AutoSize = true;
            order_details.BackColor = Color.Transparent;
            order_details.Font = new Font("Segoe UI", 9F, FontStyle.Bold);
            order_details.ForeColor = Color.Navy;
            order_details.Location = new Point(1204, 158);
            order_details.Name = "order_details";
            order_details.Size = new Size(53, 30);
            order_details.TabIndex = 4;
            order_details.Text = " ORDER \r\nDETAILS";
            order_details.Click += order_details_Click;
            // 
            // customer_details
            // 
            customer_details.AutoSize = true;
            customer_details.BackColor = Color.Transparent;
            customer_details.Font = new Font("Segoe UI", 9F, FontStyle.Bold);
            customer_details.ForeColor = Color.Navy;
            customer_details.Location = new Point(1103, 158);
            customer_details.Name = "customer_details";
            customer_details.Size = new Size(74, 30);
            customer_details.TabIndex = 3;
            customer_details.Text = "CUSTOMER \r\n  DETAILS";
            customer_details.Click += customer_details_Click;
            // 
            // parts_details
            // 
            parts_details.AutoSize = true;
            parts_details.BackColor = Color.Transparent;
            parts_details.Font = new Font("Segoe UI", 9F, FontStyle.Bold);
            parts_details.ForeColor = Color.Navy;
            parts_details.Location = new Point(1026, 158);
            parts_details.Name = "parts_details";
            parts_details.Size = new Size(53, 30);
            parts_details.TabIndex = 2;
            parts_details.Text = " PARTS \r\nDETAILS";
            parts_details.Click += parts_details_Click;
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.BackColor = Color.Transparent;
            label2.Font = new Font("Segoe UI", 9F, FontStyle.Bold);
            label2.ForeColor = Color.Navy;
            label2.Location = new Point(936, 158);
            label2.Name = "label2";
            label2.Size = new Size(53, 30);
            label2.TabIndex = 1;
            label2.Text = "   CAR \r\nDETAILS";
            label2.Click += label2_Click;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.BackColor = Color.Transparent;
            label1.Font = new Font("Segoe UI", 20.25F, FontStyle.Bold);
            label1.ForeColor = Color.White;
            label1.Location = new Point(570, 70);
            label1.Name = "label1";
            label1.Size = new Size(222, 37);
            label1.TabIndex = 0;
            label1.Text = "ABC Car Traders";
            label1.TextAlign = ContentAlignment.TopCenter;
            // 
            // button1
            // 
            button1.BackColor = Color.MidnightBlue;
            button1.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            button1.ForeColor = SystemColors.ControlLightLight;
            button1.Location = new Point(216, 549);
            button1.Name = "button1";
            button1.Size = new Size(103, 53);
            button1.TabIndex = 1;
            button1.Text = "LOG OUT";
            button1.UseVisualStyleBackColor = false;
            button1.Click += button1_Click;
            // 
            // button2
            // 
            button2.BackColor = Color.MidnightBlue;
            button2.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            button2.ForeColor = SystemColors.ControlLightLight;
            button2.Location = new Point(97, 549);
            button2.Name = "button2";
            button2.Size = new Size(103, 53);
            button2.TabIndex = 2;
            button2.Text = "Report";
            button2.UseVisualStyleBackColor = false;
            button2.Click += button2_Click;
            // 
            // pictureBox1
            // 
            pictureBox1.Image = (Image)resources.GetObject("pictureBox1.Image");
            pictureBox1.Location = new Point(884, 237);
            pictureBox1.Name = "pictureBox1";
            pictureBox1.Size = new Size(411, 448);
            pictureBox1.SizeMode = PictureBoxSizeMode.StretchImage;
            pictureBox1.TabIndex = 3;
            pictureBox1.TabStop = false;
            // 
            // label4
            // 
            label4.AutoSize = true;
            label4.Font = new Font("Segoe UI", 11.25F, FontStyle.Regular, GraphicsUnit.Point, 0);
            label4.Location = new Point(97, 237);
            label4.Name = "label4";
            label4.Size = new Size(666, 240);
            label4.TabIndex = 4;
            label4.Text = resources.GetString("label4.Text");
            // 
            // Form3
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(1350, 729);
            Controls.Add(label4);
            Controls.Add(pictureBox1);
            Controls.Add(button2);
            Controls.Add(button1);
            Controls.Add(panel1);
            Name = "Form3";
            Text = "Admin Dashboard";
            panel1.ResumeLayout(false);
            panel1.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)pictureBox1).EndInit();
            ResumeLayout(false);
            PerformLayout();
        }

        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label customer_details;
        private System.Windows.Forms.Label parts_details;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label order_details;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Button button2;
        private PictureBox pictureBox1;
        private Label label4;
    }
}
