namespace ABC_Car_Traders
{
    partial class Form6
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
            label10 = new Label();
            delete_button = new Button();
            btnEdit = new Button();
            btnAdd = new Button();
            textBox8 = new TextBox();
            textBox7 = new TextBox();
            textBox6 = new TextBox();
            textBox5 = new TextBox();
            textBox4 = new TextBox();
            textBox3 = new TextBox();
            textBox2 = new TextBox();
            textBox1 = new TextBox();
            label9 = new Label();
            label8 = new Label();
            label7 = new Label();
            label6 = new Label();
            label5 = new Label();
            label4 = new Label();
            label3 = new Label();
            button1 = new Button();
            panel1.SuspendLayout();
            panel2.SuspendLayout();
            SuspendLayout();
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Font = new Font("Segoe UI", 20.25F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label1.ForeColor = SystemColors.ActiveCaptionText;
            label1.Location = new Point(553, 49);
            label1.Name = "label1";
            label1.Size = new Size(348, 37);
            label1.TabIndex = 0;
            label1.Text = "Manage Customer Details";
            label1.TextAlign = ContentAlignment.TopCenter;
            label1.Click += label1_Click;
            // 
            // panel1
            // 
            panel1.BackColor = Color.CornflowerBlue;
            panel1.Controls.Add(search_button);
            panel1.Controls.Add(search_box);
            panel1.Controls.Add(label2);
            panel1.Controls.Add(label1);
            panel1.ForeColor = SystemColors.ControlDark;
            panel1.Location = new Point(0, 0);
            panel1.Name = "panel1";
            panel1.Size = new Size(1367, 232);
            panel1.TabIndex = 1;
            // 
            // search_button
            // 
            search_button.BackColor = Color.Firebrick;
            search_button.Font = new Font("Segoe UI", 9.75F, FontStyle.Bold, GraphicsUnit.Point, 0);
            search_button.ForeColor = Color.White;
            search_button.Location = new Point(1269, 192);
            search_button.Name = "search_button";
            search_button.Size = new Size(69, 29);
            search_button.TabIndex = 3;
            search_button.Text = "Search";
            search_button.UseVisualStyleBackColor = false;
            // 
            // search_box
            // 
            search_box.Location = new Point(1060, 198);
            search_box.Name = "search_box";
            search_box.Size = new Size(193, 23);
            search_box.TabIndex = 2;
            search_box.TextChanged += search_box_TextChanged;
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.Font = new Font("Segoe UI", 9.75F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label2.ForeColor = SystemColors.ActiveCaptionText;
            label2.Location = new Point(941, 204);
            label2.Name = "label2";
            label2.Size = new Size(89, 17);
            label2.TabIndex = 1;
            label2.Text = "Customer ID:";
            label2.Click += label2_Click;
            // 
            // panel2
            // 
            panel2.BackColor = Color.Silver;
            panel2.Controls.Add(label10);
            panel2.Controls.Add(delete_button);
            panel2.Controls.Add(btnEdit);
            panel2.Controls.Add(btnAdd);
            panel2.Controls.Add(textBox8);
            panel2.Controls.Add(textBox7);
            panel2.Controls.Add(textBox6);
            panel2.Controls.Add(textBox5);
            panel2.Controls.Add(textBox4);
            panel2.Controls.Add(textBox3);
            panel2.Controls.Add(textBox2);
            panel2.Controls.Add(textBox1);
            panel2.Controls.Add(label9);
            panel2.Controls.Add(label8);
            panel2.Controls.Add(label7);
            panel2.Controls.Add(label6);
            panel2.Controls.Add(label5);
            panel2.Controls.Add(label4);
            panel2.Controls.Add(label3);
            panel2.Location = new Point(202, 269);
            panel2.Name = "panel2";
            panel2.Size = new Size(970, 432);
            panel2.TabIndex = 2;
            // 
            // label10
            // 
            label10.AutoSize = true;
            label10.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label10.ForeColor = Color.Black;
            label10.Location = new Point(116, 66);
            label10.Name = "label10";
            label10.Size = new Size(108, 21);
            label10.TabIndex = 15;
            label10.Text = "Customer ID:";
            label10.Click += label10_Click;
            // 
            // delete_button
            // 
            delete_button.BackColor = Color.Firebrick;
            delete_button.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            delete_button.Location = new Point(838, 372);
            delete_button.Name = "delete_button";
            delete_button.Size = new Size(98, 43);
            delete_button.TabIndex = 14;
            delete_button.Text = "Delete";
            delete_button.UseVisualStyleBackColor = false;
            delete_button.Click += delete_button_Click;
            // 
            // btnEdit
            // 
            btnEdit.BackColor = Color.Firebrick;
            btnEdit.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btnEdit.Location = new Point(734, 372);
            btnEdit.Name = "btnEdit";
            btnEdit.Size = new Size(98, 43);
            btnEdit.TabIndex = 13;
            btnEdit.Text = "Edit";
            btnEdit.UseVisualStyleBackColor = false;
            btnEdit.Click += btnEdit_Click;
            // 
            // btnAdd
            // 
            btnAdd.BackColor = Color.Firebrick;
            btnAdd.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btnAdd.Location = new Point(634, 372);
            btnAdd.Name = "btnAdd";
            btnAdd.Size = new Size(98, 43);
            btnAdd.TabIndex = 14;
            btnAdd.Text = "Add";
            btnAdd.UseVisualStyleBackColor = false;
            btnAdd.Click += btnAdd_Click;
            // 
            // textBox8
            // 
            textBox8.Location = new Point(744, 304);
            textBox8.Name = "textBox8";
            textBox8.Size = new Size(172, 23);
            textBox8.TabIndex = 11;
            // 
            // textBox7
            // 
            textBox7.Location = new Point(744, 225);
            textBox7.Name = "textBox7";
            textBox7.Size = new Size(172, 23);
            textBox7.TabIndex = 10;
            // 
            // textBox6
            // 
            textBox6.Location = new Point(744, 138);
            textBox6.Name = "textBox6";
            textBox6.Size = new Size(172, 23);
            textBox6.TabIndex = 9;
            // 
            // textBox5
            // 
            textBox5.Location = new Point(744, 60);
            textBox5.Name = "textBox5";
            textBox5.Size = new Size(172, 23);
            textBox5.TabIndex = 8;
            // 
            // textBox4
            // 
            textBox4.Location = new Point(278, 304);
            textBox4.Name = "textBox4";
            textBox4.Size = new Size(172, 23);
            textBox4.TabIndex = 7;
            // 
            // textBox3
            // 
            textBox3.Location = new Point(278, 225);
            textBox3.Name = "textBox3";
            textBox3.Size = new Size(172, 23);
            textBox3.TabIndex = 6;
            // 
            // textBox2
            // 
            textBox2.Location = new Point(278, 138);
            textBox2.Name = "textBox2";
            textBox2.Size = new Size(172, 23);
            textBox2.TabIndex = 6;
            // 
            // textBox1
            // 
            textBox1.Location = new Point(278, 64);
            textBox1.Name = "textBox1";
            textBox1.Size = new Size(172, 23);
            textBox1.TabIndex = 6;
            // 
            // label9
            // 
            label9.AutoSize = true;
            label9.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label9.ForeColor = Color.Black;
            label9.Location = new Point(581, 306);
            label9.Name = "label9";
            label9.Size = new Size(147, 21);
            label9.TabIndex = 5;
            label9.Text = "Registration Date:";
            // 
            // label8
            // 
            label8.AutoSize = true;
            label8.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label8.ForeColor = Color.Black;
            label8.Location = new Point(582, 229);
            label8.Name = "label8";
            label8.Size = new Size(44, 21);
            label8.TabIndex = 4;
            label8.Text = "City:";
            // 
            // label7
            // 
            label7.AutoSize = true;
            label7.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label7.ForeColor = Color.Black;
            label7.Location = new Point(582, 140);
            label7.Name = "label7";
            label7.Size = new Size(74, 21);
            label7.TabIndex = 3;
            label7.Text = "Address:";
            // 
            // label6
            // 
            label6.AutoSize = true;
            label6.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label6.ForeColor = Color.Black;
            label6.Location = new Point(582, 62);
            label6.Name = "label6";
            label6.Size = new Size(63, 21);
            label6.TabIndex = 2;
            label6.Text = "Phone:";
            // 
            // label5
            // 
            label5.AutoSize = true;
            label5.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label5.ForeColor = Color.Black;
            label5.Location = new Point(116, 310);
            label5.Name = "label5";
            label5.Size = new Size(57, 21);
            label5.TabIndex = 1;
            label5.Text = "Email:";
            label5.Click += label5_Click;
            // 
            // label4
            // 
            label4.AutoSize = true;
            label4.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label4.ForeColor = Color.Black;
            label4.Location = new Point(116, 229);
            label4.Name = "label4";
            label4.Size = new Size(94, 21);
            label4.TabIndex = 0;
            label4.Text = "Last Name:";
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label3.ForeColor = Color.Black;
            label3.Location = new Point(116, 140);
            label3.Name = "label3";
            label3.Size = new Size(96, 21);
            label3.TabIndex = 0;
            label3.Text = "First Name:";
            // 
            // button1
            // 
            button1.BackColor = Color.MidnightBlue;
            button1.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            button1.ForeColor = SystemColors.ControlLightLight;
            button1.Location = new Point(1253, 657);
            button1.Name = "button1";
            button1.Size = new Size(85, 44);
            button1.TabIndex = 5;
            button1.Text = "BACK";
            button1.UseVisualStyleBackColor = false;
            button1.Click += button1_Click;
            // 
            // Form6
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            BackColor = Color.White;
            ClientSize = new Size(1350, 729);
            Controls.Add(button1);
            Controls.Add(panel2);
            Controls.Add(panel1);
            Name = "Form6";
            Text = "Manage Customer Details";
            panel1.ResumeLayout(false);
            panel1.PerformLayout();
            panel2.ResumeLayout(false);
            panel2.PerformLayout();
            ResumeLayout(false);
        }

        private Label label1;
        private Panel panel1;
        private Button search_button;
        private TextBox search_box;
        private Label label2;
        private Panel panel2;
        private Button delete_button;
        private Button btnEdit;
        private Button btnAdd;
        private TextBox textBox8;
        private TextBox textBox7;
        private TextBox textBox6;
        private TextBox textBox5;
        private TextBox textBox4;
        private TextBox textBox3;
        private TextBox textBox2;
        private TextBox textBox1;
        private Label label9;
        private Label label8;
        private Label label7;
        private Label label6;
        private Label label5;
        private Label label4;
        private Label label3;
        private Label label10;
        private Button button1;
    }
}
