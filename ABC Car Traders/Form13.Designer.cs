namespace ABC_Car_Traders
{
    partial class Form13
    {
        private System.ComponentModel.IContainer components = null;

        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        private void InitializeComponent()
        {
            label1 = new Label();
            panel1 = new Panel();
            search_button = new Button();
            search_box = new TextBox();
            label2 = new Label();
            panel2 = new Panel();
            button1 = new Button();
            btnEdit = new Button();
            textBox6 = new TextBox();
            textBox5 = new TextBox();
            textBox4 = new TextBox();
            textBox3 = new TextBox();
            textBox2 = new TextBox();
            textBox1 = new TextBox();
            label6 = new Label();
            label5 = new Label();
            label4 = new Label();
            label3 = new Label();
            label8 = new Label();
            label7 = new Label();
            panel1.SuspendLayout();
            panel2.SuspendLayout();
            SuspendLayout();
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Font = new Font("Segoe UI", 20.25F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label1.ForeColor = SystemColors.ActiveCaptionText;
            label1.Location = new Point(555, 58);
            label1.Name = "label1";
            label1.Size = new Size(298, 37);
            label1.TabIndex = 0;
            label1.Text = "Manage Order Details";
            label1.TextAlign = ContentAlignment.TopCenter;
            label1.Click += label1_Click;
            // 
            // panel1
            // 
            panel1.BackColor = Color.RoyalBlue;
            panel1.Controls.Add(search_button);
            panel1.Controls.Add(search_box);
            panel1.Controls.Add(label2);
            panel1.Controls.Add(label1);
            panel1.ForeColor = SystemColors.ControlDarkDark;
            panel1.Location = new Point(-3, -1);
            panel1.Name = "panel1";
            panel1.Size = new Size(1358, 196);
            panel1.TabIndex = 1;
            // 
            // search_button
            // 
            search_button.BackColor = Color.SteelBlue;
            search_button.FlatStyle = FlatStyle.Flat;
            search_button.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            search_button.ForeColor = Color.White;
            search_button.Location = new Point(1223, 148);
            search_button.Name = "search_button";
            search_button.Size = new Size(98, 30);
            search_button.TabIndex = 3;
            search_button.Text = "Search";
            search_button.UseVisualStyleBackColor = false;
            search_button.Click += search_button_Click;
            // 
            // search_box
            // 
            search_box.Location = new Point(1049, 155);
            search_box.Name = "search_box";
            search_box.Size = new Size(158, 23);
            search_box.TabIndex = 2;
            search_box.TextChanged += search_box_TextChanged;
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label2.ForeColor = SystemColors.ActiveCaptionText;
            label2.Location = new Point(949, 157);
            label2.Name = "label2";
            label2.Size = new Size(78, 21);
            label2.TabIndex = 1;
            label2.Text = "Order ID:";
            label2.Click += label2_Click;
            // 
            // panel2
            // 
            panel2.BackColor = Color.CornflowerBlue;
            panel2.Controls.Add(button1);
            panel2.Controls.Add(btnEdit);
            panel2.Controls.Add(textBox6);
            panel2.Controls.Add(textBox5);
            panel2.Controls.Add(textBox4);
            panel2.Controls.Add(textBox3);
            panel2.Controls.Add(textBox2);
            panel2.Controls.Add(textBox1);
            panel2.Controls.Add(label6);
            panel2.Controls.Add(label5);
            panel2.Controls.Add(label4);
            panel2.Controls.Add(label3);
            panel2.Controls.Add(label8);
            panel2.Controls.Add(label7);
            panel2.Location = new Point(-3, 192);
            panel2.Name = "panel2";
            panel2.Size = new Size(1358, 711);
            panel2.TabIndex = 2;
            // 
            // button1
            // 
            button1.BackColor = Color.MidnightBlue;
            button1.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            button1.ForeColor = SystemColors.ControlLightLight;
            button1.Location = new Point(1261, 463);
            button1.Name = "button1";
            button1.Size = new Size(85, 44);
            button1.TabIndex = 5;
            button1.Text = "BACK";
            button1.UseVisualStyleBackColor = false;
            button1.Click += button1_Click;
            // 
            // btnEdit
            // 
            btnEdit.BackColor = Color.Green;
            btnEdit.FlatStyle = FlatStyle.Flat;
            btnEdit.Font = new Font("Segoe UI", 9F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btnEdit.ForeColor = Color.White;
            btnEdit.Location = new Point(965, 333);
            btnEdit.Name = "btnEdit";
            btnEdit.Size = new Size(106, 24);
            btnEdit.TabIndex = 13;
            btnEdit.Text = "Update";
            btnEdit.UseVisualStyleBackColor = false;
            btnEdit.Click += btnEdit_Click;
            // 
            // textBox6
            // 
            textBox6.Location = new Point(630, 284);
            textBox6.Name = "textBox6";
            textBox6.Size = new Size(295, 23);
            textBox6.TabIndex = 12;
            // 
            // textBox5
            // 
            textBox5.Location = new Point(630, 239);
            textBox5.Name = "textBox5";
            textBox5.Size = new Size(295, 23);
            textBox5.TabIndex = 11;
            // 
            // textBox4
            // 
            textBox4.Location = new Point(630, 333);
            textBox4.Name = "textBox4";
            textBox4.Size = new Size(295, 23);
            textBox4.TabIndex = 10;
            // 
            // textBox3
            // 
            textBox3.Location = new Point(630, 196);
            textBox3.Name = "textBox3";
            textBox3.Size = new Size(295, 23);
            textBox3.TabIndex = 9;
            // 
            // textBox2
            // 
            textBox2.Location = new Point(630, 151);
            textBox2.Name = "textBox2";
            textBox2.Size = new Size(295, 23);
            textBox2.TabIndex = 8;
            // 
            // textBox1
            // 
            textBox1.Location = new Point(630, 106);
            textBox1.Name = "textBox1";
            textBox1.Size = new Size(295, 23);
            textBox1.TabIndex = 7;
            // 
            // label6
            // 
            label6.AutoSize = true;
            label6.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label6.Location = new Point(498, 286);
            label6.Name = "label6";
            label6.Size = new Size(95, 21);
            label6.TabIndex = 6;
            label6.Text = "Item Name";
            // 
            // label5
            // 
            label5.AutoSize = true;
            label5.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label5.Location = new Point(498, 239);
            label5.Name = "label5";
            label5.Size = new Size(114, 21);
            label5.TabIndex = 5;
            label5.Text = "Total Amount";
            // 
            // label4
            // 
            label4.AutoSize = true;
            label4.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label4.Location = new Point(498, 335);
            label4.Name = "label4";
            label4.Size = new Size(104, 21);
            label4.TabIndex = 4;
            label4.Text = "Order Status";
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label3.Location = new Point(498, 196);
            label3.Name = "label3";
            label3.Size = new Size(93, 21);
            label3.TabIndex = 3;
            label3.Text = "Order Date";
            // 
            // label8
            // 
            label8.AutoSize = true;
            label8.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label8.Location = new Point(498, 151);
            label8.Name = "label8";
            label8.Size = new Size(104, 21);
            label8.TabIndex = 2;
            label8.Text = "Customer ID";
            // 
            // label7
            // 
            label7.AutoSize = true;
            label7.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label7.Location = new Point(498, 106);
            label7.Name = "label7";
            label7.Size = new Size(74, 21);
            label7.TabIndex = 1;
            label7.Text = "Order ID";
            // 
            // Form13
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(1350, 729);
            Controls.Add(panel2);
            Controls.Add(panel1);
            Name = "Form13";
            Text = "Manage Order Details";
            Load += Form13_Load;
            panel1.ResumeLayout(false);
            panel1.PerformLayout();
            panel2.ResumeLayout(false);
            panel2.PerformLayout();
            ResumeLayout(false);
        }

        private Panel panel1;
        private Button search_button;
        private TextBox search_box;
        private Label label2;
        private Label label1;
        private Panel panel2;
        private Button btnEdit;
        private TextBox textBox6;
        private TextBox textBox5;
        private TextBox textBox4;
        private TextBox textBox3;
        private TextBox textBox2;
        private TextBox textBox1;
        private Label label6;
        private Label label5;
        private Label label4;
        private Label label3;
        private Label label8;
        private Label label7;
        private Button button1;
    }
}
