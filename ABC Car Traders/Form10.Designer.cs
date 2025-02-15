namespace ABC_Car_Traders
{
    partial class Form10
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
            panel1 = new Panel();
            panel2 = new Panel();
            lblOrderID = new Label();
            txtOrderID = new TextBox();
            lblCustomerID = new Label();
            txtCustomerID = new TextBox();
            lblOrderDate = new Label();
            txtOrderDate = new TextBox();
            lblOrderStatus = new Label();
            txtOrderStatus = new TextBox();
            lblTotalAmount = new Label();
            txtTotalAmount = new TextBox();
            lblItemName = new Label();
            txtItemName = new TextBox();
            btnSubmitOrder = new Button();
            button1 = new Button();
            panel2.SuspendLayout();
            SuspendLayout();
            // 
            // panel1
            // 
            panel1.BackColor = Color.Orange;
            panel1.Location = new Point(0, -2);
            panel1.Name = "panel1";
            panel1.Size = new Size(1351, 114);
            panel1.TabIndex = 0;
            // 
            // panel2
            // 
            panel2.BackColor = SystemColors.ButtonShadow;
            panel2.Controls.Add(lblOrderID);
            panel2.Controls.Add(txtOrderID);
            panel2.Controls.Add(lblCustomerID);
            panel2.Controls.Add(txtCustomerID);
            panel2.Controls.Add(lblOrderDate);
            panel2.Controls.Add(txtOrderDate);
            panel2.Controls.Add(lblOrderStatus);
            panel2.Controls.Add(txtOrderStatus);
            panel2.Controls.Add(lblTotalAmount);
            panel2.Controls.Add(txtTotalAmount);
            panel2.Controls.Add(lblItemName);
            panel2.Controls.Add(txtItemName);
            panel2.Controls.Add(btnSubmitOrder);
            panel2.Location = new Point(297, 118);
            panel2.Name = "panel2";
            panel2.Size = new Size(771, 587);
            panel2.TabIndex = 2;
            // 
            // lblOrderID
            // 
            lblOrderID.AutoSize = true;
            lblOrderID.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            lblOrderID.Location = new Point(105, 27);
            lblOrderID.Name = "lblOrderID";
            lblOrderID.Size = new Size(78, 21);
            lblOrderID.TabIndex = 0;
            lblOrderID.Text = "Order ID:";
            lblOrderID.Click += lblOrderID_Click;
            // 
            // txtOrderID
            // 
            txtOrderID.Location = new Point(384, 25);
            txtOrderID.Name = "txtOrderID";
            txtOrderID.Size = new Size(200, 23);
            txtOrderID.TabIndex = 1;
            // 
            // lblCustomerID
            // 
            lblCustomerID.AutoSize = true;
            lblCustomerID.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            lblCustomerID.Location = new Point(105, 107);
            lblCustomerID.Name = "lblCustomerID";
            lblCustomerID.Size = new Size(108, 21);
            lblCustomerID.TabIndex = 2;
            lblCustomerID.Text = "Customer ID:";
            // 
            // txtCustomerID
            // 
            txtCustomerID.Location = new Point(384, 105);
            txtCustomerID.Name = "txtCustomerID";
            txtCustomerID.Size = new Size(200, 23);
            txtCustomerID.TabIndex = 3;
            // 
            // lblOrderDate
            // 
            lblOrderDate.AutoSize = true;
            lblOrderDate.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            lblOrderDate.Location = new Point(105, 194);
            lblOrderDate.Name = "lblOrderDate";
            lblOrderDate.Size = new Size(97, 21);
            lblOrderDate.TabIndex = 4;
            lblOrderDate.Text = "Order Date:";
            // 
            // txtOrderDate
            // 
            txtOrderDate.Location = new Point(384, 192);
            txtOrderDate.Name = "txtOrderDate";
            txtOrderDate.Size = new Size(200, 23);
            txtOrderDate.TabIndex = 5;
            // 
            // lblOrderStatus
            // 
            lblOrderStatus.AutoSize = true;
            lblOrderStatus.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            lblOrderStatus.Location = new Point(105, 284);
            lblOrderStatus.Name = "lblOrderStatus";
            lblOrderStatus.Size = new Size(108, 21);
            lblOrderStatus.TabIndex = 6;
            lblOrderStatus.Text = "Order Status:";
            // 
            // txtOrderStatus
            // 
            txtOrderStatus.Location = new Point(384, 282);
            txtOrderStatus.Name = "txtOrderStatus";
            txtOrderStatus.Size = new Size(200, 23);
            txtOrderStatus.TabIndex = 7;
            // 
            // lblTotalAmount
            // 
            lblTotalAmount.AutoSize = true;
            lblTotalAmount.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            lblTotalAmount.Location = new Point(105, 374);
            lblTotalAmount.Name = "lblTotalAmount";
            lblTotalAmount.Size = new Size(118, 21);
            lblTotalAmount.TabIndex = 8;
            lblTotalAmount.Text = "Total Amount:";
            // 
            // txtTotalAmount
            // 
            txtTotalAmount.Location = new Point(384, 372);
            txtTotalAmount.Name = "txtTotalAmount";
            txtTotalAmount.Size = new Size(200, 23);
            txtTotalAmount.TabIndex = 9;
            // 
            // lblItemName
            // 
            lblItemName.AutoSize = true;
            lblItemName.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            lblItemName.Location = new Point(105, 464);
            lblItemName.Name = "lblItemName";
            lblItemName.Size = new Size(99, 21);
            lblItemName.TabIndex = 10;
            lblItemName.Text = "Item Name:";
            // 
            // txtItemName
            // 
            txtItemName.Location = new Point(384, 462);
            txtItemName.Name = "txtItemName";
            txtItemName.Size = new Size(200, 23);
            txtItemName.TabIndex = 11;
            // 
            // btnSubmitOrder
            // 
            btnSubmitOrder.BackColor = Color.Black;
            btnSubmitOrder.Font = new Font("Segoe UI", 12F, FontStyle.Bold);
            btnSubmitOrder.ForeColor = Color.White;
            btnSubmitOrder.Location = new Point(384, 517);
            btnSubmitOrder.Name = "btnSubmitOrder";
            btnSubmitOrder.Size = new Size(200, 45);
            btnSubmitOrder.TabIndex = 12;
            btnSubmitOrder.Text = "Submit Order";
            btnSubmitOrder.UseVisualStyleBackColor = false;
            btnSubmitOrder.Click += btnSubmitOrder_Click;
            // 
            // button1
            // 
            button1.BackColor = Color.Orange;
            button1.Font = new Font("Segoe UI", 12F, FontStyle.Bold, GraphicsUnit.Point, 0);
            button1.ForeColor = SystemColors.ControlLightLight;
            button1.Location = new Point(1253, 649);
            button1.Name = "button1";
            button1.Size = new Size(85, 44);
            button1.TabIndex = 6;
            button1.Text = "BACK";
            button1.UseVisualStyleBackColor = false;
            button1.Click += button1_Click;
            // 
            // Form10
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(1350, 729);
            Controls.Add(button1);
            Controls.Add(panel2);
            Controls.Add(panel1);
            Name = "Form10";
            Text = "Order Form";
            Load += Form10_Load;
            panel2.ResumeLayout(false);
            panel2.PerformLayout();
            ResumeLayout(false);
        }

        private Panel panel1;
        private Panel panel2;
        private Label lblOrderID;
        private TextBox txtOrderID;
        private Label lblCustomerID;
        private TextBox txtCustomerID;
        private Label lblOrderDate;
        private TextBox txtOrderDate;
        private Label lblOrderStatus;
        private TextBox txtOrderStatus;
        private Label lblTotalAmount;
        private TextBox txtTotalAmount;
        private Label lblItemName;
        private TextBox txtItemName;
        private Button btnSubmitOrder;
        private Button button1;
    }
}
