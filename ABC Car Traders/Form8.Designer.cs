namespace ABC_Car_Traders
{
    partial class Form8
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Form8));
            checkBox1 = new CheckBox();
            pictureBox1 = new PictureBox();
            txtPass = new TextBox();
            txtUser = new TextBox();
            label2 = new Label();
            label1 = new Label();
            btn_reg = new Button();
            button1 = new Button();
            ((System.ComponentModel.ISupportInitialize)pictureBox1).BeginInit();
            SuspendLayout();
            // 
            // checkBox1
            // 
            checkBox1.AutoSize = true;
            checkBox1.Font = new Font("Segoe UI", 9F, FontStyle.Bold, GraphicsUnit.Point, 0);
            checkBox1.Location = new Point(839, 350);
            checkBox1.Name = "checkBox1";
            checkBox1.Size = new Size(112, 19);
            checkBox1.TabIndex = 15;
            checkBox1.Text = "Show Password";
            checkBox1.UseVisualStyleBackColor = true;
            checkBox1.CheckedChanged += checkBox1_CheckedChanged;
            // 
            // pictureBox1
            // 
            pictureBox1.Image = (Image)resources.GetObject("pictureBox1.Image");
            pictureBox1.Location = new Point(399, 251);
            pictureBox1.Name = "pictureBox1";
            pictureBox1.Size = new Size(180, 194);
            pictureBox1.SizeMode = PictureBoxSizeMode.Zoom;
            pictureBox1.TabIndex = 14;
            pictureBox1.TabStop = false;
            // 
            // txtPass
            // 
            txtPass.Location = new Point(803, 311);
            txtPass.Name = "txtPass";
            txtPass.PasswordChar = '*';
            txtPass.Size = new Size(148, 23);
            txtPass.TabIndex = 13;
            // 
            // txtUser
            // 
            txtUser.Location = new Point(803, 251);
            txtUser.Name = "txtUser";
            txtUser.Size = new Size(148, 23);
            txtUser.TabIndex = 12;
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label2.ForeColor = SystemColors.ControlLightLight;
            label2.Location = new Point(691, 313);
            label2.Name = "label2";
            label2.Size = new Size(82, 21);
            label2.TabIndex = 11;
            label2.Text = "Password";
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            label1.ForeColor = SystemColors.ControlLightLight;
            label1.Location = new Point(691, 253);
            label1.Name = "label1";
            label1.Size = new Size(87, 21);
            label1.TabIndex = 10;
            label1.Text = "Username";
            // 
            // btn_reg
            // 
            btn_reg.BackColor = Color.Maroon;
            btn_reg.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btn_reg.ForeColor = SystemColors.ControlLightLight;
            btn_reg.Location = new Point(864, 432);
            btn_reg.Name = "btn_reg";
            btn_reg.Size = new Size(87, 46);
            btn_reg.TabIndex = 9;
            btn_reg.Text = "Register";
            btn_reg.UseVisualStyleBackColor = false;
            btn_reg.Click += btn_reg_Click;
            // 
            // button1
            // 
            button1.BackColor = Color.Navy;
            button1.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            button1.ForeColor = SystemColors.ControlLightLight;
            button1.Location = new Point(749, 432);
            button1.Name = "button1";
            button1.Size = new Size(87, 46);
            button1.TabIndex = 8;
            button1.Text = "Login";
            button1.UseVisualStyleBackColor = false;
            button1.Click += button1_Click;
            // 
            // Form8
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            BackColor = Color.SandyBrown;
            ClientSize = new Size(1350, 729);
            Controls.Add(checkBox1);
            Controls.Add(pictureBox1);
            Controls.Add(txtPass);
            Controls.Add(txtUser);
            Controls.Add(label2);
            Controls.Add(label1);
            Controls.Add(btn_reg);
            Controls.Add(button1);
            Name = "Form8";
            Text = "Customer Login";
            ((System.ComponentModel.ISupportInitialize)pictureBox1).EndInit();
            ResumeLayout(false);
            PerformLayout();
        }

        private CheckBox checkBox1;
        private PictureBox pictureBox1;
        private TextBox txtPass;
        private TextBox txtUser;
        private Label label2;
        private Label label1;
        private Button btn_reg;
        private Button button1;
    }
}
