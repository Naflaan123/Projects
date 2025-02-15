namespace ABC_Car_Traders
{
    partial class Form4
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Form4));
            label1 = new Label();
            panel2 = new Panel();
            delete_button = new Button();
            btnEdit = new Button();
            btnAdd = new Button();
            textBox6 = new TextBox();
            textBox5 = new TextBox();
            textBox4 = new TextBox();
            textBox3 = new TextBox();
            textBox2 = new TextBox();
            textBox1 = new TextBox();
            label8 = new Label();
            label7 = new Label();
            label6 = new Label();
            label5 = new Label();
            label4 = new Label();
            label3 = new Label();
            button1 = new Button();
            label2 = new Label();
            search_box = new TextBox();
            search_button = new Button();
            panel2.SuspendLayout();
            SuspendLayout();
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.BackColor = Color.Transparent;
            label1.Font = new Font("Segoe UI", 20.25F, FontStyle.Bold);
            label1.ForeColor = SystemColors.ActiveCaptionText;
            label1.Location = new Point(548, 87);
            label1.Name = "label1";
            label1.Size = new Size(238, 37);
            label1.TabIndex = 0;
            label1.Text = "Car Management";
            // 
            // panel2
            // 
            panel2.BackColor = SystemColors.AppWorkspace;
            panel2.Controls.Add(delete_button);
            panel2.Controls.Add(btnEdit);
            panel2.Controls.Add(btnAdd);
            panel2.Controls.Add(textBox6);
            panel2.Controls.Add(textBox5);
            panel2.Controls.Add(textBox4);
            panel2.Controls.Add(textBox3);
            panel2.Controls.Add(textBox2);
            panel2.Controls.Add(textBox1);
            panel2.Controls.Add(label8);
            panel2.Controls.Add(label7);
            panel2.Controls.Add(label6);
            panel2.Controls.Add(label5);
            panel2.Controls.Add(label4);
            panel2.Controls.Add(label3);
            panel2.Location = new Point(53, 242);
            panel2.Name = "panel2";
            panel2.Size = new Size(1204, 402);
            panel2.TabIndex = 2;
            // 
            // delete_button
            // 
            delete_button.BackColor = Color.DarkRed;
            delete_button.Font = new Font("Segoe UI", 11.25F, FontStyle.Bold, GraphicsUnit.Point, 0);
            delete_button.ForeColor = Color.White;
            delete_button.Location = new Point(620, 347);
            delete_button.Name = "delete_button";
            delete_button.Size = new Size(75, 32);
            delete_button.TabIndex = 14;
            delete_button.Text = "Delete";
            delete_button.UseVisualStyleBackColor = false;
            delete_button.Click += delete_button_Click;
            // 
            // btnEdit
            // 
            btnEdit.BackColor = Color.DarkRed;
            btnEdit.Font = new Font("Segoe UI", 11.25F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btnEdit.ForeColor = Color.White;
            btnEdit.Location = new Point(513, 347);
            btnEdit.Name = "btnEdit";
            btnEdit.Size = new Size(75, 32);
            btnEdit.TabIndex = 13;
            btnEdit.Text = "Edit";
            btnEdit.UseVisualStyleBackColor = false;
            btnEdit.Click += btnEdit_Click;
            // 
            // btnAdd
            // 
            btnAdd.BackColor = Color.DarkRed;
            btnAdd.Font = new Font("Segoe UI", 11.25F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btnAdd.ForeColor = Color.White;
            btnAdd.Location = new Point(406, 347);
            btnAdd.Name = "btnAdd";
            btnAdd.Size = new Size(75, 32);
            btnAdd.TabIndex = 12;
            btnAdd.Text = "Add";
            btnAdd.UseVisualStyleBackColor = false;
            btnAdd.Click += btnAdd_Click;
            // 
            // textBox6
            // 
            textBox6.Location = new Point(511, 293);
            textBox6.Name = "textBox6";
            textBox6.Size = new Size(184, 23);
            textBox6.TabIndex = 11;
            // 
            // textBox5
            // 
            textBox5.Location = new Point(511, 240);
            textBox5.Name = "textBox5";
            textBox5.Size = new Size(184, 23);
            textBox5.TabIndex = 10;
            // 
            // textBox4
            // 
            textBox4.Location = new Point(511, 189);
            textBox4.Name = "textBox4";
            textBox4.Size = new Size(184, 23);
            textBox4.TabIndex = 9;
            // 
            // textBox3
            // 
            textBox3.Location = new Point(511, 140);
            textBox3.Name = "textBox3";
            textBox3.Size = new Size(184, 23);
            textBox3.TabIndex = 8;
            // 
            // textBox2
            // 
            textBox2.Location = new Point(511, 92);
            textBox2.Name = "textBox2";
            textBox2.Size = new Size(184, 23);
            textBox2.TabIndex = 7;
            // 
            // textBox1
            // 
            textBox1.Location = new Point(511, 47);
            textBox1.Name = "textBox1";
            textBox1.Size = new Size(184, 23);
            textBox1.TabIndex = 6;
            // 
            // label8
            // 
            label8.AutoSize = true;
            label8.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label8.Location = new Point(351, 295);
            label8.Name = "label8";
            label8.Size = new Size(56, 21);
            label8.TabIndex = 5;
            label8.Text = "Price :";
            // 
            // label7
            // 
            label7.AutoSize = true;
            label7.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label7.Location = new Point(351, 242);
            label7.Name = "label7";
            label7.Size = new Size(80, 21);
            label7.TabIndex = 4;
            label7.Text = "Country :";
            // 
            // label6
            // 
            label6.AutoSize = true;
            label6.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label6.Location = new Point(351, 191);
            label6.Name = "label6";
            label6.Size = new Size(69, 21);
            label6.TabIndex = 3;
            label6.Text = "Colour :";
            // 
            // label5
            // 
            label5.AutoSize = true;
            label5.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label5.Location = new Point(351, 142);
            label5.Name = "label5";
            label5.Size = new Size(94, 21);
            label5.TabIndex = 2;
            label5.Text = "Model No :";
            // 
            // label4
            // 
            label4.AutoSize = true;
            label4.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label4.Location = new Point(351, 94);
            label4.Name = "label4";
            label4.Size = new Size(67, 21);
            label4.TabIndex = 1;
            label4.Text = "Model :";
            label4.Click += label4_Click;
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label3.Location = new Point(351, 47);
            label3.Name = "label3";
            label3.Size = new Size(138, 21);
            label3.TabIndex = 0;
            label3.Text = "Registration No :";
            // 
            // button1
            // 
            button1.BackColor = Color.Navy;
            button1.Font = new Font("Segoe UI", 11.25F, FontStyle.Bold, GraphicsUnit.Point, 0);
            button1.ForeColor = Color.White;
            button1.Location = new Point(1182, 650);
            button1.Name = "button1";
            button1.Size = new Size(75, 34);
            button1.TabIndex = 3;
            button1.Text = "Back";
            button1.UseVisualStyleBackColor = false;
            button1.Click += button1_Click;
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.BackColor = Color.Transparent;
            label2.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label2.Location = new Point(887, 208);
            label2.Name = "label2";
            label2.Size = new Size(134, 21);
            label2.TabIndex = 0;
            label2.Text = "Registration No:";
            // 
            // search_box
            // 
            search_box.Location = new Point(1027, 206);
            search_box.Name = "search_box";
            search_box.Size = new Size(137, 23);
            search_box.TabIndex = 1;
            search_box.TextChanged += search_box_TextChanged;
            // 
            // search_button
            // 
            search_button.BackColor = Color.DarkRed;
            search_button.Font = new Font("Segoe UI", 9.75F, FontStyle.Bold, GraphicsUnit.Point, 0);
            search_button.ForeColor = Color.White;
            search_button.Location = new Point(1182, 206);
            search_button.Name = "search_button";
            search_button.Size = new Size(75, 25);
            search_button.TabIndex = 2;
            search_button.Text = "Search";
            search_button.UseVisualStyleBackColor = false;
            search_button.Click += button1_Click;
            // 
            // Form4
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            BackColor = Color.CornflowerBlue;
            BackgroundImage = (Image)resources.GetObject("$this.BackgroundImage");
            BackgroundImageLayout = ImageLayout.Stretch;
            ClientSize = new Size(1350, 729);
            Controls.Add(search_button);
            Controls.Add(search_box);
            Controls.Add(button1);
            Controls.Add(label2);
            Controls.Add(panel2);
            Controls.Add(label1);
            Name = "Form4";
            Text = "Form4";
            panel2.ResumeLayout(false);
            panel2.PerformLayout();
            ResumeLayout(false);
            PerformLayout();
        }

        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Panel panel2;
        private System.Windows.Forms.Button delete_button;
        private System.Windows.Forms.Button btnEdit;
        private System.Windows.Forms.Button btnAdd;
        private System.Windows.Forms.TextBox textBox6;
        private System.Windows.Forms.TextBox textBox5;
        private System.Windows.Forms.TextBox textBox4;
        private System.Windows.Forms.TextBox textBox3;
        private System.Windows.Forms.TextBox textBox2;
        private System.Windows.Forms.TextBox textBox1;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Button button1;
        private Label label2;
        private TextBox search_box;
        private Button search_button;
    }
}
