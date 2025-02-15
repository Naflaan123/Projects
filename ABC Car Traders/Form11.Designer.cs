namespace ABC_Car_Traders
{
    partial class Form11
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
            txtCountry = new TextBox();
            btnSearch = new Button();
            dataGridView1 = new DataGridView();
            panel1 = new Panel();
            label1 = new Label();
            button1 = new Button();
            ((System.ComponentModel.ISupportInitialize)dataGridView1).BeginInit();
            panel1.SuspendLayout();
            SuspendLayout();
            // 
            // txtCountry
            // 
            txtCountry.Location = new Point(177, 43);
            txtCountry.Name = "txtCountry";
            txtCountry.Size = new Size(175, 23);
            txtCountry.TabIndex = 1;
            // 
            // btnSearch
            // 
            btnSearch.BackColor = Color.Firebrick;
            btnSearch.ForeColor = Color.White;
            btnSearch.Location = new Point(370, 41);
            btnSearch.Name = "btnSearch";
            btnSearch.Size = new Size(75, 23);
            btnSearch.TabIndex = 2;
            btnSearch.Text = "Search";
            btnSearch.UseVisualStyleBackColor = false;
            btnSearch.Click += btnSearch_Click;
            // 
            // dataGridView1
            // 
            dataGridView1.ColumnHeadersHeightSizeMode = DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            dataGridView1.Location = new Point(366, 118);
            dataGridView1.Name = "dataGridView1";
            dataGridView1.Size = new Size(575, 599);
            dataGridView1.TabIndex = 3;
            dataGridView1.CellContentClick += dataGridView1_CellContentClick;
            // 
            // panel1
            // 
            panel1.BackColor = Color.Orange;
            panel1.Controls.Add(label1);
            panel1.Controls.Add(txtCountry);
            panel1.Controls.Add(btnSearch);
            panel1.Location = new Point(-2, -4);
            panel1.Name = "panel1";
            panel1.Size = new Size(1353, 116);
            panel1.TabIndex = 2;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            label1.Location = new Point(17, 43);
            label1.Name = "label1";
            label1.Size = new Size(154, 21);
            label1.TabIndex = 0;
            label1.Text = "Search by Country:";
            // 
            // button1
            // 
            button1.BackColor = Color.Orange;
            button1.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            button1.ForeColor = SystemColors.ControlLightLight;
            button1.Location = new Point(1253, 643);
            button1.Name = "button1";
            button1.Size = new Size(85, 44);
            button1.TabIndex = 6;
            button1.Text = "BACK";
            button1.UseVisualStyleBackColor = false;
            button1.Click += button1_Click;
            // 
            // Form11
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(1350, 729);
            Controls.Add(button1);
            Controls.Add(dataGridView1);
            Controls.Add(panel1);
            Name = "Form11";
            Text = "Search Car Details";
            ((System.ComponentModel.ISupportInitialize)dataGridView1).EndInit();
            panel1.ResumeLayout(false);
            panel1.PerformLayout();
            ResumeLayout(false);
        }

        private TextBox txtCountry;
        private Button btnSearch;
        private DataGridView dataGridView1;
        private Panel panel1;
        private Label label1;
        private Button button1;
    }
}
